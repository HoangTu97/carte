<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class SearchType extends BaseType
{
    protected $attributes = [
        'name' => 'SearchType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'=>[
                'type'=>Type::int()
            ],
            'nom' => [
                'type' => Type::string()
            ],
            'classement' => [
                'type' => Type::int()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'telephone' => [
                'type' => Type::string()
            ],
            'telephonefax' => [
                'type' => Type::string()
            ],
            'fax' => [
                'type' => Type::string()
            ],
            'facebook' => [
                'type' => Type::string()
            ],
            'website' => [
                'type' => Type::string()
            ],
            'tarifmin' => [
                'type' => Type::float()
            ],
            'producteur' => [
                'type' => Type::string()
            ],
            'address' => [
                'type'=> Type::string()
            ],
            'lat' => [
                'type'=>Type::float()
            ],
            'lng' => [
                'type'=>Type::float()
            ]
        ];
    }
}
