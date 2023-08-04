<?php

namespace App\Services\Interfaces;

interface GitInterface
{

    public static function getRepositories($username);

    public static function getRepository($username, $repository): array;


}
