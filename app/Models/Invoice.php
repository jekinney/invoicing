<?php

namespace App\Models;

use App\Queries\Invoices;

class Invoice extends Invoices
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

    /**
     * Relationship to InvoiceStatus model
     */
    public function status()
    {
        return $this->belongsTo(InvoiceStatus::class);
    }
}
