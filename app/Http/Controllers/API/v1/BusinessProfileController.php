<?php

namespace App\Http\Controllers\API\v1;
use Illuminate\Http\Request;


use App\Models\BusinessProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessProfileRequest;
use App\Http\Requests\UpdateBusinessProfileRequest;

class BusinessProfileController extends Controller
{

    /**
    * Fetch business profiles
    *
    * @header Authorization Bearer


    * @param  \App\Http\Requests\StoreBusinessProfileRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {


        $business_profiles = BusinessProfile::where('user_id', $request->user()->id)->latest()->get();

        return $business_profiles;
    }

    /**
    * Create a business profile
    *
    * @header Authorization Bearer
    * @bodyParam b_name string required Example: vicSystems Tech Ltd.
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

    //    return $request->all();

       $request->validate([

        'b_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'b_signature' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'b_description' => 'required',
        'b_name' => 'required|unique:business_profiles',
        'b_address' => 'required',
        'b_phone' => 'required',
       ]);

    if ($request->file('b_logo')) {
        # code...
        $doc = $request->file('b_logo');

        $new_name = rand().".".$doc->getClientOriginalExtension();

        $doc->move(public_path('business_logos'), $new_name);

    }

    if ($request->file('b_signature')) {
        # code...
        $doc1 = $request->file('b_signature');

        $new_name1 = rand().".".$doc1->getClientOriginalExtension();

        $doc1->move(public_path('business_signatures'), $new_name1);

    }


    //    return $request->all();

       $businessProfile = BusinessProfile::create([
        'user_id' => $request->user()->id,
        'b_name' => $request->b_name,
        'b_address' => $request->b_address,
        'b_phone' => $request->b_phone,
        'b_logo' => $new_name,
        'b_cac_no' => $request->b_cac_no,
        'b_description' => $request->b_description,
        'b_sign' => $new_name1,
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
