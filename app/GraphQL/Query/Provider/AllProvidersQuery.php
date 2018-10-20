<?php

namespace App\GraphQL\Query\Provider;

use App\Provider;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class AllProvidersQuery extends Query
{
    protected $attributes = [
        'name' => 'allProviders',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Provider'));
    }

    // public function authenticated($root, $args, $currentUser)
    // {
    //     return !!$currentUser;
    // }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection();

        $providers = Provider::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'clicks') {
                $providers->with('clicks');
            }
        }

        return $providers->orderBy('display_name')->get();
    }
}
