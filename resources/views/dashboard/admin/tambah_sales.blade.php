@extends('dashboard.layout.main')

@section('container')
{{-- @dd($provinsi) --}}
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->

    <div class="card-body">
        <form action="/sales" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Name</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                        value="{{ old('nama') }}" required>
                    @error('nama')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
                        value="{{ old('email') }}" required>
                    @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nomor" class="form-label">Nomor</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor"
                        value="{{ old('nomor') }}" required>
                    @error('nomor')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="alamat" class="form-label">Alamat</label>
                </div>
                <div class="col-lg-9">
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="provinsi" class="form-label">provinsi</label>
                </div>
                <div class="col-lg-9">
                    {{-- <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder=""
                        value="{{ old('provinsi') }}" required> --}}
                    <select class="form-select mb-3" aria-label="Default select example" id="provinsi" name="provinsi"
                        data-choices>
                        <option selected disabled>Pilih provinsi</option>
                        {{-- @foreach ($provinsi as $p)
                        <option value="{{ $p->prov_id }}">{{ $p->prov_name }}</option>
                        @endforeach --}}
                    </select>
                    @error('provinsi')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="kota" class="form-label">kota</label>
                </div>
                <div class="col-lg-9">
                    {{-- <input type="text" class="form-control" id="kota" name="kota" placeholder=""
                        value="{{ old('kota') }}" required> --}}
                    <select class="form-select mb-3" aria-label="Default select example" id="kota" name="kota">
                        <option selected disabled>Pilih kota</option>

                    </select>
                    @error('kota')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="kecamatan" class="form-label">kecamatan</label>
                </div>
                <div class="col-lg-9">
                    {{-- <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder=""
                        value="{{ old('kecamatan') }}" required> --}}
                    <select class="form-select mb-3" aria-label="Default select example" id="kecamatan"
                        name="kecamatan">
                        <option selected disabled>Pilih kecamatan</option>

                    </select>
                    @error('kecamatan')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="foto" class="form-label">Foto</label>
                </div>
                <div class="col-lg-9">
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                    @error('gambar')
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
                        <option value="1">Aktif</option>
                        <option value="0">NonAktif</option>
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
                    <label for="username" class="form-label">Username</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="username" name="username" placeholder=""
                        value="{{ old('username') }}" required>
                    @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder=""
                        value="{{ old('password') }}" required>
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="/sales" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    let provinsi = @json($provinsi);
let selectProvinsi = document.querySelector('#provinsi');
let selectKota = document.querySelector('#kota');
let selectKecamatan = document.querySelector('#kecamatan');
provinsi.forEach(e => {
    selectProvinsi.insertAdjacentHTML('beforeend', `<option value="${e.prov_id}">${e.prov_name}</option>`)
});

selectProvinsi.addEventListener('change', function() {
    let indexProvinsi = this.value - 1;
    selectKota.innerHTML = '';
    provinsi[indexProvinsi].city.forEach(e => {
        selectKota.insertAdjacentHTML('beforeend', `<option value="${e.city_id}">${e.city_name}</option>`)
    });
});

selectKota.addEventListener('change', function () {
    let id = this.value;
    provinsi.forEach(e => {
        e.city.forEach(i => {
            if (i.city_id == id) {
                let indexKota = e.city.findIndex((y) => y.city_id == id);
                // console.log(e.city[indexKota]);
                selectKecamatan.innerHTML = '';
                e.city[indexKota].district.forEach(element => {
                    selectKecamatan.insertAdjacentHTML('beforeend', `<option value="${element.dis_id}">${element.dis_name}</option>`)
                });
            }
        });
    });
})
</script>
@endsection