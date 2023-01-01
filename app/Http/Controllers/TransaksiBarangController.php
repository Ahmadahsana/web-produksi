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
            'tittlePage'    => 'TAMBAH TRANSAKSI BARANG',
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
        // $mentahan = Barang::where('kategori_barang_id', 1)->get();
        // $aksesoris = Barang::where('kategori_barang_id', 2)->get();

        $kode_barang = $request->kode_barang;
        $cari_kategori_barang = Barang::where('kode_barang', $kode_barang)->first();
        $kategori_barang = $cari_kategori_barang['kategori_barang_id'];

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
                'keterangan'        => 'Dari Input Stok',
            ];
        } else {
            // ini jika sebelumnya sudah ada stok
            $data = [
                'kode_barang'       =>  $request->kode_barang,
                'stok_awal'         => $stokBarang[0]['stok_akhir'],
                'stok_akhir'        => $request->jumlah + $stokBarang[0]['stok_akhir'], //stok akhir iku tak padakke jumlah mergo stok awale 0
                'jumlah'            =>  $request->jumlah,
                'jenis_transaksi'   => 'Debit',
                'keterangan'        => 'Dari Input Stok ' . auth()->user()->username,
            ];
        }

        Transaksi_barang::create($data);

        // if ($mentahan === $data['kode_barang']) {
        //     return redirect('/mentahan_barang')->with('success', 'Sukses Menambah Stok Mentahan !!');
        // } elseif ($aksesoris === $data['kode_barang']) {
        //     return redirect('/jok_aksesoris_barang')->with('success', 'Sukses Menambah Inventori Jok/Aksesoris !!');
        // }

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
