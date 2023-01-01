@extends('dashboard.layout.main')

@section('container')
<div class="card">
  <div class="card-header">
    <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
  </div><!-- end card header -->
  <div class="card-body">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
  </div><!-- end card -->

  {{-- @dd($finishing) --}}
  <div class="card-body">
    <div class="mb-1 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Sales</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ strtoupper($finishing->Order_detail->Order->sales_username)}}</h6>
      </div>
    </div>
    <div class="mb-1 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ strtoupper($finishing->Order_detail->Barang->nama)}}</h6>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ $finishing->Order_detail->jumlah}}</h6>
      </div>
    </div>
    @if (isset($finishing->tgl_diproses))
    <form action="/edit_finishing" method="POST">
      @csrf
      <input type="text" value="{{ $finishing->order_detail_id }}" name="order_detail_id" class="d-none">
      <input type="text" class="d-none" value="{{ $finishing->id }}" name="finishing_id">
      <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">vendor Finishing :</label>
        <div class="col-sm-10">
          <h6 class="form-control-plaintext">{{ $finishing->Vendor_produksi->nama_vendor }}</h6>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Diproses :</label>
        <div class="col-sm-10">
          <h6 class="form-control-plaintext">{{ $finishing->tgl_diproses }}</h6>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Jumlah finishing</label>
          <input type="number" class="form-control" id="" name="jumlah_finishing" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Harga finishing</label>
          <div class="input-group">
            <div class="input-group-text">Rp. </div>
            <input type="number" class="form-control" id="" placeholder="" name="harga_finishing" required>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Jumlah servis</label>
          <input type="number" class="form-control" id="" name="jumlah_servis" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Harga servis</label>
          <div class="input-group">
            <div class="input-group-text">Rp. </div>
            <input type="number" class="form-control" id="" placeholder="" name="harga_servis" required>
          </div>
        </div>
      </div>

      <div class="row  justify-content-end">
        <div class="col-4 align-self-end">
          <button type="submit" class="btn btn-primary">Selesai finishing</button>
          <a href="/finishing" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </form>
    @else
    <form action="/edit_finishing" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" value="{{ $finishing->order_detail_id }}" name="order_detail_id" class="d-none">
      <input type="text" class="d-none" value="{{ $finishing->id }}" name="finishing_id">
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
          <button type="submit" class="btn btn-primary">Proses finishing</button>
          <a href="/finishing" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </form>
    @endif

  </div>
</div>
@endsection