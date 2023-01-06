@extends('dashboard.layout.main')

@section('container')
<div class="card rounded-3 shadow-lg">
    <div class="card-header d-flex text-center justify-content-around">
        <div class="col-lg-12 col-xl-12 ">
            <table class="table table-responsive">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nama Sales</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">DP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>
                            <span class="alert-sm px-2 rounded-3 alert-info">
                                {{ strtoupper($order->sales_username)}}
                            </span>
                        </td>
                        <td>
                            <span class="alert-sm px-2 rounded-3 alert-info">
                                {{ strtoupper($order->payment)}}
                            </span>
                        </td>
                        <td>
                            <span class="alert-sm px-2 rounded-3 alert-success">
                                @currency($order->total_bayar)
                            </span>
                        </td>
                        <td>
                            <span class="alert-sm px-2 rounded-3 alert-success">
                                @currency($order->dp)
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




@foreach ($order->order_detail as $or )
<div class="card">
    <div class="card-body p-4">
        <div class="mb-5">
            <div class="flex-shrink-0 avatar-md mx-auto mt-4">
                <div class="avatar-title bg-transparent">
                    <img src="{{ asset('storage'.'/'.$or->barang->foto) }}" alt="" height="100" />
                </div>
            </div>
            <div class="mt-4 text-center">
                <h5 class="mb-1">{{ strtoupper($or->barang->nama) }}</h5>
                <h5 class="text-muted">#{{ $or->barang->kode_barang }}</h5>
            </div>
            <div class=" mt-5 row  ">
                <table class="table table-bordered table-responsive table-active">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $or->jumlah }} {{ $or->barang->satuan }}</td>
                            <td>@currency($or->barang->hpp)</td>
                            <td>@currency($or->jumlah * $or->barang->hpp)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-header">
            <div class="d-flex  text-center">
                <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
            </div>
        </div>
        {{-- @foreach ($or->Riwayat_pengerjaan as $rp)
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingOne">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="ri-shopping-bag-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-0 fw-semibold">
                                        {{ $rp->Status_pengerjaan->nama }} --}}
                                        {{-- @foreach ($or->Riwayat_pengerjaan as $rp)
                                        {{ $rp->Status_pengerjaan->nama }} <br> {{ $rp->keterangan }} <br>
                                        @endforeach --}}
                                        {{-- </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ms-2 ps-5 pt-0">
                            <h6 class="mb-1">{{ $rp->keterangan }}</h6>
                            <p class="text-muted">Wed, 15 Dec 2021 - 05:34PM</p>

                            <h6 class="mb-1">Seller has proccessed your order.</h6>
                            <p class="text-muted mb-0">Thu, 16 Dec 2021 - 5:48AM</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingThree">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">Shipping - <span class="fw-normal">Thu,
                                            16 Dec
                                            2021</span></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ms-2 ps-5 pt-0">
                            <h6 class="fs-14">RQK Logistics - MFDS1400457854</h6>
                            <h6 class="mb-1">Your item has been shipped.</h6>
                            <p class="text-muted mb-0">Sat, 18 Dec 2021 - 4.54PM</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingFour">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-light text-success rounded-circle">
                                        <i class="ri-takeaway-fill"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingFive">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFile"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-light text-success rounded-circle">
                                        <i class="mdi mdi-package-variant"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-14 mb-0 fw-semibold">Delivered</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}
                {{--
            </div> --}}
            <!--end accordion-->
            {{--
        </div>
        @endforeach --}}

        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingOne">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne"
                            aria-expanded="false" aria-controls="collapseOne">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-alpha-m-circle-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        MENTAHAN
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 3)
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
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
        </div>
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingTwo">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-airplane-landing"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        FINISHING
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 4)
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
            </div>
        </div>
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingThree">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-account-filter-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        JOK
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 5)
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
            </div>
        </div>
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingFour">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-box-cutter"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        PACKING
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 6)
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
            </div>
        </div>
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingFive">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-package-variant"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        PENGIRIMAN
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 7)
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
            </div>
        </div>
        <div class="profile-timeline">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingSix">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseSix"
                            aria-expanded="false" aria-controls="collapseSix">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-check-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">
                                        SELESAI
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($or->riwayat_pengerjaan as $rp)
                    @if ($rp->status_pengerjaan_id == 8)
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
        </div>
    </div>
</div>
@endforeach
@endsection