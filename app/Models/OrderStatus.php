<?php

namespace App\Models;

use App\Queries\OrderStatuses;

class OrderStatus extends OrderStatuses
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
     * Relationship to Order model
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
