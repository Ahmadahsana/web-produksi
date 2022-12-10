@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">List Barang</h4>
    </div><!-- end card header -->

    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div> 
        @endif
        <div id="customerList">
            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <a href="/barang/create" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Tambah barang</a>
                        <a href="/barang/create" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Tambah Stok</a>
                    </div>
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
                            <th scope="col" style="width: 50px;"> No </th>
                            <th class="sort" data-sort="customer_name">Nama</th>
                            <th class="sort" data-sort="phone">Kode barang</th>
                            <th class="sort" data-sort="phone">Status</th>
                            <th class="sort" data-sort="action">Action</th>
                            </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($barang as $s)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                <td class="customer_name">{{ $s->nama }}</td>
                                <td class="phone">{{ $s->kode_barang }}</td>
                                <td class="status"><span class="badge  @if ($s->status_barang==1) badge-soft-success @else badge-soft-primary @endif text-uppercase">@if ($s->status_barang==1) Order @else Ready stok @endif</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <button class="btn btn-sm btn-success edit-item-btn"
                                            data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                        </div>
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


    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status-field" class="form-label">Nama barang</label>
                            <select class="form-control" data-trigger name="nama" id="status-field" >
                                <option selected disabled>Pilih barang</option>
                                <option value="1">barang 1</option>
                                <option value="0">barang 2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Tambah stok</label>
                            <input type="text" id="stok" name="stok" class="form-control" placeholder="masukkan jumlah" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Sales</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
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
                                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
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