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
        <div class="card-header">
          <div class="d-flex  text-center">
            <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
          </div>
        </div>
        {{-- template --}}
        <div class="card-body">
          <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingOne">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-light text-success rounded-circle">
                          <i class="mdi mdi-check-outline"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-15 mb-0 fw-semibold">SELESAI</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 7)
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">
                      @if ($rp->keterangan == 'selesai')
                      {{ strtoupper($rp->keterangan) }}
                      @endif
                    </h6>
                    <p class="text-muted mb-0">
                      @if ($rp->keterangan == 'selesai')
                      {{ $rp->created_at }}
                    </p>
                    @endif
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingTwo">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-light text-success rounded-circle">
                          <i class="ri-truck-line"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-15 mb-1 fw-semibold">PENGIRIMAN</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 7)
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">{{ strtoupper($rp->keterangan) }}</h6>
                    <p class="text-muted mb-0">{{ $rp->created_at }}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingThree">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree"
                    aria-expanded="false" aria-controls="collapseThree">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-success rounded-circle">
                          <i class="mdi mdi-box-cutter"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-15 mb-1 fw-semibold">PACKING</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 6)
                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">{{ strtoupper($rp->keterangan) }}</h6>
                    <p class="text-muted mb-0">{{ $rp->created_at }}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingFour">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-success rounded-circle">
                          <i class="mdi mdi mdi-gift-outline"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-14 mb-0 fw-semibold">JOK</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 5)
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">{{ strtoupper($rp->keterangan) }}</h6>
                    <p class="text-muted mb-0">{{ $rp->created_at }}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingFive">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-success rounded-circle">
                          <i class="ri-shopping-bag-3-line"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-14 mb-0 fw-semibold">FINISHING</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 4)
                <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">{{ strtoupper($rp->keterangan) }}</h6>
                    <p class="text-muted mb-0">{{ $rp->created_at }}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="accordion-item border-0">
                <div class="accordion-header" id="headingSix">
                  <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseSix"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0 avatar-xs">
                        <div class="avatar-title bg-success rounded-circle">
                          <i class="ri-shopping-bag-line"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h6 class="fs-14 mb-0 fw-semibold">MENTAHAN</h6>
                      </div>
                    </div>
                  </a>
                </div>
                @foreach ($order_detail->riwayat_pengerjaan as $rp)
                @if ($rp->status_pengerjaan_id == 3)
                <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body ms-2 ps-5 pt-0">
                    <h6 class="mb-1">{{ strtoupper($rp->keterangan) }}</h6>
                    <p class="text-muted mb-0">{{ $rp->created_at }}</p>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
            </div>
            <!--end accordion-->
          </div>
        </div>
        {{-- akhir template --}}
      </div>
    </div>
  </div>
</div>
@endsection