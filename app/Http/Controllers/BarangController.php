<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Status_jual;
use Illuminate\Http\Request;
use App\Models\Status_barang;
use App\Models\Kategori_barang;
use Illuminate\Support\Facades\Storage;

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
            'tittlePage'    =>  'LIST BARANG',
            'barang'        => Barang::with('Transaksi_barang')->get()
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
            'tittlePage'        => 'TAMBAH BARANG',
            'status_barang'     => Status_barang::all(),
            'status_jual'       => Status_jual::all(),
            'kategori_barang'   => Kategori_barang::all()
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

        $validatedCreate = $request->validate([
            'nama'              =>  'required',
            'kode_barang'       =>  'required',
            'foto'              =>  'image|file',
            'status_barang_id'  =>  'required',
            'status_jual_id'    =>  'required',
            'kategori_barang_id' =>  'required',
            'harga'             =>  'required',
            'hpp'               =>  'required',
            'deskripsi'         =>  'required',
        ]);

        if ($request->file('foto')) {
            $validatedCreate['foto'] = $request->file('foto')->store('img-barang');
        }

        Barang::create($validatedCreate);

        return redirect('/barang')->with('success', 'Sukses Menambah Barang !!');
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
        return view('dashboard.admin.edit_barang', [
            'tittlePage'        => 'EDIT BARANG',
            'barang'            => $barang,
            'status_barang'     => Status_barang::all(),
            'status_jual'       => Status_jual::all(),
            'kategori_barang'   => Kategori_barang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules  = [
            'nama'                  =>  'required',
            'kode_barang'           =>  'required',
            'status_barang_id'      =>  'required',
            'status_jual_id'        =>  'required',
            'kategori_barang_id'    =>  'required',
            'foto'                  =>  'image',
            'harga'                 =>  'required',
            'hpp'                   =>  'required',
            'deskripsi'             =>  'required',
        ];

        $validateEdit = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }

            $validateEdit['foto']  =   $request->file('foto')->store('img-barang');
        }

        Barang::where('id', $barang->id)
            ->update($validateEdit);

        return redirect('/barang')->with('success', 'Update Barang Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        if ($barang->foto) {
            Storage::delete($barang->foto);
        }
        Barang::destroy($barang->id);

        return redirect('/barang')->with('success', 'Delete Barang Success');
    }
}
