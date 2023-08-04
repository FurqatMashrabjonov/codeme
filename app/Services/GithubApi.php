<?php

namespace App\Services;

use App\Services\Interfaces\GitInterface;
use App\Services\Traits\GithubApiClient;

class GithubApi implements GitInterface
{
    use GithubApiClient;

    public static function getRepositories($username): array
    {
        return self::api('users/' . $username . '/repos');
    }

    public static function getRepository($username, $repository): array
    {
        return self::api('repos/' . $username . '/' . $repository);
    }

}
