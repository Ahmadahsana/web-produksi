<?php

namespace App\Http\Controllers;

use App\Models\Prod_mentahan;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Prod_finishing;
use App\Models\Prod_mentahan_detail;
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

        $total_biaya = 0;
        foreach ($request->jumlah_barang as $no => $jum) {
            $biaya = $request->jumlah_barang[$no] * $request->hpp_barang[$no];
            $total_biaya = $total_biaya + $biaya;
        }



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

        $data_finishing = [
            'order_detail_id' => $request->order_detail_id
        ];
        Prod_finishing::create($data_finishing);
        return redirect('/finishing')->with('success', 'Konfirmasi Mentahan Sukses !!');
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
