<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    //登出
    public function logout(Request $request)
    {
        auth('api')->logout();
        return response(null, 204);
    }
}
