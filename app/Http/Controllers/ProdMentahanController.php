<?php

namespace App\Http\Controllers;

use App\Models\Prod_mentahan;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_finishing;
use App\Models\Prod_mentahan_detail;
use App\Models\Riwayat_pengerjaan;
use App\Models\Transaksi_barang;
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
        // return $request->all();
        $total_biaya = 0;
        $data_kredit = [];
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
                        'keterangan' => 'produksi mentahan',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ];
                }
            }
        }

        // return $data_kredit;

        Transaksi_barang::insert($data_kredit);



        $data = [
            'Order_detail_id' => $request->order_detail_id,
            'biaya' => $total_biaya,
            'is_selesai' => 1
        ];

        // return $data;

        $prod_mentahan = Prod_mentahan::create($data);

        foreach ($request->jumlah_barang as $no => $jum) {
            $data_detail = [
                'prod_mentahan_id' => $prod_mentahan->id,
                'kode_barang' => $request->kode_barang[$no],
                'jumlah' => $request->jumlah_barang[$no],
            ];

            Prod_mentahan_detail::create($data_detail);
        }

        $data_update = [
            'status_pengerjaan_id' => 4
        ];
        Order_detail::where('id', $request->order_detail_id)->update($data_update);

        ////////////////////////insert ke riwayat pengerjaan
        $data_riwayat_order = [
            'order_detail_id' => $request->order_detail_id,
            'status_pengerjaan_id' => 3,
            'keterangan' => 'selesai'
        ];

        Riwayat_pengerjaan::create($data_riwayat_order);
        ////////////////////////////////////////////////////

        $data_finishing = [
            'order_detail_id' => $request->order_detail_id
        ];
        Prod_finishing::create($data_finishing);
        return redirect('/mentahan')->with('success', 'Konfirmasi Mentahan Sukses !!');
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
            'tittlePage' => 'Buat Mentahan',
            'order_detail' => $order_detail,
            'mentahan' => Barang::where('kategori_barang_id', 1)->get()
        ]);
    }
}
