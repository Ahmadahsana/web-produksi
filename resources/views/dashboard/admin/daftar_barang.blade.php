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
        @if (session()->has('Gagal'))
        <div class="alert alert-danger" role="alert">
            {{ session('Gagal') }}
        </div>
        @endif
        <div id="customerList">
            <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                        <a href="/barang/create" class="btn btn-success add-btn"><i
                                class="ri-add-line align-bottom me-1"></i> Tambah barang</a>
                        <a href="/barang/create" class="btn btn-primary add-btn" data-bs-toggle="modal"
                            data-bs-target="#tambahStok"><i class="ri-add-line align-bottom me-1"></i> Tambah Stok</a>
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
            {{-- @dd($stok) --}}
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 50px;"> No </th>
                            <th class="sort" data-sort="nama">Nama</th>
                            <th class="sort" data-sort="kode">Kode barang</th>
                            <th class="sort" data-sort="statusbarang">Status Barang</th>
                            <th class="sort" data-sort="statusjual">Status Jual</th>
                            <th class="sort" data-sort="kategoribarang">Kategori Barang</th>
                            <th class="sort" data-sort="satuan">Satuan</th>
                            <th class="sort" data-sort="stok">Stok</th>
                            <th class="sort" data-sort="action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($barang as $s)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ2101</a></td>
                            <td class="nama">{{ $s->nama }}</td>
                            <td class="kode">{{ $s->kode_barang }}</td>
                            <td class="statusbarang">{{ $s->Status_barang->nama }}</td>
                            <td class="statusjual">{{ $s->Status_jual->nama }}</td>
                            <td class="kategoribarang">{{ $s->Kategori_barang->nama }}</td>
                            <td class="satuan">{{ $s->satuan }}</td>
                            <td class="stok">@if (!empty($s->Transaksi_barang->stok_akhir))
                                {{ $s->Transaksi_barang->stok_akhir }}
                                @else
                                0
                                @endif</td>
                            {{-- <td class="status"><span
                                    class="badge  @if ($s->status_barang==1) badge-soft-success @else badge-soft-primary @endif text-uppercase">@if
                                    ($s->status_barang==1) Order @else Ready stok @endif</span></td> --}}
                            <td>
                                <div class="d-flex gap-2">
                                    <div class="edit">
                                        <a href="/barang/{{ $s->id }}/edit"
                                            class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                    </div>
                                    <div class="remove">
                                        <form action="/barang/{{ $s->id }}" method="POST" enctype="multipart/form-data">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                onclick="return confirm('Yakin ingin menghapus data {{ strtoupper( $s->nama )}} ?')">Remove</button>
                                        </form>
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


<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form>
                <div class="modal-body">

                    <div class="mb-3" id="modal-id" style="display: none;">
                        <label for="id-field" class="form-label">ID</label>
                        <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="masukkan nama" required />
                    </div>

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="number" id="nomor" class="form-control" placeholder="masukkan nomor hp" required />
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="phone-field" class="form-control" placeholder="masukkan alamat"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" id="provinsi" class="form-control" placeholder="Select Date" required />
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" id="kota" class="form-control" placeholder="Select Date" required />
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" id="kecamatan" class="form-control" placeholder="Select Date" required />
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" id="foto" class="form-control" placeholder="Select Date" required />
                    </div>

                    <div>
                        <label for="status-field" class="form-label">Status</label>
                        <select class="form-control" data-trigger name="status" id="status-field">
                            <option selected disabled>Status</option>
                            <option value="1">Active</option>
                            <option value="0">Block</option>
                        </select>
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


{{-- modal tambah stok --}}

<div class="modal fade" id="tambahStok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form action="/transaksibarang" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama barang</label>
                        <select class="form-control" data-trigger name="kode_barang" id="nama">
                            <option selected disabled>Nama barang</option>
                            @foreach ($barang as $b)
                            <option value="{{ $b->kode_barang }}">{{ $b->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control" placeholder="masukkan jumlah"
                            name="jumlah" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn"
                            onclick="return confirm('Yakin ingin menambah data stok baru ?')">Add Stok</button>
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