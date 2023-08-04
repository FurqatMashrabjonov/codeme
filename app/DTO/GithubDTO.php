<?php

namespace App\DTO;


use Spatie\LaravelData\Data;

class GithubDTO extends Data
{
    public function __construct(
        public string $id,
        public string $nickname,
        public ?string $name,
        public ?string $email,
        public ?string $avatar,
        public ?array $user,
        public ?string $token,
        public ?string $refresh_token,
        public ?string $expires_in,
    ) {
    }
}
