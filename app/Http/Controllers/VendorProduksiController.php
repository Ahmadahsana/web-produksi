<?php

namespace App\Http\Controllers;

use App\Models\Vendor_produksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.vendor', [
            'tittlePage'    => 'LIST VENDOR',
            'vendor'        => Vendor_produksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tambah_vendor', [
            'tittlePage'        => 'TAMBAH VENDOR',
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
        $validatedCreate = $request->validate([
            'nama_vendor'       =>  'required',
            'nama_pemilik'      =>  'required',
            'alamat'            =>  'required',
            'nomer'             =>  'required',
            'email'             =>  'required|email',
        ]);

        Vendor_produksi::create($validatedCreate);

        return redirect('/vendor')->with('success', 'Sukses Menambah Vendor !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor_produksi  $vendor_produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor_produksi $vendor_produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor_produksi  $vendor_produksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor_produksi $vendor_produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor_produksi  $vendor_produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor_produksi $vendor_produksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor_produksi  $vendor_produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor_produksi $vendor_produksi)
    {
        //
    }
}
