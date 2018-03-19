<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['id_rest','address','code_postal','commune','latitude','longitude'];
}
