<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class RiwayatOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        return view('dashboard.sales.daftar_riwayatOrder', [
            'tittlePage'    =>  'Riwayat Order',
            'orders'        =>  Order::where('sales_username', $order)->get()
        ]);
    }

    // public function riwayatOrder(Order $order)
    // {
    //     return view('dashboard.sales.daftar_riwayatOrder', [
    //         'tittlePage'    =>  'Riwayat Order',
    //         'orders'        =>  Order::where('sales_username', $order->sales_username)->get()
    //     ]);
    // }


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
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Order_detail $order_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_detail $order_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_detail $order_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_detail  $order_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_detail $order_detail)
    {
        //
    }
}
