@extends('dashboard.layout.main')

@section('container')
<div class="card rounded-3 shadow-lg">
    <div class="card-header d-flex text-center justify-content-around">
        <div class="col-lg-3 col-xl-3 ">
            <h6 class="card-title flex-grow-1 mb-1">
                Nama Sales : {{
                strtoupper($order->sales_username)
                }}
            </h6>
        </div>
        <div class="col-lg-3 col-xl-3 ">
            <h6 class="card-title flex-grow-1 mb-1">
                Payment : {{ strtoupper($order->payment) }}
            </h6>
        </div>
        <div class="col-lg-3 col-xl-3">
            <h6 class="card-title flex-grow-1 mb-1">
                Total : <span class="alert-sm rounded-3 px-1 alert-success">@currency($order->total_bayar)</span>
            </h6>
        </div>
        <div class="col-lg-3 col-xl-3">
            <h6 class="card-title flex-grow-1 mb-1">
                DP : <span class="alert-sm rounded-3 px-1 alert-success">@currency($order->dp)</span>
            </h6>
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

            <div class="mb-2 row ">
                <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Pesanan</label>
                <div class="col-sm-10">
                    {{ $or->jumlah }} {{ $or->barang->satuan }}
                </div>
            </div>
            <div class="mb-2 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <p> @currency($or->barang->hpp)</p>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Total Bayar</label>
                <div class="col-sm-10">
                    @currency($or->jumlah * $or->barang->hpp)
                </div>
            </div>

        </div>
        <div class="card-header">
            <div class="d-flex align-items-center text-center">
                <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
            </div>
        </div>
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
                                    <h6 class="fs-15 mb-0 fw-semibold">Order Placed - <span class="fw-normal">Wed, 15
                                            Dec
                                            2021</span></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ms-2 ps-5 pt-0">
                            <h6 class="mb-1">An order has been placed.</h6>
                            <p class="text-muted">Wed, 15 Dec 2021 - 05:34PM</p>

                            <h6 class="mb-1">Seller has proccessed your order.</h6>
                            <p class="text-muted mb-0">Thu, 16 Dec 2021 - 5:48AM</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
                    <div class="accordion-header" id="headingTwo">
                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success rounded-circle">
                                        <i class="mdi mdi-gift-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fs-15 mb-1 fw-semibold">Packed - <span class="fw-normal">Thu,
                                            16
                                            Dec 2021</span>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ms-2 ps-5 pt-0">
                            <h6 class="mb-1">Your Item has been picked up by courier patner</h6>
                            <p class="text-muted mb-0">Fri, 17 Dec 2021 - 9:45AM</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0">
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
                </div>
            </div>
            <!--end accordion-->
        </div>

    </div>
</div>
@endforeach
@endsection