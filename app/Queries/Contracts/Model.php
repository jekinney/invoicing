<?php

namespace App\Queries\Contracts;

use App\Queries\Contracts\EloquentQueries as Queries;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent implements Queries
{
    /**
     * Validation rules for creating a new resource
     *
     * @var array
     */
    protected $createRules;

    /**
     * Validation rules for updating an existing resource
     *
     * @var array
     */
    protected $updateRules;

    /**
     * Date to show a single resource
     */
    public function show()
    {
        return $this;
    }

    /**
     * Data to edit a single resource
     */
    public function edit()
    {
        return $this;
    }

    /**
     * Data to create and store a new resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        return $this->create($this->validate($request));
    }

    /**
     * Data to store and update a existing resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function renew(Request $request)
    {
        $this->update($this->validate($request));

        return $this->fresh();
    }

    /**
     * Remove data and resource
     *
     * @return bool
     */
    public function remove()
    {
        return $this->delete();
    }

    /**
     * Gather data for a public collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function publicList(Request $request)
    {
        if ($request->has('amount')) {
            return $this->latest()->paginate($request->amount);
        }

        return $this->latest()->get();
    }

    /**
     * Gather data for a restricted collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function adminList(Request $request)
    {
        if ($request->has('amount')) {
            return $this->latest()->paginate($request->amount);
        }

        return $this->latest()->get();
    }

    /**
     * Validate and set incoming data to limited array
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function validate(Request $request)
    {
        if ($request->method('post')) {
            $rules = $this->getCreateRules();
        } else {
            $rules = $this->getUpdateRules();
        }

        return $request->validate($rules);
    }

    /**
     * Getter to get create validation rules
     *
     * @return array
     */
    protected function getCreateRules()
    {
        return $this->createRules;
    }

    /**
     * Getter to get update validation rules
     *
     * @return array
     */
    protected function getUpdateRules()
    {
        return $this->updateRules;
    }
}
