@extends('dashboard.layout.main')

@section('container_beda')
<div class="main-content">
    {{-- @dd(auth()->user()) --}}
    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="{{ url('storage/default/bg.jpg') }}" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            @if (auth()->user()->foto)
                            <img src="{{ asset('storage/'). '/' . auth()->user()->foto }}" alt="user-img"
                                class="img-thumbnail rounded-circle" />
                            @else
                            <img class="img-thumbnail rounded-circle" src="/storage/foto-sales/default.jpg"
                                alt="Header Avatar">
                            @endif

                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{ strtoupper(auth()->user()->nama) }}</h3>
                            <p class="text-white-75">{{ strtoupper(auth()->user()->Role->nama) }}</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                        class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                    auth()->user()->city->city_name }},
                                    {{ auth()->user()->province->prov_name }}</div>
                                <div><i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                    auth()->user()->district->dis_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->


                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                        role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Profile</span>
                                    </a>
                                </li>
                                @can('sales')
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Riwayat Order</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                            <div class="flex-shrink-0">
                                <a href="/profil/{{ $user->id }}/edit" class="btn btn-success"><i
                                        class="ri-edit-box-line align-bottom"></i>
                                    Edit Profile</a>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        {{-- --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                @if (session()->has('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nama Lengkap</th>
                                                                <td class="text-muted">: {{
                                                                    strtoupper(auth()->user()->nama) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Username </th>
                                                                <td class="text-muted">: {{
                                                                    strtoupper(auth()->user()->username) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nomor HP </th>
                                                                <td class="text-muted">: {{ auth()->user()->nomor }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Alamat</th>
                                                                <td class="text-muted">: {{
                                                                    strtoupper(auth()->user()->alamat . ',
                                                                    ' .
                                                                    auth()->user()->district->dis_name.', '.
                                                                    auth()->user()->city->city_name. ', '.
                                                                    auth()->user()->province->prov_name) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Tanggal bergabung</th>
                                                                <td class="text-muted">: {{ date("d-M-Y",
                                                                    strtotime(auth()->user()->created_at)) }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Portfolio</h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <div>
                                                        <a href="javascript:void(0);" class="avatar-xs d-block">
                                                            <span
                                                                class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                                <i class="ri-github-fill"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="avatar-xs d-block">
                                                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                                <i class="ri-global-fill"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="avatar-xs d-block">
                                                            <span class="avatar-title rounded-circle fs-16 bg-success">
                                                                <i class="ri-dribbble-fill"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="avatar-xs d-block">
                                                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                                <i class="ri-pinterest-fill"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->

                                    </div>
                                    <!--end col-->

                                </div>
                                <!--end row-->
                            </div>

                            <div class="tab-pane fade" id="projects" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($order as $od)
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-warning">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-dark text-truncate mb-1">Tanggal
                                                                    Order :
                                                                    {{$od->tanggal }}
                                                                </h5>
                                                                <p class="text-dark text-truncate mb-1">Total Biaya :
                                                                    <span class="fw-semibold text-dark">@currency(
                                                                        $od->total_bayar)</span>
                                                                </p>
                                                                <p class="text-dark text-truncate mb-1">DP :
                                                                    <span class="fw-semibold text-dark">@currency(
                                                                        $od->dp)</span>
                                                                </p>
                                                                <p class="fs-14 text-truncate"><a
                                                                        href="riwayatOrder/{{ $od->id }}"
                                                                        class="btn btn-sm btn-info">View
                                                                        Detail</a>
                                                                </p>
                                                            </div>
                                                            <div class="flex-shrink-1 ms-2">
                                                                <div class="badge badge-soft-info fs-10">
                                                                    {{ strtoupper($od->payment) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            @endforeach
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mt-4 d-flex justify-content-center">
                                                    <span> {{ $order->links() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end card-->
                            </div>
                            <!--end tab-pane-->

                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- end main content-->
@endsection