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
                <div class="col-sm-auto">
                    <div>
                        <a href="/sales/create" class="btn btn-success add-btn"><i
                                class="ri-add-line align-bottom me-1"></i> Add</a>
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
                            <th scope="col" style="width: 50px;">
                                No
                            </th>
                            <th class="sort" data-sort="customer_name">Nama</th>
                            <th class="sort" data-sort="phone">Nomor</th>
                            <th class="sort" data-sort="addres">Alamat</th>
                            <th class="sort" data-sort="status">Status</th>
                            <th class="sort" data-sort="action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($sales as $s)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ2101</a></td>
                            <td class="customer_name">{{ $s->nama }}</td>
                            <td class="phone">{{ $s->nomor }}</td>
                            <td class="addres">{{ $s->alamat }}</td>
                            <td class="status"><span
                                    class="badge  @if ($s->status_user_id==1) badge-soft-success @else badge-soft-danger @endif text-uppercase">@if($s->status_user_id==1)
                                    Active @else NonActive @endif</span></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="detail">
                                        <a href="/sales_show/{{ $s->id }}"
                                            class="btn btn-sm btn-success edit-item-btn">Detail</a>
                                    </div>

                                    <div class="remove">
                                        <form action="/sales/{{ $s->id }}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah yakin ingin menghapus data ( {{ $s->nama }} ) ?')">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
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