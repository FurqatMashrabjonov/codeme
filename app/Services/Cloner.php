<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;
class Cloner
{

    public static function clone($repository, $uniqueName)
    {

        $process = Process::path('/var/www/repos')->start("git clone {$repository} {$uniqueName}", function (string $type, string $output) {
            Log::debug($output);
        });
        sleep(5);
        $process = Process::path('/var/www/repos/' . $uniqueName)->start("git fetch --all", function (string $type, string $output) {
            Log::debug($output);
        });

        $process = Process::path('/var/www/repos/' . $uniqueName)->start("git pull origin main", function (string $type, string $output) {
            Log::debug($output);
        });

        $result = $process->wait();
        dd($result);
        }

}
