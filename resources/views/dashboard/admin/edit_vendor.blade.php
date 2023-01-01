@extends('dashboard.layout.main')

@section('container')

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->
    {{-- {{ dd($order) }} --}}
    <div class="card-body">
        <form action="/vendor/{{ $vendorr->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama_vendor" class="form-label">Nama Vendor</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control @error('nama_vendor') is-invalid @enderror" id="nama_vendor"
                        name="nama_vendor" placeholder="Masukkan Nama Vendor"
                        value="{{ old('nama_vendor' , $vendorr->nama_vendor) }}" autocomplete="off" autofocus>
                </div>
                @error('nama_vendor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror"
                        id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik"
                        value="{{ old('nama_pemilik', $vendorr->nama_pemilik) }}" autocomplete="off" autofocus>
                </div>
                @error('nama_pemilik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="alamat" class="form-label">Alamat</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" placeholder="Masukkan Alamat" autocomplete="off"
                        value="{{ old('alamat', $vendorr->alamat) }}">
                </div>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nomer" class="form-label">Nomor Telpon</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control @error('nomer') is-invalid @enderror" id="nomer"
                        name="nomer" placeholder="Masukkan Nomor Telpon" value="{{ old('nomer', $vendorr->nomer) }}"
                        autocomplete="off">
                </div>
                @error('nomer')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukkan Email" value="{{ old('email', $vendorr->email) }}"
                        autocomplete="off">
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary"
                    onclick="return confirm('Yakin ingin mengubah data {{ strtoupper($vendorr->nama_vendor) }} ?')">Update</button>
                <a href="/vendor" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection