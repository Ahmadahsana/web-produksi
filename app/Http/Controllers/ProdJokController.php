<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_jok;
use App\Models\Prod_jok_detail;
use App\Models\Prod_packing;
use App\Models\Vendor_produksi;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

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
            'vendor' => Vendor_produksi::all(),
            'joks' => Barang::where('kategori_barang_id', 2)->get()
        ]);
    }

    public function edit_jok(Request $request)
    {
        // return $request->all();
        // return $request->order_detail_id;
        if (isset($request->biaya)) {
            // ini dari vendor lain
            $dataUpdate = [
                'biaya' => $request->biaya,
                'is_selesai' => 1
            ];
            Prod_jok::where('id', $request->jok_id)->update($dataUpdate);

            $data_update_status = [
                'status_pengerjaan_id' => 6
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);

            $data_packing = [
                'order_detail_id' => $request->order_detail_id
            ];
            Prod_packing::create($data_packing);
        } elseif (isset($request->kode_barang)) {
            // ini dari vendor sendiri
            // return $request->all();
            $total_biaya = 0;
            foreach ($request->jumlah_barang as $no => $jum) {
                $biaya = $request->jumlah_barang[$no] * $request->hpp_barang[$no];
                $total_biaya = $total_biaya + $biaya;
            }

            // insert ke tabel prod_jok
            $dataUpdate = [
                'biaya' => $total_biaya,
                'is_selesai' => 1
            ];

            Prod_jok::where('id', $request->jok_id)->update($dataUpdate);

            // insert ke prod_jok_detail
            foreach ($request->jumlah_barang as $no => $jum) {
                $data_detail = [
                    'prod_jok_id' => $request->jok_id,
                    'kode_barang' => $request->kode_barang[$no],
                    'jumlah' => $request->jumlah_barang[$no],
                ];

                Prod_jok_detail::create($data_detail);
            }

            $data_update_status = [
                'status_pengerjaan_id' => 6
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);

            $data_packing = [
                'order_detail_id' => $request->order_detail_id
            ];
            Prod_packing::create($data_packing);
        } else {
            $data_vendor = [
                'vendor_produksi_id' => $request->vendor,
                'tgl_diproses' => date("Y-m-d H:i:s")
            ];

            Prod_jok::where('id', $request->jok_id)->update($data_vendor);
        }

        return redirect('/jok')->with('success', 'Berhasil proses jok');
    }
}
