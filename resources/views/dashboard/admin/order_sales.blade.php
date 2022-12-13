@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
    </div><!-- end card header -->
    {{-- {{ @ddd($order) }} --}}
    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div id="customerList">
            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    {{-- <div>
                        <a href="/sales/create" class="btn btn-success add-btn"><i
                                class="ri-add-line align-bottom me-1"></i> Add</a>
                    </div> --}}
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50px;">No</th>
                            <th class="sort" data-sort="customer_name">Tanggal</th>
                            <th class="sort" data-sort="phone">Nama sales</th>
                            <th class="sort" data-sort="alamat">Nama barang</th>
                            <th class="sort" data-sort="action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @php
                        $no = 1;
                        @endphp
                        {{-- @dd($orders) --}}
                        @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ2101</a></td>
                            <td class="tanggal">{{ $order->tanggal }}</td>
                            <td class="sales">{{ $order->sales->nama }}</td>
                            <td class="nama">
                                @foreach ($order->order_detail as $order_detail)
                                {{ $order_detail->barang->nama }} <br>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        {{-- <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                                            data-bs-target="#showModal">Edit</button> --}}
                                        <a href="/order_sales/{{ $order->id }}"
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
                <div class="noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                            orders for you search.</p>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="#">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="#">
                        Next
                    </a>
                </div>
            </div>
        </div>
    </div><!-- end card -->
</div>




<!-- prismjs plugin -->
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/list.js/list.min.js"></script>
<script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- listjs init -->
<script src="assets/js/pages/listjs.init.js"></script>

@endsection