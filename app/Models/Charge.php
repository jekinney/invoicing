<?php

namespace App\Models;

use App\Queries\Charges;

class Charge extends Charges
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
    public function fees()
    {
        return $this->belongsToMany(Fee::class);
    }

    /**
     * Relationship to Order model
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Relationship to OrderTemplate model
     */
    public function templates()
    {
        return $this->belongsToMany(OrderTemplate::class);
    }
}
