<?php

namespace App\Repositories\Contracts;

interface ClickRepositoryInterface
{
    public function all(array $args, array $fields);
}
