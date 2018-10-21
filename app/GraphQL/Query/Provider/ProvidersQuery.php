<?php

namespace App\GraphQL\Query\Provider;

use App\Provider;
use App\Repositories\Contracts\ProviderRepositoryInterface;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ProvidersQuery extends Query
{
    protected $repo;
    
    protected $attributes = [
        'name' => 'providers',
    ];

    public function __construct(ProviderRepositoryInterface $repo)
    {
        parent::__construct();
        $this->repo = $repo;
    }

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

        return $this->repo->all($args, $fields);
    }
}
