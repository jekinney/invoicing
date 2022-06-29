<?php

namespace App\Models;

use App\Queries\ChargeTypes;

class ChargeType extends ChargeTypes
{
    ////// Set up

    /**
     * Guarded columns from mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];

    ///// Relationships

    /**
     * Relationship to Fee model
     */
    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
}
