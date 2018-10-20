<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ClickType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Click',
        'description' => 'Click data',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the click data',
            ],
            'provider' => [
                'type' => Type::nonNull(GraphQL::type('Provider')),
                'description' => 'The provider of the click data',
            ],
            'date' => [
                'type' => Type::string(),
                'description' => 'Date of the click data',
            ],
            'total_clicks' => [
                'type' => Type::int(),
                'description' => 'Total clicks',
            ],
        ];
    }

    protected function resolveDateField($root, $args)
    {
        return (string) $root->date->toIso8601String();
    }
}
