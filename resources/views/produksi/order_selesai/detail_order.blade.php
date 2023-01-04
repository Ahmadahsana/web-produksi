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

  {{-- @dd($order_detail) --}}
  <div class="card-body">
    <div class="mb-1 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Sales</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ strtoupper($order_detail->Order->sales->nama)}}</h6>
      </div>
    </div>
    <div class="mb-1 row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ strtoupper($order_detail->Barang->nama)}}</h6>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ $order_detail->jumlah}}</h6>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Order</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ $order_detail->created_at}}</h6>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Selesai</label>
      <div class="col-sm-10">
        <h6 class="form-control-plaintext">: {{ $order_detail->updated_at}}</h6>
      </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Proses</th>
                    <th scope="col">Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mentahan</td>
                    <td>Rp. {{ $order_detail->keuntungan->mentahan}}</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Finishing</td>
                    <td>Rp. {{ $order_detail->keuntungan->finishing}}</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Jok / aksesoris</td>
                    <td>Rp. {{ $order_detail->keuntungan->jok}}</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Packing</td>
                    <td>Rp. {{ $order_detail->keuntungan->packing}}</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Pengiriman</td>
                    <td>Rp. {{ $order_detail->keuntungan->pengiriman}}</td>
                  </tr>
                  <tr style="">
                    <th scope="row"></th>
                    <td align="right"><strong>Total</strong></td>
                    <td>Rp. <strong>{{ $order_detail->keuntungan->total}}</strong> </td>
                  </tr>
                  <tr style="">
                    <th scope="row"></th>
                    <td align="right"><strong>Harga jual</strong> </td>
                    <td>Rp. <strong>{{ $order_detail->keuntungan->harga_jual}}</strong></td>
                  </tr>
                  <tr style="">
                    <th scope="row"></th>
                    <td align="right"><strong>Keuntungan</strong> </td>
                    <td>Rp. <strong>{{ $order_detail->keuntungan->keuntungan}}</strong> </td>
                  </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 col-lg-6">
            ini untuk wadah time line riwayat
        </div>
    </div>
    
  </div>
</div>
@endsection