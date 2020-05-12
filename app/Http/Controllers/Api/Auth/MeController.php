<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\PrivateUserResource;

class MeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //
    public function me(Request $request)
    {
        return [
            'data' => new PrivateUserResource($request->user()),
        ];
    }

    public function getCart(Request $request)
    {
        return new CartResource($request->user()->cart());
    }
}
