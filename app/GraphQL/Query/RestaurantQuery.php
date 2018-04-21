<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use DB;

class RestaurantQuery extends Query
{
    protected $attributes = [
        'name' => 'restaurant',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('RestaurantType'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $ret = DB::table('restaurant')->where('id', $args['id'])->get();
        return $ret;
    }
}
