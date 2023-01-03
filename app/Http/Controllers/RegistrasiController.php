<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi', [
            'tittlePage'    => 'Sign Up',
            'provinsi' => Province::with(['city', 'city.district'])->get()
        ]);
    }

    public function store(Request $request)
    {
        // $password1 = bcrypt($request->password1);
        $rules          = [
            'foto'      =>  'image|max:5120',
            'nama'      =>  'required',
            'username'  =>  'required',
            'password'  =>  'required|confirmed',
            'nomor'      =>  'required',
            'email'     =>  'required|email',
            'alamat'    =>  'required',
            'provinsi'    =>  'required',
            'kota'    =>  'required',
            'kecamatan'    =>  'required',
        ];
        $validatecreate = $request->validate($rules);

        $validatecreate += ['status_user_id' => 0];
        $validatecreate += ['role_id' => 2];

        if ($request->file('foto')) {
            $validatecreate['foto']    = $request->file('foto')->store('foto-sales');
        }

        $validatecreate['password'] = bcrypt($validatecreate['password']);
        User::create($validatecreate);

        return redirect('/login')->with('success', 'Registrasi Berhasil !!');
    }
}
