<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class HoraireType extends BaseType
{
    protected $attributes = [
        'name' => 'HoraireType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'jour' => ['type'=>Type::int()],
            'matin_de' => ['type'=>Type::float()],
            'matin_a' => ['type'=>Type::float()],
            'apres_midi_de' => ['type'=>Type::float()],
            'apres_midi_a' => ['type'=>Type::float()]
        ];
    }
}
