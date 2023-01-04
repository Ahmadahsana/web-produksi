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
        <div id="customerList">
            <div class="row g-4 mb-3">
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="mt-2">
                            <a href="pdftransaksi" class="btn btn-sm btn-info">Eksport PDF</a>
                        </div>
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
                            <th class="sort" data-sort="phone">No</th>
                            <th class="sort" data-sort="customer_name">Tanggal</th>
                            <th class="sort" data-sort="customer_name">Nama Barang</th>
                            <th class="sort" data-sort="alamat">Kode</th>
                            <th class="sort" data-sort="phone">Transaksi</th>
                            <th class="sort" data-sort="action">Jumlah</th>
                            <th class="sort" data-sort="action">Stok Awal</th>
                            <th class="sort" data-sort="action">Stok Akhir</th>
                            <th class="sort" data-sort="action">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        {{-- @dd($transaksi) --}}
                        @foreach ($transaksi as $tr)
                        <tr>
                            {{-- @foreach ($barang as $br)
                            <td class="phone">{{ $br->nama }}</td>
                            @endforeach --}}
                            {{-- @dd($transaksi) --}}
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ2101</a></td>
                            <td class="customer_name">{{ date("d-M-Y", strtotime($tr->created_at)) }}</td>
                            <td class="alamat">{{ strtoupper($tr->Barang->nama) }}</td>
                            <td class="alamat">{{ $tr->kode_barang }}</td>
                            <td class="status"><span
                                    class="badge  @if ($tr->jenis_transaksi=='Debit') badge-soft-success @else badge-soft-danger @endif text-uppercase">@if($tr->jenis_transaksi=='Debit')
                                    Debit @else Kredit @endif</span></td>
                            <td class="alamat">{{ $tr->jumlah }}</td>
                            <td class="alamat">{{ $tr->stok_awal }}</td>
                            <td class="alamat">{{ $tr->stok_akhir }}</td>
                            <td class="alamat">{{ strtoupper($tr->keterangan) }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class=" noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                        <p class="text-muted mb-0">We've searched more than 150+ Orders We
                            did not find any
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




<!-- Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->

<!-- prismjs plugin -->
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/list.js/list.min.js"></script>
<script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- listjs init -->
<script src="assets/js/pages/listjs.init.js"></script>
@endsection