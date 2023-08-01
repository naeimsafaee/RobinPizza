<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

/**
 * @group Addresses
 *
 * APIs for user's addresses
 */
class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::query()->where('client_id' , \request()->client_id)->get();
        return response()->json(new AddressCollection($addresses));
    }


    public function store(AddressStoreRequest $request)
    {
        $address = Address::query()->create([
            'client_id' => $request->client_id,
            'title' => $request->title,
            'address' => $request->address,
            'lat_lng' => $request->lat_lng
        ]);

        return response()->json(new AddressResource($address));
    }

    public function show($id)
    {
        $address = Address::query()->findOrFail($id);
        return response()->json(new AddressResource($address));

    }


    public function update(AddressStoreRequest $request, $id)
    {
        $address = Address::query()->findOrFail($id);
        $address->title = $request->title ;
        $address->address = $request->address ;
        $address->lat_lng = $request->lat_lng ;
        $address->save();
        return response()->json(new AddressResource($address));

    }


    public function destroy($id)
    {
        $address = Address::query()->findOrFail($id);
        $address->delete();
        return response()->json('ok');
    }
}
