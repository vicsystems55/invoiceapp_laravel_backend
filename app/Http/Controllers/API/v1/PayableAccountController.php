<?php

namespace App\Http\Controllers\API\v1;
use App\Http\Controllers\Controller;

use App\Models\PayableAccount;
use App\Http\Requests\StorePayableAccountRequest;
use App\Http\Requests\UpdatePayableAccountRequest;

class PayableAccountController extends Controller
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
     * @param  \App\Http\Requests\StorePayableAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayableAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayableAccount  $payableAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PayableAccount $payableAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayableAccountRequest  $request
     * @param  \App\Models\PayableAccount  $payableAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayableAccountRequest $request, PayableAccount $payableAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayableAccount  $payableAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayableAccount $payableAccount)
    {
        //
    }
}
