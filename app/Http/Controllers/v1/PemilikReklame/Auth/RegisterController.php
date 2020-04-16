<?php

namespace App\Http\Controllers\v1\PemilikReklame\Auth;

use App\Http\Resources\PemilikReklameResource;
use App\PemilikReklame;
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
        $this->middleware('guest:api-pemilik');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'no_izin' => 'required',
            'nama_perusahaan' => 'required',
            'no_telp' => 'required',
            'email' => 'required|unique:pemilik_reklames',
            'password' => 'required'
        ]);

        $user= new PemilikReklame();
        $user->no_izin = $request->no_izin;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->no_telp = $request->no_telp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Anda berhasil registrasi',
            'data' => new PemilikReklameResource($user),
            'meta' => [
                'token' => $user->api_token
            ],
        ]);

    }

}
