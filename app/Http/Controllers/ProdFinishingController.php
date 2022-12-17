<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Prod_finishing;
use Illuminate\Http\Request;

class ProdFinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produksi.finishing.list_finishing', [
            'tittlePage' => 'List Finishing',
            'finishing' => Order_detail::where('status_pengerjaan_id', 4)->get()
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
     * @param  \App\Models\Prod_finishing  $prod_finishing
     * @return \Illuminate\Http\Response
     */
    public function show(Prod_finishing $prod_finishing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prod_finishing  $prod_finishing
     * @return \Illuminate\Http\Response
     */
    public function edit(Prod_finishing $prod_finishing)
    {
        return $prod_finishing;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prod_finishing  $prod_finishing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prod_finishing $prod_finishing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prod_finishing  $prod_finishing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prod_finishing $prod_finishing)
    {
        //
    }

    public function buat_finishing(Prod_finishing $finishing_id)
    {
        return $finishing_id;
    }
}
