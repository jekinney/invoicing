<?php

namespace App\Queries;

use App\Queries\Contracts\Model;

abstract class Charges extends Model
{
    /**
     * Set the validation rules
     * for creating a new resource
     *
     * @var array
     */
    protected $createRules = [];

    /**
     * Set the validation rules for
     * updating an existing resource
     *
     * @var array
     */
    protected $updateRules = [];
}
