<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use DB;

class SearchQuery extends Query
{
    protected $attributes = [
        'name' => 'SearchQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('SearchType'));
    }

    public function args()
    {
        return [
            'value'=>[
                'name'=>'value',
                'type'=>Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['value'])) {
            $ret = DB::table('restaurant')->join('location','location.id_rest','=','restaurant.id')
                ->where('nom','like','%'.$args['value'].'%')
                ->orWhere('address','like','%'.$args['value'].'%')
                ->select('id',
                'nom',
                'classement',
                'email',
                'telephone',
                'telephonefax',
                'fax',
                'facebook',
                'website',
                'tarifmin',
                'producteur',
                'address',
                'latitude as lat',
                'longitude as lng')->get();
            return $ret;
        }
        return [];
    }
}
