<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Str;

class GenerateProjectController extends Controller
{
    public function view(Request $request)
    {
        $name = $request->query('name');
        $environments = $request->query('environments');
        $starter_kit = $request->query('starter-kit');
        $port_awslocal = $request->query('port-awslocal');
        $port_mail_ui = $request->query('port-mail-ui');
        $port_app = $request->query('port-app');
        $port_app_tls = $request->query('port-app-tls');
        $port_database = $request->query('port-database');
        $port_cache = $request->query('port-cache');
        $ide_helper = $request->query('ide-helper');
        $cs_fixer = $request->query('cs-fixer');
        $local_tls = $request->query('local-tls');

        if ($name &&
            $environments &&
            $starter_kit &&
            $port_awslocal &&
            $port_mail_ui &&
            $port_app &&
            $port_app_tls &&
            $port_database &&
            $port_cache &&
            $ide_helper &&
            $cs_fixer &&
            $local_tls
        ) {
            $environment = config('app.env');

            $dev_branch = $request->query('dev-branch');
            $template_branch = $request->query('template-branch');

            if (!$dev_branch && 'production' !== $environment) {
                $dev_branch = 'main';
            }

            if (!$template_branch && 'production' !== $environment) {
                $template_branch = 'main';
            }

            $username = config("auth.basic-auth.$environment.username");
            $password = config("auth.basic-auth.$environment.password");

            $params = array_filter([
                'environments' => $environments,
                'dev-branch' => $dev_branch,
                'template-branch' => $template_branch,
                'auth' => 'none' !== $starter_kit ? $starter_kit : false,
                'local-tls' => 'true' === $local_tls ? 'true' : false,
                'ide-helper' => 'true' === $ide_helper ? 'true' : false,
                'cs-fixer' => 'true' === $cs_fixer ? 'true' : false,
                'aws-local-port' => $port_awslocal,
                'mail-ui-port' => $port_mail_ui,
                'app-port' => $port_app,
                'app-tls-port' => $port_app_tls,
                'database-port' => $port_database,
                'cache-port' => $port_cache,
            ]);

            $command = "LARASURF_PROJECT_NAME=$name LARASURF_START=$(date +%s) && " .
                'curl -s ' . ($dev_branch || $template_branch ? '-k ' : '') . ($username && $password ? "-u $username:$password " : '') .
                '"' . secure_url('generate.sh') . '?project-dir=$LARASURF_PROJECT_NAME&' . http_build_query($params) . '"' .
                ' | bash -s && cd $LARASURF_PROJECT_NAME > /dev/null 2>&1; (test -f \'./larasurf.json\' && LARASURF_END=$(date +%s) && echo "Done in $((LARASURF_END-LARASURF_START))s" && git status) || (echo -e \'\033[91mInstallation failed\033[0m\' && test -f \'docker-compose.yml\' && cd $(pwd) && docker-compose down --volumes > /dev/null 2>&1 && cd $(pwd))';

            return view('generate-project', [
                'command' => $command,
            ]);
        }

        return redirect()->to(route('new-project'));
    }

    public function generate(Request $request)
    {
        $project_dir = $request->query('project-dir');
        $environments = $request->query('environments');
        $dev_branch = $request->query('dev-branch');
        $template_branch = $request->query('template-branch');
        $auth = $request->query('auth');
        $local_tls = $request->query('local-tls');
        $ide_helper = $request->query('ide_helper');
        $cs_fixer = $request->query('cs-fixer');
        $aws_local_port = $request->query('aws-local-port');
        $mail_ui_port = $request->query('mail-ui-port');
        $app_port = $request->query('app-port');
        $app_tls_port = $request->query('app-tls-port');
        $database_port = $request->query('database-port');
        $cache_port = $request->query('cache-port');
        $splash = $request->query('splash');

        if (!$dev_branch && !$template_branch && app()->isProduction()) {
            Http::withHeaders([
                    'X-Forwarded-For' => request()->ip(),
                    'user-agent' => request()->userAgent(),
                ])
                ->post(
                    'https://plausible.io/api/event',
                    [
                        'name' => 'generate',
                        'domain' => 'larasurf.com',
                        'url' => url()->current(),
                        'props' => json_encode([
                            'environments' => $environments,
                            'auth' => $auth ?: 'none',
                            'local-tls' => 'true' === $local_tls,
                            'ide-helper' => 'true' === $ide_helper,
                            'cs-fixer' => 'true' === $cs_fixer,
                            'port-aws-local' => $aws_local_port,
                            'port-mail-ui' => $mail_ui_port,
                            'port-app' => $app_port,
                            'port-app-tls' => $app_tls_port,
                            'port-database' => $database_port,
                            'port-cache' => $cache_port,
                        ]),
                    ]
                );
        }

        $replacements = [
            '%AUTH_JET_INERTIA%' => 'jet-inertia' === $auth ? 'true' : 'false',
            '%AUTH_JET_INERTIA_TEAMS%' => 'jet-inertia-teams' === $auth ? 'true' : 'false',
            '%AUTH_JET_LIVEWIRE%' => 'jet-livewire' === $auth ? 'true' : 'false',
            '%AUTH_JET_LIVEWIRE_TEAMS%' => 'jet-livewire-teams' === $auth ? 'true' : 'false',
            '%AUTH_BREEZE_BLADE%' => 'breeze-blade' === $auth ? 'true' : 'false',
            '%AUTH_BREEZE_VUE%' => 'breeze-vue' === $auth ? 'true' : 'false',
            '%AUTH_BREEZE_REACT%' => 'breeze-react' === $auth ? 'true' : 'false',
            '%PACKAGE_IDE_HELPER%' => 'true' === $ide_helper ? 'true' : 'false',
            '%PACKAGE_CS_FIXER%' => 'true' === $cs_fixer ? 'true' : 'false',
            '%LOCAL_TLS%' => 'true' === $local_tls ? 'true' : 'false',
            '%ENVIRONMENTS%' => $environments,
            '%AWSLOCAL_PORT%' => $aws_local_port,
            '%MAIL_UI_PORT%' => $mail_ui_port,
            '%APP_PORT%' => $app_port,
            '%APP_TLS_PORT%' => $app_tls_port,
            '%DB_PORT%' => $database_port,
            '%CACHE_PORT%' => $cache_port,
            '%PROJECT_DIR%' => $project_dir,
            '%DEV_BRANCH%' => $dev_branch ?: '',
            '%TEMPLATE_BRANCH%' => $template_branch ?: '',
            '%SPLASH%' => 'true' === $splash ? 'true' : 'false',
        ];

        $script = File::get(resource_path('generate.sh'));

        foreach ($replacements as $key => $replacement) {
            $script = Str::replace($key, $replacement, $script);
        }

        return response()->make($script, Response::HTTP_OK, ['content-type' => 'text/plain']);
    }
}
