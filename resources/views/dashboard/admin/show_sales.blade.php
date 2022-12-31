@extends('dashboard.layout.main')

@section('container_beda')
<div class="main-content">
    {{-- @dd($sales) --}}
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
                            @if ($sales->foto)
                            <img src="{{ asset('storage/'). '/' . $sales->foto }}" alt="user-img"
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
                            <h3 class="text-white mb-1">{{ strtoupper($sales->nama) }}</h3>
                            <p class="text-white-75">Sales</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                        class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                    $sales->city->city_name }},
                                    {{ $sales->province->prov_name }}</div>
                                <div><i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                    $sales->district->dis_name }}
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

                                <li class="nav-item d-none">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Projects</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex-shrink-0">
                                @can('sales')
                                <a href="/sales/{{ $sales->id }}/edit" class="btn btn-success"><i
                                        class="ri-edit-box-line align-bottom"></i>
                                    Edit Profile</a>
                                @endcan
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
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nama Lengkap</th>
                                                                <td class="text-muted">: {{ strtoupper($sales->nama) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Username </th>
                                                                <td class="text-muted">: {{ strtoupper($sales->username)
                                                                    }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Nomor HP </th>
                                                                <td class="text-muted">: {{ $sales->nomor }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Alamat</th>
                                                                <td class="text-muted">: {{ strtoupper($sales->alamat .
                                                                    ', ' .
                                                                    $sales->district->dis_name.', '.
                                                                    $sales->city->city_name. ', '.
                                                                    $sales->province->prov_name) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="ps-0" scope="row">Tanggal bergabung</th>
                                                                <td class="text-muted">: {{ date("d-M-Y",
                                                                    strtotime($sales->created_at)) }}</td>
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
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-warning">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Chat App Update</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">2 year
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-warning fs-10">
                                                                    Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-1.jpg"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="assets/images/users/avatar-3.jpg"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-light text-primary">
                                                                                    J
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">ABC Project
                                                                        Customization</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">2 month
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-primary fs-10">
                                                                    Progress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-8.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-6.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div class="card profile-project-card shadow-none profile-project-info">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Client - Frank
                                                                        Hook</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">1 hr
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-info fs-10">New
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-4.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-light text-primary">
                                                                                    M
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-3.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Velzon Project</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">11 hr
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-success fs-10">
                                                                    Completed</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-5.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-danger">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Brand Logo Design</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">10 min
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-info fs-10">New
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-6.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-light text-primary">
                                                                                    E
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Chat App</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">8 hr
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-warning fs-10">
                                                                    Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-light text-primary">
                                                                                    R
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-3.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-8.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-warning">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Project Update</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">48 min
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-warning fs-10">
                                                                    Inprogress</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-6.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-5.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-4.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Client - Jennifer</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">30 min
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-primary fs-10">
                                                                    Process</div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-1.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none mb-xxl-0   profile-project-info">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Bsuiness Template -
                                                                        UI/UX design</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">7 month
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-success fs-10">
                                                                    Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-2.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-3.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-4.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none mb-xxl-0  profile-project-success">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Update Project</a>
                                                                </h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">1 month
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-info fs-10">New
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-light text-primary">
                                                                                    A
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none mb-sm-0  profile-project-danger">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">Bank Management
                                                                        System</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">10
                                                                        month
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-success fs-10">
                                                                    Completed</div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-6.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-5.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <div
                                                                                    class="avatar-title rounded-circle bg-primary">
                                                                                    2+
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-3 col-sm-6">
                                                <div
                                                    class="card profile-project-card shadow-none mb-0  profile-project-primary">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 text-muted overflow-hidden">
                                                                <h5 class="fs-14 text-truncate"><a href="#"
                                                                        class="text-dark">PSD to HTML
                                                                        Convert</a></h5>
                                                                <p class="text-muted text-truncate mb-0">Last
                                                                    Update : <span class="fw-semibold text-dark">29 min
                                                                        Ago</span></p>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="badge badge-soft-info fs-10">New
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div>
                                                                        <h5 class="fs-12 text-muted mb-0">
                                                                            Members :</h5>
                                                                    </div>
                                                                    <div class="avatar-group">
                                                                        <div class="avatar-group-item">
                                                                            <div class="avatar-xs">
                                                                                <img src="{{ url('assets/images/users/avatar-7.jpg') }}"
                                                                                    alt=""
                                                                                    class="rounded-circle img-fluid" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mt-4">
                                                    <ul
                                                        class="pagination pagination-separated justify-content-center mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="javascript:void(0);" class="page-link"><i
                                                                    class="mdi mdi-chevron-left"></i></a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="javascript:void(0);" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">4</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link">5</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="javascript:void(0);" class="page-link"><i
                                                                    class="mdi mdi-chevron-right"></i></a>
                                                        </li>
                                                    </ul>
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