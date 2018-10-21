<?php

namespace App\Repositories\Eloquent;

use App\Click;
use App\Repositories\Contracts\ClickRepositoryInterface;

class ClickRepository implements ClickRepositoryInterface
{
    protected $model;

    public function __construct(Click $model)
    {
        $this->model = $model;
    }

    public function all(array $args, array $fields)
    {
        $q = $this->model->query();

        foreach ($args as $arg => $value) {
            if ($arg === 'id') {
                $q->whereId($value);
            }
        }

        foreach ($fields as $field => $keys) {
            if ($field === 'provider') {
                $q->with('provider');
            }
        }

        return $q->orderBy('date', 'desc')->get();
    }
}
