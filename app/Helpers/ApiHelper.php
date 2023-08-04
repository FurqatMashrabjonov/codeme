<?php

namespace App\Helpers;

class ApiHelper
{

    const GITHUB_API_URL = 'https://api.github.com/';
    const GITLAB_API_URL = 'https://gitlab.com/api/v4/';
    const BITBUCKET_API_URL = 'https://api.bitbucket.org/2.0/';


    public static function api($base_url, $url, $data = [])
    {
        $res = \Http::get($base_url . $url, $data);
        return $res->object();
    }

    public static function githubApi($url, $data = [])
    {
        return self::api(self::GITHUB_API_URL, $url, $data);
    }

}
