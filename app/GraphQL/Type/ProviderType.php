<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ProviderType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Provider',
        'description' => 'A provider of click data',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the provider',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The provider name',
            ],
            'display_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The provider display name',
            ],
            'hex_color' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The provider display color',
            ],
            'clicks' => [
                'type' => Type::listOf(GraphQL::type('Click')),
                'description' => 'The provider clicks',
            ],
        ];
    }
}
