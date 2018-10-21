<?php

namespace App\GraphQL\Query\Click;

use App\Click;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ClicksQuery extends Query
{
    protected $attributes = [
        'name' => 'clicks',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Click'));
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

        $clicks = Click::query();

        foreach ($args as $arg => $value) {
            if ($arg === 'id') {
                $clicks->whereId($value);
            }
        }

        foreach ($fields as $field => $keys) {
            if ($field === 'provider') {
                $clicks->with('provider');
            }
        }

        return $clicks->orderBy('date', 'desc')->get();
    }
}
