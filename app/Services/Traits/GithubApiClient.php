<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Http;

trait GithubApiClient
{

    public static function api($url, $data = []): array
    {
        $res = Http::get(config('services.github.api_url') . $url);
        return (array)$res->object();
    }

}
