@extends('dashboard.layout.main')

@section('container')

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Edit order</h4>
    </div><!-- end card header -->
    {{-- {{ dd($order) }} --}}
    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form action="/order/{{ $order->id }}" method="POST">
            @method('put')
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal"
                        value="{{ $order->Order->tanggal }}" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="sales" class="form-label">Nama Sales</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="sales" name="sales" placeholder="Masukkan sales"
                        value="{{ $order->Order->sales->nama }}" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                        value="{{ $order->barang->nama }}" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah"
                        value="{{ $order->jumlah }}" required readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="status" class="form-label">Status</label>
                </div>
                <div class="col-lg-9">
                    @if ($order->status_pengerjaan_id == 1)
                    <span class="badge badge-soft-danger text-uppercase">{{ $order->status_pengerjaan->nama }}</span>
                    @else
                    <span class="badge badge-soft-danger text-uppercase">{{ $order->status_pengerjaan->nama }}</span>
                    {{-- <select class="form-select mb-3" aria-label="Default select example" name="status">
                        @foreach ($status as $s)
                        <option value="{{ $s->id }}" @if ($s->id == $order->status_pengerjaan_id)
                            selected
                            @endif>{{ $s->nama }}</option>
                        @endforeach
                    </select> --}}
                    @endif
                </div>
            </div>


            {{-- <div class="text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div> --}}
        </form>
        @if ($order->status_pengerjaan_id == 1)
        <div class="text-end">
            <form action="/order/{{ $order->id }}" method="POST" class="d-inline">
                @method('put')
                @csrf
                <input class="d-none" type="text" value="2" name="status">
                <button type="submit" class="btn btn-success">Terima</button>
            </form>
            <form action="/order/{{ $order->id }}" method="post" class="d-inline">
                @method('put')
                @csrf
                <input class="d-none" type="text" value="9" name="status">
                <button type="submit" class="btn btn-info">Tolak</button>
            </form>
            <a href="/list_permintaan" class="btn btn-danger">Kembali</a>
        </div>
        @endif

        @if ($order->status_pengerjaan_id == 2)
        <div class="text-end">
            <form action="/order/{{ $order->id }}" method="POST" class="d-inline">
                @method('put')
                @csrf
                <input class="d-none" type="text" value="3" name="status">
                <button type="submit" class="btn btn-success">Mulai Produksi</button>
                <a href="/list_order" class="btn btn-danger">Kembali</a>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection