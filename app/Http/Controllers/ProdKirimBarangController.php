<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_keuntungan;
use App\Models\Prod_kirim_barang;
use App\Models\Riwayat_pengerjaan;
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

            $dataUpdate = [
                'biaya_pengiriman' => $request->biaya_pengiriman,
                'biaya_perakitan' => $request->biaya_perakitan,
                'biaya_service' => $request->biaya_service,
                'biaya_total' => $request->biaya_pengiriman + $request->biaya_perakitan + $request->biaya_service,
                'is_selesai' => 1
            ];

            Prod_kirim_barang::where('id', $request->pengiriman_id)->update($dataUpdate);

            $data_update_status = [
                'status_pengerjaan_id' => 8
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);

            // melakukan query untuk mengambil biaya dari semua proses produksi
            $query_cari_biaya = Order_detail::where('id', $request->order_detail_id)->with(['mentahan', 'finishing', 'jok', 'packing', 'pengiriman'])->first();
            $biaya_mentahan = $query_cari_biaya['mentahan']->biaya;
            $biaya_finishing = $query_cari_biaya['finishing']->biaya;
            $biaya_jok = $query_cari_biaya['jok']->biaya;
            $biaya_packing = $query_cari_biaya['packing']->biaya;
            $biaya_pengiriman = $query_cari_biaya['pengiriman']->biaya_total;

            $total_biaya_produksi = $biaya_mentahan + $biaya_finishing + $biaya_jok + $biaya_packing + $biaya_pengiriman;

            $data_keuntungan = [
                'order_detail_id' => $request->order_detail_id,
                'mentahan' => $biaya_mentahan,
                'finishing' => $biaya_finishing,
                'jok' => $biaya_jok,
                'packing' => $biaya_packing,
                'pengiriman' => $biaya_pengiriman,
                'total' => $total_biaya_produksi,
                'harga_jual' => $query_cari_biaya->total_harga,
                'keuntungan' => $query_cari_biaya->total_harga - $total_biaya_produksi
            ];

            // dd($data_keuntungan);

            Prod_keuntungan::create($data_keuntungan);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 7,
                'keterangan' => 'selesai'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////

            return redirect('/pengiriman')->with('success', 'Proses pengiriman barang berhasil');
        } else {
            $data_proses = [
                'tgl_diproses' => date("Y-m-d H:i:s")
            ];

            Prod_kirim_barang::where('id', $request->pengiriman_id)->update($data_proses);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 7,
                'keterangan' => 'masuk'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////

            return redirect('/pengiriman')->with('success', 'Proses pengiriman barang berhasil');
        }
    }
}
