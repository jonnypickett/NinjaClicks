<?php

namespace App\GraphQL\Query\Provider;

use App\Provider;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;

class ProviderByIdQuery extends Query
{
    protected $attributes = [
        'name' => 'providerById'
    ];

    public function type()
    {
        return GraphQL::type('Provider');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
        ];
    }

    public function authenticated($root, $args, $currentUser)
    {
        return !!$currentUser;
    }

    public function resolve($root, $args)
    {
        if (!$provider = Provider::find($args['id'])) {
            throw new \Exception('Resource not found');
        }

        return $provider;
    }
}
