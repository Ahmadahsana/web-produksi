<?php

namespace App\Http\Controllers;

use App\Models\Order_detail;
use App\Models\Prod_finishing;
use App\Models\Prod_jok;
use App\Models\Riwayat_pengerjaan;
use App\Models\Vendor_produksi;
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
        // return $finishing_id;
        return view('produksi.finishing.edit_finishing', [
            'tittlePage'        => 'FINISHING',
            'finishing' => $finishing_id,
            'vendor' => Vendor_produksi::all()
        ]);
    }

    public function edit_finishing(Request $request)
    {
        // return $request->all();

        if ($request->harga_finishing) {
            $data_vendor = [
                'biaya' => $request->harga_finishing + $request->harga_servis,
                'is_selesai' => 1,
                'jumlah_finishing' => $request->jumlah_finishing,
                'jumlah_service' => $request->jumlah_servis,
                'harga_finishing' => $request->harga_finishing,
                'harga_service' => $request->harga_servis,
            ];

            $data_update = [
                'status_pengerjaan_id' => 5
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 4,
                'keterangan' => 'selesai'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////

            $data_jok = [
                'order_detail_id' => $request->order_detail_id
            ];
            Prod_jok::create($data_jok);
        } else {
            $data_vendor = [
                'vendor_produksi_id' => $request->vendor,
                'tgl_diproses' => date("Y-m-d H:i:s")
            ];

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 4,
                'keterangan' => 'masuk'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////
        }

        Prod_finishing::where('id', $request->finishing_id)->update($data_vendor);

        return redirect('/finishing')->with('success', 'Berhasil proses finishing');
    }
}
