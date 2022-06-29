<?php

namespace App\Models;

use App\Queries\Fees;

class Fee extends Fees
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
     * Relationship to Charge model
     */
    public function charges()
    {
        return $this->belongsToMany(Charge::class);
    }
}
