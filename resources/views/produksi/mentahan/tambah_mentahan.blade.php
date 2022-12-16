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
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
              {{ $order_detail->barang->nama }}
            </div>
          </div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                {{ $order_detail->jumlah }}
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
                <select class="form-select" aria-label="Default select example" id="mentahan" name="mentahan">
                    <option selected>Open this select menu</option>
                    @foreach ($mentahan as $m)
                        <option value="{{ $m->kode_barang }}" data-value="{{ $m->nama }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="formGroupExampleInput">
              </div>
              <div class="col-md-2 align-self-end">
                <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
              </div>
        </div>
        <hr>

        <h5>Daftar Mentahan</h5>

        <!-- Striped Rows -->
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Date</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Bobby Davis</td>
                    <td>Nov 14, 2021</td>
                    <td>$2,410</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Christopher Neal</td>
                    <td>Nov 21, 2021</td>
                    <td>$1,450</td>
                    <td><span class="badge bg-warning">Waiting</span></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Monkey Karry</td>
                    <td>Nov 24, 2021</td>
                    <td>$3,500</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Aaron James</td>
                    <td>Nov 25, 2021</td>
                    <td>$6,875</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                </tr>
            </tbody>
        </table>
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
    document.querySelector('#mentahan').addEventListener('change', function () {
        let kodeBarang = this.value;
        let v = document.querySelector(`option[value=${kodeBarang}]`);
        console.log(v.dataset.value);
    })

    document.querySelector('#tambah').addEventListener('click', function(){
        console.log('hai');
        
    })
</script>

@endsection