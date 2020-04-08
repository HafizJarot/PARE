<?php

namespace App\Http\Controllers\v1\PenyewaReklame\Auth;

use App\SuperAdmin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user= new User();
        $user->id= $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->active = '2';
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Anda berhasil registrasi',
            'data' => $user,
        ], 201);

    }


}
