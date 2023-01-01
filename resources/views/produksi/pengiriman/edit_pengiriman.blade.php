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
        <h6 class="form-control-plaintext">{{ strtoupper($pengiriman->Order_detail->Order->sales_username)}}</h6>
      </div>
    </div>
    <div class="mb-1 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">{{ strtoupper($pengiriman->Order_detail->Barang->nama)}}</h6>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">{{ $pengiriman->Order_detail->jumlah}}</h6>
      </div>
    </div>
    @if (isset($pengiriman->tgl_diproses))
    <form action="/edit_pengiriman" method="POST">
      @csrf
      <input type="text" value="{{ $pengiriman->order_detail_id }}" name="order_detail_id" class="d-none">
      <input type="text" class="d-none" value="{{ $pengiriman->id }}" name="pengiriman_id">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Diproses :</label>
        <div class="col-sm-10">
          <h6 class="form-control-plaintext">{{ $pengiriman->tgl_diproses }}</h6>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6 mt-3">
          <label for="inputPassword4" class="form-label">Biaya Pengiriman</label>
          <div class="input-group">
            <div class="input-group-text">Rp. </div>
            <input type="number" class="form-control" id="" placeholder="" name="biaya_pengiriman" required>
          </div>
        </div>
        <div class="col-md-6 mt-3">
          <label for="inputPassword4" class="form-label">Biaya Perakitan</label>
          <div class="input-group">
            <div class="input-group-text">Rp. </div>
            <input type="number" class="form-control" id="" placeholder="" name="biaya_perakitan" required>
          </div>
        </div>
        <div class="col-md-6 mt-3">
          <label for="inputPassword4" class="form-label">Biaya Service</label>
          <div class="input-group">
            <div class="input-group-text">Rp. </div>
            <input type="number" class="form-control" id="" placeholder="" name="biaya_service" required>
          </div>
        </div>
      </div>


      <div class="row  justify-content-end">
        <div class="col-4 align-self-end">
          <button type="submit" class="btn btn-primary">Selesai Pengiriman</button>
          <a href="/pengiriman" class="btn btn-danger">Kembali</a>
        </div>
      </div>
    </form>
    @endif

  </div>
</div>
@endsection