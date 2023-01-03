@extends('dashboard.layout.main')

@section('container')

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->
    {{-- {{ dd($order) }} --}}
    <div class="card-body">
        <div class="row text-center">
            <div class="col">
                @if ($barang->foto)
                <img src="{{ asset('storage/'. $barang->foto) }}" alt="" class="rounded-3 shadow-lg my-3" height="300px"
                    width="420px">
                @else
                <img src="https://source.unsplash.com/random/300×300?{{ $barang->nama }}" alt=""
                    class="rounded-3 shadow-lg my-3" height="300px" width="420px">
                @endif
            </div>
        </div>
        <form action="/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="foto" class="form-label">Masukkan Gambar</label>
                </div>
                <div class="col-lg-9">
                    <input class="form-control" type="hidden" name="oldFoto" id="oldFoto">
                    <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" id="foto">
                    @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        placeholder="Masukkan nama" value="{{ old('nama', $barang->nama) }}" autocomplete="off"
                        autofocus>
                </div>
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="kode_barang" class="form-label">Kode
                        Barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang"
                        name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off"
                        value="{{ old('kode_barang', $barang->kode_barang) }}">
                </div>
                @error('kode_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="status_barang_id" class="form-label">Status Barang</label>
                </div>
                <div class="col-lg-9">
                    <select class="form-select mb-3" aria-label="Default select example" name="status_barang_id">
                        @foreach ($status_barang as $sb)
                        @if (!old('status_barang_id', $sb->id) == $sb->id)
                        <option value="{{ $sb->id }}" selected>{{ $sb->nama }}</option>
                        @else
                        <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('status_barang_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="status_jual_id" class="form-label">Status Jual</label>
                </div>
                <div class="col-lg-9">
                    <select class="form-select mb-3" aria-label="Default select example" name="status_jual_id">
                        @foreach ($status_jual as $sj)
                        @if (!old('status_jual_id', $sj->id) == $sj->id)
                        <option value="{{ $sj->id }}" selected>{{ $sj->nama }}</option>
                        @else
                        <option value="{{ $sj->id }}">{{ $sj->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('status_jual_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="kategori_barang_id" class="form-label">Kategori Barang</label>
                </div>
                <div class="col-lg-9">
                    <select class="form-select mb-3" aria-label="Default select example" name="kategori_barang_id">
                        @foreach ($kategori_barang as $kb)
                        @if (!old('kategori_barang_id', $kb->id) == $kb->id)
                        <option value="{{ $kb->id }}" selected>{{ $kb->nama }}</option>
                        @else
                        <option value="{{ $kb->id }}">{{ $kb->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('kategori_barang_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" placeholder="Masukkan Harga" value="{{ $barang->harga }}" autocomplete="off">
                </div>
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="hpp" class="form-label">HPP Barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control @error('hpp') is-invalid @enderror" id="hpp" name="hpp"
                        placeholder="Masukkan hpp" value="{{ $barang->hpp }}" autocomplete="off">
                </div>
                @error('hpp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="satuan" class="form-label">Pilih Satuan Barang</label>
                </div>
                <div class="col-lg-9">
                    <select class="form-select mb-3" aria-label="Default select example" name="satuan">

                        <option value="Cm" @if ($barang->satuan == 'Cm')
                            selected
                            @endif>Cm</option>
                        <option value="m" @if ($barang->satuan == 'm')
                            selected
                            @endif>m</option>
                        <option value="Kg" @if ($barang->satuan == 'Kg')
                            selected
                            @endif>Kg</option>
                        <option value="Pcs" @if ($barang->satuan == 'Pcs')
                            selected
                            @endif>Pcs</option>
                        <option value="Liter" @if ($barang->satuan == 'Liter')
                            selected
                            @endif>Liter</option>
                    </select>
                    @error('satuan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="deskripsi" class="form-label">deskripsi Barang</label>
                </div>
                <div class="col-lg-9">
                    <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                        name="deskripsi" placeholder="Masukkan deskripsi"
                        autocomplete="off"> {!! old('deskripsi', $barang->deskripsi) !!} </textarea>
                </div>
                @error('hpp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="text-end">
                <button type="submit" class="btn btn-primary"
                    onclick="return confirm('Yakin ingin mengubah data {{ strtoupper($barang->nama) }} ?')">Update</button>
                @if ($barang->kategori_barang_id == 1)
                <a href="/barangmentahan" class="btn btn-danger">Kembali</a>
                @elseif ($barang->kategori_barang_id == 2)
                <a href="/aksesorisjok" class="btn btn-danger">Kembali</a>
                @elseif ($barang->kategori_barang_id == 3)
                <a href="/barang" class="btn btn-danger">Kembali</a>
                @elseif ($barang->kategori_barang_id == 4)
                <a href="/bungkuspacking" class="btn btn-danger">Kembali</a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection