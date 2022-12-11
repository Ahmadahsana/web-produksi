<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi_barang;
use Illuminate\Http\Request;

class TransaksiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.admin.daftar_transaksi_barang', [
            'transaksibarang'   =>  Transaksi_barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang'       =>  'required',
            'jumlah'            =>  'required'
        ]);

        $stokBarang = Transaksi_barang::where('kode_barang', $request->kode_barang)->latest()->get();

        // dd($stokBarang);
        if ($stokBarang->isEmpty()) {
            // ini jika stok sebelumnya belum ada.
            $data = [
                'kode_barang'       =>  $request->kode_barang,
                'stok_awal'         => 0,
                'stok_akhir'        => $request->jumlah, //stok akhir iku tak padakke jumlah mergo stok awale 0
                'jumlah'            =>  $request->jumlah,
                'jenis_transaksi'   => 'Debit',
                'keterangan'        => 'dari input stok',
            ];
        } else {
            // ini jika sebelumnya sudah ada stok
            $data = [
                'kode_barang'       =>  $request->kode_barang,
                'stok_awal'         => $stokBarang[0]['stok_akhir'],
                'stok_akhir'        => $request->jumlah + $stokBarang[0]['stok_akhir'], //stok akhir iku tak padakke jumlah mergo stok awale 0
                'jumlah'            =>  $request->jumlah,
                'jenis_transaksi'   => 'Debit',
                'keterangan'        => 'Dari Input Stok' . auth()->user(),
            ];
        }



        Transaksi_barang::create($data);
        return redirect('/barang')->with('success', 'Tambah Stok Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi_barang  $transaksi_barang
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi_barang $transaksi_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi_barang  $transaksi_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi_barang $transaksi_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi_barang  $transaksi_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi_barang $transaksi_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi_barang  $transaksi_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi_barang $transaksi_barang)
    {
        //
    }
}
