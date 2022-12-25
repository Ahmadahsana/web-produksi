@extends('dashboard.layout.main')

@section('container')
<div class="row">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @can('admin')
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Vendor</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($vendor) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($vendor) }}">0</span> Vendor
                        </h4>
                        <a href="/vendor" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-primary rounded fs-3">
                            <i class="bx bxs-user-check text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Total Sales</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($sales) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($sales) }}">0</span> Sales
                        </h4>
                        <a href="/sales" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-primary rounded fs-3">
                            <i class="bx bx-user-circle text-primary"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Barang Jadi</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($barangjadi) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($barangjadi) }}">0</span> Barang Jadi</h4>
                        <a href="/barang" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded fs-3">
                            <i class="bx bx-archive text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Mentahan</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($mentahan) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($mentahan) }}">0</span> Mentahan B.
                        </h4>
                        <a href="/mentahan_barang" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded fs-3">
                            <i class="bx bx-archive text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Aksesoris / Jok</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($accesoris) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($accesoris) }}">0</span> Aksesoris/Jok
                        </h4>
                        <a href="/jok_aksesoris_barang" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded fs-3">
                            <i class="bx bx-archive text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Packing</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($packing) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($packing) }}">0</span> Packing
                        </h4>
                        <a href="/packing_barang" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-warning rounded fs-3">
                            <i class="bx bx-archive text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Proses Mentahan</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($mentahanP) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($mentahanP) }}">0</span> Mentahan P.
                        </h4>
                        <a href="/mentahan" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-danger rounded fs-3">
                            <i class="bx bx-sync text-danger"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            Proses Finishing</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($finishingP) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($finishingP) }}">0</span> Finishing P.
                        </h4>
                        <a href="/finishing" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-danger rounded fs-3">
                            <i class="bx bx-sync text-danger"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            List Permintaan</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($lpermintaan) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($lpermintaan) }}">0</span> List Permintaan
                        </h4>
                        <a href="/list_permintaan" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-success rounded fs-3">
                            <i class="bx bx-list-plus text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                            List Order</p>
                    </div>
                    <div class="flex-shrink-0">
                        <h5 class="text-success fs-14 mb-0">
                            {{ count($lorder) }}
                        </h5>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                data-target="{{ count($lorder) }}">0</span> List Order
                        </h4>
                        <a href="/list_order" class="text-decoration-underline">View Details</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-success rounded fs-3">
                            <i class="bx bx-list-plus text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    @endcan
</div> <!-- end row-->

@endsection