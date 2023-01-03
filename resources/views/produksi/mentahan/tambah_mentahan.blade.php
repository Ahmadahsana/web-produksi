@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Orderan</h4>
    </div><!-- end card header -->

    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        <div class="mb-1 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Sales</label>
            <div class="col-sm-10">
                <h6 class="form-control-plaintext">: {{ strtoupper($order_detail->Order->sales_username) }}</h6>
            </div>
        </div>
        <div class="mb-1 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <h6 class="form-control-plaintext">: {{ strtoupper($order_detail->barang->nama) }}</h6>
            </div>
        </div>
        <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <h6 class="form-control-plaintext">: {{ $order_detail->jumlah }}</h6>
            </div>
        </div>
    </div><!-- end card -->
</div>
{{-- @dd($mentahan) --}}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Mentahan</label>
                <select class="form-select" aria-label="Default select example" id="mentahan">
                    <option selected disabled></option>
                    @foreach ($mentahan as $m)
                    <option value="{{ $m->kode_barang }}" data-value="{{ $m->nama }}" data-harga="{{ $m->harga }}"
                        data-hpp="{{ $m->hpp }}">{{ $m->nama }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah">
            </div>
            <div class="col-md-2 align-self-end">
                <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        <hr>

        <h5>Daftar Mentahan</h5>

        <!-- Striped Rows -->
        <form action="/mentahan" method="POST">
            @csrf
            <input type="text" value="{{ $order_detail->id }}" name="order_detail_id" class="d-none">
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mentahan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="wadah_mentahan">

                </tbody>
            </table>
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3" id="wadah_tombol">

                </div>
            </div>
        </form>
    </div>

</div><!-- end card -->


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

<script>
    let tombolKonfir = false
    document.querySelector('#tambah').addEventListener('click', function(){
        let kodeBarang = document.querySelector('#mentahan').value;
        let jumlah = document.querySelector('#jumlah').value;
        let namaBarang = document.querySelector(`option[value=${kodeBarang}]`).dataset.value;
        let hppBarang = document.querySelector(`option[value=${kodeBarang}]`).dataset.hpp;
        let hargaBarang = document.querySelector(`option[value=${kodeBarang}]`).dataset.harga;
        
        let wadahMentahan = document.querySelector('#wadah_mentahan');
        let wadahTombol = document.querySelector('#wadah_tombol');
        wadahMentahan.insertAdjacentHTML('beforeend', `<tr>
                                                                <th scope="row">1</th>
                                                                <td>${namaBarang} <input type="text" class="form-control d-none" name="kode_barang[]" value="${kodeBarang}"></td>
                                                                <td>${jumlah}
                                                                    <input type="text" class="form-control d-none" name="jumlah_barang[]" value="${jumlah}">
                                                                    <input type="text" class="form-control d-none" name="hpp_barang[]" value="${hppBarang}">
                                                                </td>
                                                                <td><a href="javascript:void(0)"><span class="badge bg-danger">Hapus</span></a></td>
                                                            </tr>`)
        if (tombolKonfir == false) {
            wadahTombol.insertAdjacentHTML('beforeend', `<button type="submit" class="btn btn-primary">Konfirmasi</button>`)
        }

        tombolKonfir = true
    })
</script>

@endsection