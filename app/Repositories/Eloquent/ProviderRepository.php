<?php

namespace App\Repositories\Eloquent;

use App\Provider;
use App\Repositories\Contracts\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    protected $model;

    public function __construct(Provider $model)
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
            if ($field === 'clicks') {
                $q->with('clicks');
            }
        }

        return $q->orderBy('display_name')->get();
    }
}
