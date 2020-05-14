<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserAddressStoreRequest;
use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;

class UserAddressesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        //
        $addresses = $request->user()->addresses;

        return UserAddressResource::collection($addresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddressStoreRequest $request)
    {
        // $request->user()->addresses()->save(UserAddress::create($request->only('location')));

        $request->user()->addresses()->update([
            'default' => false,
        ]);

        $address = UserAddress::create([
            'user_id'  => $request->user()->id,
            'location' => $request->location ?? '',
            'default'  => true
        ]);

        return new UserAddressResource($address);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 地址默认值
    public function select(Request $request)
    {
        // $request->user()->addresses->each(function($address) use ($request) {
        //     if ($address->id == $request->address_id) {
        //         $address->update([
        //             'default' => true,
        //         ]);
        //     } else {
        //         $address->update([
        //             'default' => false,
        //         ]);
        //     }
        // });

        $request->user()->addresses()->update([
            'default' => false,
        ]);

        $address = UserAddress::find($request->address_id);
        $address->default = true;
        $address->save();

    }
}
