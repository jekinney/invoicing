<?php

namespace App\Models;

use App\Queries\OrderTemplates;

class OrderTemplate extends OrderTemplates
{
    ///// Setup

    /**
     * Guarded columns from mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];

    ///// Relationships

    /**
     * Relationship to Order model
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
