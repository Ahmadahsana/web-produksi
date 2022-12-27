<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Prod_jok;
use App\Models\Vendor_produksi;
use Illuminate\Http\Request;

class ProdJokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produksi.jok.list_jok', [
            'tittlePage' => 'List Jok',
            'jok' => Order_detail::where('status_pengerjaan_id', 5)->get()
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
     * @param  \App\Models\Prod_jok  $prod_jok
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_jok $prod_jok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_jok  $prod_jok
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_jok $prod_jok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_jok  $prod_jok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_jok $prod_jok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_jok  $prod_jok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_jok $prod_jok)
    {
        //
    }

    public function buat_jok(Prod_jok $jok_id)
    {
        return view('produksi.jok.edit_jok', [
            'tittlePage'        => 'JOK',
            'jok' => $jok_id,
            'vendor' => Vendor_produksi::all()
        ]);
    }

    public function edit_jok(Request $request)
    {
        return $request->all();


        return redirect('/finishing')->with('success', 'Berhasil proses finishing');
    }
}
