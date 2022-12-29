@extends('dashboard.layout.main')

@section('container')
{{-- @dd($jok->Vendor_produksi) --}}
<div class="card">
  <div class="card-header">
    <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
  </div><!-- end card header -->
  <div class="card-body">
    @if (isset($jok->tgl_diproses))
    <div class="mb-3 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">vendor Jok :</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">{{ $jok->Vendor_produksi->nama_vendor }}</h6>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Diproses :</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">{{ $jok->tgl_diproses }}</h6>
      </div>
    </div>
    @else
    <form action="/edit_jok" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" value="{{ $jok->order_detail_id }}" name="order_detail_id" class="d-none">
      <input type="text" class="d-none" value="{{ $jok->id }}" name="jok_id">
      <div class="row">
        <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Pilih vendor</label>
          <select class="form-select" aria-label="Default select example" name="vendor">
            <option selected disabled>pilih vendor</option>
            @foreach ($vendor as $v)
            <option value="{{ $v->id }}">{{ $v->nama_vendor }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-4 align-self-end">
          <button type="submit" class="btn btn-primary">Proses jok</button>
          <a href="/jok" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </form>
    @endif

    {{-- jika sudah di tentukan vendornya --}}
    @if (isset($jok->tgl_diproses))
      @if ($jok->Vendor_produksi->id !== 1) {{-- jika pakai vendor lain --}}
        <form action="/edit_jok" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" class="d-none" value="{{ $jok->id }}" name="jok_id">
          <label for="basic-url" class="form-label">Biaya Jok / Aksesoris</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">Rp. </span>
            <div class="col-6">
              <input type="number" class="form-control" name="biaya" id="biaya" aria-describedby="basic-addon3">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Selesai Jok</button>
        </form>
      @else {{-- jika pakai vendor sendiri --}}
        <div class="row">
          <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Jok / Aksesoris</label>
              <select class="form-select" aria-label="Default select example" id="jok">
                  <option selected disabled></option>
                  @foreach ($joks as $j)
                      <option value="{{ $j->kode_barang }}" data-value="{{ $j->nama }}" data-harga="{{ $j->harga }}"  data-hpp="{{ $j->hpp }}">{{ $j->nama }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputPassword4" class="form-label">Jumlah</label>
              <input type="text" class="form-control" id="jumlah">
            </div>
            <div class="col-md-2 align-self-end">
              <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        <hr>

        <h5>Daftar Jok / Aksesoris</h5>

        <!-- Striped Rows -->
        <form action="/edit_jok" method="POST">
            @csrf
            <input type="text" class="d-none" value="{{ $jok->id }}" name="jok_id">
            {{-- <input type="text" value="" name="order_detail_id" class="d-none"> --}}
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jok</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="wadah_jok">
                    
                </tbody>
            </table>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3" id="wadah_tombol">
                    
                </div>
            </div>
        </form>
      @endif
    @endif
  </div>
</div>

<script>
  let tombolKonfir = false
  document.querySelector('#tambah').addEventListener('click', function(){
    let kodeBarang = document.querySelector('#jok').value;
    let jumlah = document.querySelector('#jumlah').value;
    let namaBarang = document.querySelector(`option[value=${kodeBarang}]`).dataset.value;
    let hppBarang = document.querySelector(`option[value=${kodeBarang}]`).dataset.hpp;
    
    let wadahJok = document.querySelector('#wadah_jok');
    let wadahTombol = document.querySelector('#wadah_tombol');

    wadahJok.insertAdjacentHTML('beforeend', `<tr>
                                                  <th scope="row">1</th>
                                                  <td>${namaBarang} <input type="text" class="form-control d-none" name="kode_barang[]" value="${kodeBarang}"></td>
                                                  <td>${jumlah}
                                                      <input type="text" class="form-control d-none" name="jumlah_barang[]" value="${jumlah}">
                                                      <input type="text" class="form-control d-none" name="hpp_barang[]" value="${hppBarang}">
                                                  </td>
                                                  <td><a href="javascript:void(0)"><span class="badge bg-danger">Hapus</span></a></td>
                                              </tr>`)
    if (tombolKonfir == false) {
      wadahTombol.insertAdjacentHTML('beforeend', `<button type="submit" class="btn btn-primary">Konfirmasi</button>`)
    }
    tombolKonfir = true
  })
</script>
@endsection