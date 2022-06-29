<?php

namespace App\Queries\Contracts;

use Illuminate\Http\Request;

interface EloquentQueries
{
    /**
     * Date to show a single resource
     */
    public function show();

    /**
     * Data to edit a single resource
     */
    public function edit();

    /**
     * Data to create and store a new resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request);

    /**
     * Data to store and update a existing resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function renew(Request $request);

    /**
     * Remove a resource
     *
     * @return bool
     */
    public function remove();

    /**
     * Gather data for a public collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function publicList(Request $request);

    /**
     * Gather data for a restricted collection
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function adminList(Request $request);
}
