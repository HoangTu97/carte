<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class CategoryType extends BaseType
{
    protected $attributes = [
        'name' => 'CategoryType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'nom' => [
                'type' => Type::string()
            ]
        ];
    }
}
