<?php

namespace App\GraphQL\Query\Click;

use App\Click;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class AllClicksQuery extends Query
{
    protected $attributes = [
        'name' => 'allClicks',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Click'));
    }

    // public function authenticated($root, $args, $currentUser)
    // {
    //     return !!$currentUser;
    // }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection();

        $clicks = Click::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'provider') {
                $clicks->with('provider');
            }
        }

        return $clicks->orderBy('date', 'desc')->get();
    }
}
