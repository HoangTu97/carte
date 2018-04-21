<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use DB;

class LocationQuery extends Query
{
    protected $attributes = [
        'name' => 'location',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Location'));
    }

    public function args()
    {
        return [
            'lat' => [
                'name'=>'lat',
                'type'=>Type::float()
            ],
            'long' => [
                'name'=>'long',
                'type'=>Type::float()
            ],
            'radius' => [
                'name'=>'radius',
                'type'=>Type::int()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $radius = isset($args['radius']) ? $args['radius'] : 10000;
        $sub = DB::raw("
            (SELECT id_rest, address, latitude, longitude,
                acos(cos(@(".$args['long']." * pi()/180 - longitude * pi()/180)) * cos(".$args['lat']." * pi()/180) * cos(latitude * pi()/180) + sin(". $args['lat'] ." * pi()/180) * sin(latitude * pi()/180)) * 6378 AS distance
            FROM location) AS distance_table
 ");
        $ret = DB::table(
            $sub)
            ->select('id_rest as id', 'address','latitude as lat','longitude as lng')
            ->where('distance' ,'<=',$radius)
            ->orderBy('distance')->get();
            
        return $ret;
    }
}
