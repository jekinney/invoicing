<?php

namespace App\Models;

use App\Queries\InvoiceStatuses;

class InvoiceStatus extends InvoiceStatuses
{
    ////// Set up

    /**
     * Guarded columns from mass assignment
     *
     * @var array
     */
    protected $guarded = ['id'];
}
