<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use DB;

class HoraireQuery extends Query
{
    protected $attributes = [
        'name' => 'horaire',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('HoraireType'));
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
        $ret = DB::table('horaire')->where('id_resto', $args['id'])
            ->select('jour', 'matin_de','matin_a','apres-midi_de as apres_midi_de', 'apres-midi_a as apres_midi_a')
            ->get();
        return $ret;
    }
}
