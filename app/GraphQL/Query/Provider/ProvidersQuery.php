<?php

namespace App\GraphQL\Query\Provider;

use App\Provider;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ProvidersQuery extends Query
{
    protected $attributes = [
        'name' => 'providers',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Provider'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
        ];
    }

    // public function authenticated($root, $args, $currentUser)
    // {
    //     return !!$currentUser;
    // }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection();

        $providers = Provider::query();

        foreach ($args as $arg => $value) {
            if ($arg === 'id') {
                $providers->whereId($value);
            }
        }

        foreach ($fields as $field => $keys) {
            if ($field === 'clicks') {
                $providers->with('clicks');
            }
        }

        return $providers->orderBy('display_name')->get();
    }
}
