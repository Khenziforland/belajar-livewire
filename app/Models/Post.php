<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\HashHelper;

class Post extends Model
{

    /*
    |-----------------------------------------------------------------------------
    | DECORATOR(s)
    |-----------------------------------------------------------------------------
    | // ! write your decorator(s) below, to maintain code readability
    */

    /**
     ** The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     ** The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     ** The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [];

    /*
    |-----------------------------------------------------------------------------
    | HOOK METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your hook method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | STATIC METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | SCOPED METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | RELATIONAL METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your relational method(s) below, to maintain code readability
    */
}
