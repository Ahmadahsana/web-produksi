<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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

    public function buat_pengiriman(Prod_kirim_barang $pengiriman_id)
    {
        return view('produksi.pengiriman.edit_pengiriman', [
            'tittlePage'        => 'Pengiriman',
            'pengiriman' => $pengiriman_id
        ]);
    }

    public function edit_pengiriman(Request $request)
    {
        if (isset($request->biaya_pengiriman)) {
            // dd($request->all());
            // melakukan query untuk mengambil biaya dari semua proses produksi
            $data_semua_harga = Order_detail::where('id', $request->order_detail_id)->with(['mentahan', 'finishing', 'jok', 'packing', 'pengiriman'])->first();
            dd($data_semua_harga);

            $dataUpdate = [
                'biaya_pengiriman' => $request->biaya_pengiriman,
                'biaya_perakitan' => $request->biaya_perakitan,
                'biaya_service' => $request->biaya_service,
                'biaya_total' => $request->biaya_pengiriman + $request->biaya_perakitan + $request->biaya_service,
                'is_selesai' => 1
            ];

            // dd($dataUpdate);
            Prod_kirim_barang::where('id', $request->pengiriman_id)->update($dataUpdate);

            $data_update_status = [
                'status_pengerjaan_id' => 8
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);


            return redirect('/pengiriman')->with('success', 'Proses pengiriman barang berhasil');
        } else {
            // return $request->all();
            $data_proses = [
                'tgl_diproses' => date("Y-m-d H:i:s")
            ];

            Prod_kirim_barang::where('id', $request->pengiriman_id)->update($data_proses);

            return redirect('/pengiriman')->with('success', 'Proses pengiriman barang berhasil');
        }
    }
}
