@extends('dashboard.layout.main')

@section('container')


<div class="card">
    <div class="card-body p-4">
        <div class="">
            <div class="flex-shrink-0 avatar-md mx-auto mt-4">
                <div class="avatar-title bg-transparent">
                    <img src="{{ asset('storage'.'/'.$orderdet->Barang->foto) }}" alt="" height="100" />
                </div>
            </div>
            <div class="mt-4 text-center">
                <h5 class="mb-1">{{ strtoupper($orderdet->Barang->nama) }}</h5>
                <h5 class="text-muted">#{{ $orderdet->Barang->kode_barang }}</h5>
            </div>
            <div class=" mt-5 row  ">
                <table class="table table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nama Sales</th>
                            <th scope="col">Jumlah Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                                <span class="alert-sm px-2 rounded-3 alert-info">
                                    {{ strtoupper($orderdet->Order->sales_username) }}
                                </span>
                            </td>
                            <td>
                                <span class="alert-sm px-2 rounded-3 alert-info">
                                    {{ $orderdet->jumlah }} {{ $orderdet->Barang->satuan }}
                                </span>
                            </td>
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
        {{-- template --}}
        <div class="card-body">
            <div class="profile-timeline">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @if ($orderdet->status_pengerjaan_id > 7)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 7)
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                @if ($or->keterangan == 'selesai')
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                @endif
                                @if ($or->keterangan == 'selesai')
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if ($orderdet->status_pengerjaan_id > 6)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 7)
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if ($orderdet->status_pengerjaan_id > 5)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 6)
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if ($orderdet->status_pengerjaan_id > 4)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 5)
                        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if ($orderdet->status_pengerjaan_id > 3)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 4)
                        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    @if ($orderdet->status_pengerjaan_id > 2)
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
                        @foreach ($orderdet->Riwayat_pengerjaan as $or)
                        @if ($or->status_pengerjaan_id == 3)
                        <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body ms-2 ps-5 pt-0">
                                <h6 class="mb-1">{{ strtoupper($or->keterangan) }}</h6>
                                <p class="text-muted mb-0">{{ $or->created_at }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>
                <!--end accordion-->
            </div>
        </div>
        {{-- akhir template --}}
    </div>
</div>
@endsection