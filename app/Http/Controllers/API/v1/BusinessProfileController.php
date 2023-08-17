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
    * Create a business profile
    *
    * @header Authorization Bearer
    * @bodyParam b_name string required
    * @bodyParam b_address string required
    * @bodyParam b_phone string required
    * @bodyParam b_logo file required
    * @bodyParam b_cac_no string
    * @bodyParam b_description string required
    * @bodyParam b_sign file

    * @param  \App\Http\Requests\StoreBusinessProfileRequest  $request
    * @return \Illuminate\Http\Response
    */
   public function createProfile(StoreBusinessProfileRequest $request)
   {
       //

       return $request->all();

       $businessProfile = BusinessProfile::create([
        'user_id' => $request->user()->id,
        'b_name' => $request->b_name,
        'b_address' => $request->b_address,
        'b_phone' => $request->b_phone,
        // 'b_logo' => $request->b_logo,
        'b_cac_no' => $request->b_cac_no,
        'b_description' => $request->b_description,
        // 'b_sign' => $request->b_sign,
       ]);

       return $businessProfile;


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
