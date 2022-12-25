<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sales;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('dashboard.admin.detail_profil', [
            'tittlePage'    =>  "Detail Profil",
            'user'          =>  User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.edit_profil', [
            'tittlePage'    =>  'Edit Profil ' . auth()->user()->nama,
            'user'          =>  User::where('id', auth()->user()->id)->first(),
            'provinsi' => Province::with(['city', 'city.district'])->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama'      => 'required',
            'username'  => 'required',
            'nomor'     => 'required',
            'alamat'    => 'required',
            'kecamatan' => 'required',
            'kota'      => 'required',
            'provinsi'  => 'required',
        ];

        $validateEdit   =   $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }

            $validateEdit['foto']  =   $request->file('foto')->store('foto-sales');
        }
        User::where('id', auth()->user()->id)
            ->update($validateEdit);

        return redirect('/dashboard')->with('success', 'Update Profil Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
