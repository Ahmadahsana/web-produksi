@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->

    <div class="card-body">
        <form action="/vendor" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama_vendor" class="form-label">Nama Vendor</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama_vendor" name="nama_vendor"
                        value="{{ old('nama_vendor') }}" placeholder="Nama Vendor" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                        placeholder="Nama Pemilik" value="{{ old('nama_pemilik') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="alamat" class="form-label">Alamat</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                        value="{{ old('alamat') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nomer" class="form-label">Nomer</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control" id="nomer" name="nomer" placeholder="Nomer"
                        value="{{ old('nomer') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                </div>
            </div>



            <div class="text-end">
                <button type="submit" class="btn btn-primary"
                    onclick="return confirm('Yakin ingin menambah data baru ?')">Tambah</button>
                <a href="/vendor" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection