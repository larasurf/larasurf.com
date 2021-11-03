<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $dev_branch = $request->query('dev-branch');

            $command = "LARASURF_PROJECT_NAME=$name LARASURF_START=$(date +%s) && " .
                'curl -s ' . ($dev_branch ? '-k ' : '') . secure_url('generate.sh') . ' | bash -s -- --project-dir=$LARASURF_PROJECT_NAME ' .
                "--environments=$environments ";

            if ($dev_branch) {
                $command .= "--dev-branch=$dev_branch ";
            }

            if ('none' !== $starter_kit) {
                $command .= "--auth=$starter_kit ";
            }

            if ('true' === $local_tls) {
                $command .= '--tls ';
            }

            if ('true' === $ide_helper) {
                $command .= '--ide-helper ';
            }

            if ('true' === $cs_fixer) {
                $command .= '--cs-fixer ';
            }

            $command .= "--awslocal-port=$port_awslocal --mail-ui-port=$port_mail_ui --app-port=$port_app --app-tls-port=$port_app_tls --db-port=$port_database --cache-port=$port_cache " .
                '&& cd $LARASURF_PROJECT_NAME > /dev/null 2>&1; (test -f \'./larasurf.json\' && LARASURF_END=$(date +%s) && echo "Done in $((LARASURF_END-LARASURF_START))s" && git status) || (echo -e \'\033[91mInstallation failed\033[0m\' && test -f \'docker-compose.yml\' && cd $(pwd) && docker-compose down --volumes > /dev/null 2>&1 && cd $(pwd))';

            return view('generate-project', [
                'command' => $command,
            ]);
        }

        return redirect()->to(route('new-project'));
    }
}
