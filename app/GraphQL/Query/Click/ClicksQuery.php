<?php

namespace App\GraphQL\Query\Click;

use App\Click;
use App\Repositories\Contracts\ClickRepositoryInterface;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ClicksQuery extends Query
{
    protected $repo;

    protected $attributes = [
        'name' => 'clicks',
    ];

    public function __construct(ClickRepositoryInterface $repo)
    {
        parent::__construct();
        $this->repo = $repo;
    }

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

        return $this->repo->all($args, $fields);
    }
}
