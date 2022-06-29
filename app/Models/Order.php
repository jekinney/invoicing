<?php

namespace App\Models;

use App\Queries\Orders;

class Order extends Orders
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
     * Relationship to State model
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Relationship to OrderStatus model
     */
    public function status()
    {
        return $this->belongsToMany(Status::class);
    }

    /**
     * Relationship to County model
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    /**
     * Relationship to Invoice model
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Relationship to County model
     */
    public function lawyer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to County model
     */
    public function tenants()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relationship to County model
     */
    public function lawfirm()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to County model
     */
    public function landlord()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to County model
     */
    public function property()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the OrderTemplate model
     */
    public function templates()
    {
        return $this->belogsTo(OrderTemplate::class);
    }
}
