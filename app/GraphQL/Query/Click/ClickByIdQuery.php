<?php

namespace App\GraphQL\Query\Click;

use App\Click;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;

class ClickByIdQuery extends Query
{
    protected $attributes = [
        'name' => 'click'
    ];

    public function type()
    {
        return GraphQL::type('Click');
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
        if (!$click = Click::find($args['id'])) {
            throw new \Exception('Resource not found');
        }

        return $click;
    }
}
