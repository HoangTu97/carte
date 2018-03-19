<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class LocationType extends BaseType
{
    protected $attributes = [
        'name' => 'Location',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'=>[
                'type'=>Type::int()
            ],
            'address' => [
                'type' => Type::string()
            ],
            'latitude' => [
                'type' => Type::float()
            ],
            'longitude' => [
                'type' => Type::float()
            ]
        ];
    }
}
