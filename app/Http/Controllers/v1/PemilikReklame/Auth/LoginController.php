<?php

namespace App\Http\Controllers\v1\PemilikReklame\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\PemilikReklameResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:api-pemilik')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('pemilik')->attempt($credentials)) {
            $user = Auth::guard('pemilik')->user();
            if ($user->active == '2') {
                return response()->json([
                    'status' => true,
                    'message' => 'Anda berhasil login',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'massage' => 'Silahkan menunggu konfirmasi dari kami',
                    'data' => (object) []
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'massage' => 'Gagal login',
                'data' => (object)[]
            ], 401);
        }
    }
}
