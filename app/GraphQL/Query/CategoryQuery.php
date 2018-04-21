<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use DB;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'CategoryQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('CategoryType'));
    }

    public function args()
    {
        return [
            'id' => [
                'name'=>'id',
                'type'=>Type::int()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $ret = DB::table('resto_cate')->where('id_resto', $args['id'])->join('category', 'resto_cate.id_cate','=','category.id')->select('category.nom as nom')->get();
        return $ret;
    }
}
