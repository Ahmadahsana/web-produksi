@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Tambah Barang</h4>
    </div><!-- end card header -->

    <div class="card-body">
        <form action="/barang" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Nama</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama barang" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="kode_barang" class="form-label">Kode barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode"  value="{{ old('kode_barang') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="foto" class="form-label">Foto</label>
                </div>
                <div class="col-lg-9">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Kode" required>
                    @error('foto')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="status" class="form-label">Status</label>
                </div>
                <div class="col-lg-9">
                    <select class="form-select mb-3" aria-label="Default select example" name="status">
                        <option selected disabled>Pilih status</option>
                        <option value="1">Order</option>
                        <option value="2">Ready stok</option>
                    </select>
                    @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="harga" class="form-label">Harga</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga"  value="{{ old('harga') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="deskripsi" class="form-label">Deskkripsi</label>
                </div>
                <div class="col-lg-9">
                    <textarea  class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                </div>
            </div>
            
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection