<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_packing;
use App\Models\Vendor_produksi;
use Illuminate\Http\Request;

class ProdPackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produksi.packing.list_packing', [
            'tittlePage' => 'List Packing',
            'packing' => Order_detail::where('status_pengerjaan_id', 6)->get()
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
     * @param  \App\Models\Prod_packing  $prod_packing
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_packing $prod_packing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_packing  $prod_packing
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_packing $prod_packing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_packing  $prod_packing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_packing $prod_packing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_packing  $prod_packing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_packing $prod_packing)
    {
        //
    }

    public function buat_packing(Prod_packing $packing_id)
    {
        return view('produksi.packing.edit_packing', [
            'tittlePage'        => 'PACKING',
            'packing' => $packing_id,
            'vendor' => Vendor_produksi::all(),
            'packings' => Barang::where('kategori_barang_id', 4)->get()
        ]);
    }
}
