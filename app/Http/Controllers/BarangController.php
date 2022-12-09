<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Deskripsi_barang;
use App\Models\Katgeori_barang;
use App\Models\Status_barang;
use App\Models\Status_jual;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.daftar_barang', [
            'barang' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.tambah_barang', [
            'status_barang'     => Status_barang::all(),
            'status_jual'       => Status_jual::all(),
            'kategori_barang'   => Katgeori_barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'nama'              => 'required',
            'kode_barang'       => 'required',
            'foto'              => 'image|file|min:1024',
            'status_barang'     => 'required',
            'status_jual'       => 'required',
            'kategori_barang'   => 'required',
            'harga'             => 'required',
            'hpp'               => 'required',
            'deskripsi'         => 'required'
        ]);

        $validatedData = [
            'nama' => $request->nama,
            'kode_barang' => $request->kode_barang,
            'foto' => $request->file('foto')->store('foto-barang'),
            'status_barang' => $request->status
        ];

        // if ($request->file('gambar')) {
        //     $validatedData['image'] = $request->file('gambar')->store('post-image');
        // }


        $barang_head = Barang::create($validatedData);

        $id_barang = $barang_head->id;

        $dataDeskripsi = [
            'barang_id' => $id_barang,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ];

        Deskripsi_barang::create($dataDeskripsi);

        return redirect('/barang')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
