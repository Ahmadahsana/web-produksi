<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.daftar_sales', [
            'tittlePage'    =>  'LIST SALES',
            'sales' => User::where('role_id', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tambah_sales', [
            'tittlePage'    =>  'TAMBAH SALES',
            'provinsi' => Province::with(['city', 'city.district'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'gambar' => 'image|file|max:1024',
            'status' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd($request->file('gambar'));

        $validatedData = [
            'nama' => $request->nama,
            'username' => $request->username,
            'nomor' => $request->nomor,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'foto' => $request->file('gambar')->store('foto-sales'),
            'status_user_id' => $request->status,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ];

        User::create($validatedData);

        return redirect('/sales')->with('success', 'Data sales berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.edit_sales', [
            'tittlePage'    =>  'EDIT SALES',
            'user' => User::where('id', auth()->user()->id)->with(['province', 'city', 'district'])->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|max:255',
    //         'username' => 'required',
    //         'nomor' => 'required',
    //         'alamat' => 'required',
    //         'provinsi' => 'required',
    //         'kota' => 'required',
    //         'kecamatan' => 'required',
    //     ]);

    //     User::where('id', $user->id)->update($validatedData);
    //     return redirect('/sales');
    // }

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

    public function list_sales()
    {
        return view('dashboard.admin.daftar_sales', [
            'tittlePage'    =>  'LIST SALES',
            'sales' => User::where('role_id', 2)->get()
        ]);
    }

    public function show_sales(User $user)
    {
        return view('dashboard.admin.show_sales', [
            'tittlePage'    =>  'DETAIL PROFIL',
            'sales' => $user->where('id', $user->id)->with(['province', 'city', 'district'])->first()
        ]);
    }

    public function sales_update(User $user, Request $request)
    {
        // return $request;

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ]);

        User::where('id', $user->id)->update($validatedData);
        return redirect()->back()->back()->with('success', 'Data barang berhasil ditambahkan');
    }

    // public function detail_profil()
    // {
    //     return view('dashboard.admin.detail_profil', [
    //         'tittlePage'    =>  "Detail Profil",
    //     ]);
    // }

    // public function edit_profil()
    // {
    //     return view('dashboard.admin.edit_profil', [
    //         'tittlePage'    =>  'Edit Profil ' . auth()->user()->nama,
    //         'user'          =>  User::where('id', auth()->user()->id)->first()
    //     ]);
    // }

    public function update_profil(Request $request, User $user)
    {
        $update = $request->validate([
            'nama'      => 'required',
            'username'  => 'required',
            'nomor'     => 'required',
            'alamat'    => 'required',
            'kecamatan' => 'required',
            'kota'      => 'required',
            'provinsi'  => 'required',
            'foto'      => 'required',
        ]);


        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }

            $update['foto']    =   $request->file('foto')->store('foto-sales');
        }

        User::where('id', auth()->user()->id)
            ->update($update);

        return redirect()->back('/dashboard')->with('success', 'Edit Profil Success');
    }
}
