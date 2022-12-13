@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->
    {{-- @dd($orders) --}}
    <div class="card-body">
        <form action="/sales" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Nama sales</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                        value="{{ $orders->sales->nama }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="Nomor" class="form-label">Nomor HP</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="Nomor" name="Nomor" placeholder="Masukkan Nomor"
                        value="{{ $orders->sales->nomor }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="nomor" class="form-label">Tanggal order</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan nomor"
                        value="{{ date(" d-M-Y", strtotime($orders->tanggal)) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="alamat" class="form-label">Alamat</label>
                </div>
                <div class="col-lg-9">
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"
                        required>{{ $orders->sales->alamat }}, {{ $orders->sales->district->dis_name }}, {{ $orders->sales->city->city_name }}, {{ $orders->sales->province->prov_name }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="dp" class="form-label">DP</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="dp" name="dp" placeholder="" value="{{ $orders->dp }}"
                        required>
                </div>
            </div>
            <table class="table align-middle table-nowrap" id="customerTable">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 50px;">No</th>
                        <th class="sort" data-sort="customer_name">Barang</th>
                        <th class="sort" data-sort="phone">Jumlah</th>
                        <th class="sort" data-sort="alamat">Status pengerjaan</th>
                        <th class="sort" data-sort="action">Action</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($orders->order_detail as $order_detail)

                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td class="id" style="display:none;"><a href="javascript:void(0);"
                                class="fw-medium link-primary">#VZ2101</a></td>
                        <td class="nama_barang">{{ $order_detail->barang->nama }}</td>
                        <td class="jumlah">{{ $order_detail->jumlah }}</td>
                        <td class="status"><span
                                class="badge badge-soft-{{ $order_detail->status_pengerjaan->warna }} text-uppercase">{{
                                $order_detail->status_pengerjaan->nama }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <div class="edit">
                                    {{-- <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                        data-bs-target="#showModal">Edit</button> --}}
                                    <a href="/order/{{ $order_detail->id }}/edit"
                                        class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                </div>
                                {{-- <div class="remove">
                                    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteRecordModal">Remove</button>
                                </div> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

            {{-- <div class="text-end">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div> --}}
        </form>
    </div>
</div>
@endsection