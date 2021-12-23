<?php

namespace App\Console\Commands;

use App\Http\Controllers\GenerateProjectController;
use Aws\Credentials\Credentials;
use Aws\Exception\CredentialsException;
use Aws\S3\S3Client;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\RejectedPromise;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Storage;

class AwsLocalSeedS3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'awslocal:seed-s3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the project template archive from stage for the configured tag.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $config = new \LaraSurf\LaraSurf\Config();

        $stage_cloudformation = new \LaraSurf\LaraSurf\AwsClients\CloudFormationClient(
            $config->get('project-name'),
            $config->get('project-id'),
            $config->get('aws-profile'),
            $config->get('environments.stage.aws-region'),
            'stage'
        );

        $bucket_name = $stage_cloudformation->stackOutput('BucketName');

        $client = new S3Client([
            'credentials' => static::credentialsProvider($config->get('aws-profile')),
            'region' => $config->get('environments.stage.aws-region'),
            'version' => 'latest',
        ]);

        $adapter = new \League\Flysystem\AwsS3v3\AwsS3Adapter($client, $bucket_name);
        $filesystem = new \League\Flysystem\Filesystem($adapter);

        $tag = GenerateProjectController::PROJECT_TEMPLATE_VERSION_TAG;

        $path = "laravel-docker-template/dist/$tag/project-template.tar";

        $stream = $filesystem->get($path);
        $success = Storage::disk('s3')->putStream($path, $stream->readStream());

        if ($success) {
            $this->info("Uploaded file '$path' to local S3");
        } else {
            $this->error("Failed to upload file '$path' to local S3");
        }

        return 0;
    }

    protected static function credentialsProvider($profile): callable
    {
        return function() use ($profile) {
            $credentials_file_path = '/larasurf/aws/credentials';

            if (!File::exists($credentials_file_path)) {
                return new RejectedPromise(new CredentialsException("File does not exist: $credentials_file_path"));
            }

            $credentials = parse_ini_file($credentials_file_path, true);

            if (!isset($credentials[$profile])) {
                return new RejectedPromise(new CredentialsException("Profile '$profile' does not exist in $credentials_file_path"));
            }

            if (empty($credentials[$profile]['aws_access_key_id'])) {
                return new RejectedPromise(new CredentialsException("Profile '$profile' does not contain 'aws_access_key_id'"));
            }

            if (empty($credentials[$profile]['aws_secret_access_key'])) {
                return new RejectedPromise(new CredentialsException("Profile '$profile' does not contain 'aws_secret_access_key'"));
            }

            return Create::promiseFor(
                new Credentials($credentials[$profile]['aws_access_key_id'], $credentials[$profile]['aws_secret_access_key'])
            );
        };
    }
}
