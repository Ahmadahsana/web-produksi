<?php

namespace App\Http\Controllers;

use App\Models\Prod_mentahan;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class ProdMentahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produksi.mentahan.list_mentahan', [
            'tittlePage' => 'List Mentahan',
            'mentahan' => Order_detail::where('status_pengerjaan_id', 3)->get()
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
     * @param  \App\Models\Prod_mentahan  $prod_mentahan
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_mentahan $prod_mentahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_mentahan  $prod_mentahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_mentahan $prod_mentahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_mentahan  $prod_mentahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_mentahan $prod_mentahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_mentahan  $prod_mentahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_mentahan $prod_mentahan)
    {
        //
    }

    public function buat_mentahan(Order_detail $order_detail)
    {
        // return $order_detail;
        return view('produksi.mentahan.tambah_mentahan', [
            'tittlePage' => 'List Mentahan',
            'order_detail' => $order_detail
        ]);
    }
}
