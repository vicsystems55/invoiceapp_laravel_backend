<?php

namespace App\Http\Controllers\API\v1;
use App\Models\BillableItem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillableItemRequest;
use App\Http\Requests\UpdateBillableItemRequest;

class BillableItemController extends Controller
{
    /**
     * Create a billable item
     *
     * @header Authorization Bearer
     * @bodyParam business_profile_id int required
     * @bodyParam image file
     * @bodyParam price float required Example: 430430434.34
     * @bodyParam description string required
     *
     * @param  \App\Http\Requests\StoreBillableItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createBillableItem(Request $request)
    {
        //

            if ($request->file('billable_item_image')) {
        # code...
        $doc = $request->file('billable_item_image');

        $new_name = rand().".".$doc->getClientOriginalExtension();

        $doc->move(public_path('billable_items_images'), $new_name);

    }

        $billableItem = BillableItem::updateOrCreate([
            'user_id' => $request->user()->id,
            'business_profile_id' => $request->business_profile_id,
            'image' => $new_name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return $billableItem;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillableItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillableItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillableItem  $billableItem
     * @return \Illuminate\Http\Response
     */
    public function show(BillableItem $billableItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillableItemRequest  $request
     * @param  \App\Models\BillableItem  $billableItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillableItemRequest $request, BillableItem $billableItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillableItem  $billableItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillableItem $billableItem)
    {
        //
    }
}
