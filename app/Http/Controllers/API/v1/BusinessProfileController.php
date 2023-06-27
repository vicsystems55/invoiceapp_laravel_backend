<?php

namespace App\Http\Controllers\API\v1;
use App\Http\Controllers\Controller;


use App\Models\BusinessProfile;
use App\Http\Requests\StoreBusinessProfileRequest;
use App\Http\Requests\UpdateBusinessProfileRequest;

class BusinessProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBusinessProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusinessProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessProfile $businessProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusinessProfileRequest  $request
     * @param  \App\Models\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusinessProfileRequest $request, BusinessProfile $businessProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessProfile  $businessProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessProfile $businessProfile)
    {
        //
    }
}
