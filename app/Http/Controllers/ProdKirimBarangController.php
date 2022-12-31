<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Prod_kirim_barang;
use Illuminate\Http\Request;

class ProdKirimBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produksi.pengiriman.list_pengiriman', [
            'tittlePage' => 'List pengiriman barang',
            'pengiriman' => Order_detail::where('status_pengerjaan_id', 7)->get()
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
     * @param  \App\Models\Prod_kirim_barang  $prod_kirim_barang
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_kirim_barang $prod_kirim_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_kirim_barang  $prod_kirim_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_kirim_barang $prod_kirim_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_kirim_barang  $prod_kirim_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_kirim_barang $prod_kirim_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_kirim_barang  $prod_kirim_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_kirim_barang $prod_kirim_barang)
    {
        //
    }
}
