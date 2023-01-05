<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_kirim_barang;
use App\Models\Prod_packing;
use App\Models\Prod_packing_detail;
use App\Models\Prod_pengiriman;
use App\Models\Riwayat_pengerjaan;
use App\Models\Transaksi_barang;
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

    public function edit_packing(Request $request)
    {
        // return $request->all();
        // return $request->order_detail_id;
        if (isset($request->biaya)) {
            // ini dari vendor lain
            $dataUpdate = [
                'biaya' => $request->biaya,
                'is_selesai' => 1
            ];
            Prod_packing::where('id', $request->jok_id)->update($dataUpdate);

            $data_update_status = [
                'status_pengerjaan_id' => 7
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);

            $data_pengiriman = [
                'order_detail_id' => $request->order_detail_id
            ];
            Prod_kirim_barang::create($data_pengiriman);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 6,
                'keterangan' => 'selesai'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////
        } elseif (isset($request->kode_barang)) {
            // ini dari vendor sendiri
            // return $request->all();
            $data_kredit = [];
            $total_biaya = 0;
            foreach ($request->jumlah_barang as $no => $jum) {
                $biaya = $request->jumlah_barang[$no] * $request->hpp_barang[$no];
                $total_biaya = $total_biaya + $biaya;

                $query_stok_terakhir = Transaksi_barang::Where('kode_barang', $request->kode_barang[$no])->latest('created_at')->first();

                if ($query_stok_terakhir == null) {
                    return redirect()->back()->with('danger', 'Stok tidak cukup')->withInput();
                } else {
                    if ($query_stok_terakhir->stok_akhir < $request->jumlah_barang[$no]) {
                        return redirect()->back()->with('danger', 'Stok tidak cukup')->withInput();
                    } else {
                        $stok_akhir = $query_stok_terakhir->stok_akhir;

                        $data_kredit[] = [
                            'kode_barang' => $request->kode_barang[$no],
                            'stok_awal' => $stok_akhir,
                            'stok_akhir' => $stok_akhir - $request->jumlah_barang[$no],
                            'jumlah' => $request->jumlah_barang[$no],
                            'jenis_transaksi' => 'Kredit',
                            'keterangan' => 'produksi packing',
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ];
                    }
                }
            }

            Transaksi_barang::insert($data_kredit);

            // insert ke tabel prod_packing
            $dataUpdate = [
                'biaya' => $total_biaya,
                'is_selesai' => 1
            ];

            Prod_packing::where('id', $request->packing_id)->update($dataUpdate);

            // insert ke prod_packing_detail
            foreach ($request->jumlah_barang as $no => $jum) {
                $data_detail = [
                    'prod_packing_id' => $request->packing_id,
                    'kode_barang' => $request->kode_barang[$no],
                    'jumlah' => $request->jumlah_barang[$no],
                ];

                Prod_packing_detail::create($data_detail);
            }

            $data_update_status = [
                'status_pengerjaan_id' => 7
            ];
            Order_detail::where('id', $request->order_detail_id)->update($data_update_status);

            $data_pengiriman = [
                'order_detail_id' => $request->order_detail_id
            ];
            Prod_kirim_barang::create($data_pengiriman);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 6,
                'keterangan' => 'selesai'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////
        } else {
            $data_vendor = [
                'vendor_produksi_id' => $request->vendor,
                'tgl_diproses' => date("Y-m-d H:i:s")
            ];

            Prod_packing::where('id', $request->packing_id)->update($data_vendor);

            ////////////////////////insert ke riwayat pengerjaan
            $data_riwayat_order = [
                'order_detail_id' => $request->order_detail_id,
                'status_pengerjaan_id' => 6,
                'keterangan' => 'masuk'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);
            ////////////////////////////////////////////////////
        }

        return redirect('/packing')->with('success', 'Berhasil proses packing');
    }
}
