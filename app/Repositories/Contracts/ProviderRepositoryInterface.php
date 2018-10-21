<?php

namespace App\Repositories\Contracts;

interface ProviderRepositoryInterface
{
    public function all(array $args, array $fields);
}
