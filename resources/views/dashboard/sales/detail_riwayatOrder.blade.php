@extends('dashboard.layout.main')

@section('container')
{{-- @dd($order->order_detail) --}}
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title flex-grow-1 mb-0">{{ $tittlePage }}
            </h5>
            <div class="flex-shrink-0">
                <a href="apps-invoices-details.html" class="btn btn-success btn-sm d-none"><i
                        class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                <a href="/riwayatOrder" class="btn btn-danger btn-sm"><i
                        class="ri-arrow-drop-left-fill align-middle me-1"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table-card">
            {{-- <table class="table table-nowrap align-middle table-borderless mb-0">
                <thead class="table-light text-muted">
                    <tr>
                        <th scope="col">Detail Produk</th>
                        <th scope="col" class="text-center">Harga</th>
                        <th scope="col" class="text-center">Pesanan</th>
                        <th scope="col" class="text-center">Satuan</th>
                        <th scope="col" class="text-center">DP</th>
                        <th scope="col" class="text-center">Payment</th>
                        <th scope="col" class="text-center">Tanggal Order</th>
                        <th scope="col" class="text-center">Status Pengerjaan</th>
                        <th scope="col" class="text-end">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $od)
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-lg bg-light rounded p-1">
                                    <img src="{{ asset('storage') . '/' . $od->Barang->foto }}" alt=""
                                        class="img-fluid d-block h-100">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="fs-15"><a href="apps-ecommerce-product-details.html"
                                            class="link-primary">{{ strtoupper($od->Order_detail->Barang->nama) }} | #{{
                                            strtoupper($od->Order_detail->Barang->kode_barang) }}</a></h5>
                                    <p class="text-muted mb-2">Status Barang: <span
                                            class="fw-medium p-1 rounded-pill alert-info">{{
                                            $od->Order_detail->barang->Status_barang->nama }}</span></p>
                                    <p class="text-muted mb-2">Status Jual: <span
                                            class="fw-medium p-1 rounded-pill alert-info">{{
                                            $od->Order_detail->barang->Status_jual->nama }}</span></p>
                                    <p class="text-muted mb-0">Kategori Barang: <span
                                            class="fw-medium p-1 rounded-pill alert-info">{{
                                            $od->Order_detail->barang->Kategori_barang->nama }}</span></p>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">@currency($od->Order_detail->barang->harga)</td>
                        <td class="text-center">
                            {{ $od->jumlah }}

                        </td>
                        <td class="text-center">{{ $od->Order_detail->barang->satuan }}</td>
                        <td class="text-center">@currency( $od->dp )</td>
                        <td class="text-center">{{ strtoupper($od->payment) }}</td>
                        <td class="text-center">{{ date("d-M-Y", strtotime ($od->tanggal)) }}</td>
                        <td class="text-center"><span class="alert-info p-2 rounded-pill">{{
                                $od->Status_pengerjaan->nama }}</span></td>
                        <td class="fw-medium text-end">
                            @currency($od->total_harga)
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
<!--end card-->
<div class="card">
    <div class="card-header">
        <div class="d-sm-flex align-items-center">
            {{-- @dd($order) --}}
            <h5 class="card-title flex-grow-1 mb-0 text-success">Riwayat order dari "{{
                strtoupper($order->sales_username) }}"
            </h5>
            <div class="flex-shrink-0 mt-2 mt-sm-0">
                <a href="javasccript:void(0;)" class="btn d-none btn-soft-info btn-sm mt-2 mt-sm-0"><i
                        class="ri-map-pin-line align-middle me-1"></i> Change Address</a>
                <a href="javasccript:void(0;)" class="btn d-none btn-soft-danger btn-sm mt-2 mt-sm-0"><i
                        class="mdi mdi-archive-remove-outline align-middle me-1"></i> Cancel Order</a>
            </div>
        </div>
    </div>
    <div class="card-body">
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
                                    <h6 class="fs-15 mb-0 fw-semibold">{{ $order->order_detail->status_pengerjaan->nama
                                        }} - <span class="fw-normal">{{
                                            date("d-M-Y", strtotime ($order->tanggal))
                                            }}</span></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body ms-2 ps-5 pt-0">
                            <h6 class="mb-1">{{ $order->Barang->Status_barang->nama }}</h6>
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
                                    <h6 class="fs-15 mb-1 fw-semibold">Packed - <span class="fw-normal">Thu, 16 Dec
                                            2021</span></h6>
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
                                    <h6 class="fs-15 mb-1 fw-semibold">Shipping - <span class="fw-normal">Thu, 16 Dec
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
<!--end card-->
<!-- prismjs plugin -->
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/list.js/list.min.js"></script>
<script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

<!-- listjs init -->
<script src="assets/js/pages/listjs.init.js"></script>

@endsection