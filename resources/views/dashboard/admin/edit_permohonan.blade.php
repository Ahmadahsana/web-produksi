@extends('dashboard.layout.main')
@section('container_beda')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ url('storage/default/bg.jpg') }}" class="profile-wid-img" alt="">
                    <div class="overlay-content d-none">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file"
                                    class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    @if ($sales->foto)
                                    <img src="{{ asset('storage').'/'. $sales->foto }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                    @else
                                    <img class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        src="/storage/foto-sales/default.jpg" alt="user-profile-default">
                                    @endif

                                    <div class="d-none avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1">{{ $sales->nama }}</h5>
                                <p class="text-muted mb-0">Sales</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->


                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i>
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item d-none">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="far fa-user"></i>
                                        Change Password
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="/permohonanuser/{{ $sales->id }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="status_user_id" class="form-label">Status User</label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    name="status_user_id">
                                                    @foreach ($status as $st)
                                                    @if (old('status_user_id', $st->id) == $st->id)
                                                    <option value="{{ $st->id }}" selected>{{ $st->nama }}</option>
                                                    @else
                                                    <option value="{{ $st->id }}">{{ $st->nama }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('status_user_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            {{-- endcoll --}}
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        placeholder="Enter your firstname" value="{{ $sales->nama }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="lastnameInput"
                                                        placeholder="Enter your lastname" value="{{ $sales->username }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone
                                                        Number</label>
                                                    <input type="number" class="form-control" id="phonenumberInput"
                                                        placeholder="Enter your phone number"
                                                        value="{{ $sales->nomor }}" disabled>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="emailInput"
                                                        placeholder="Enter your email" value="{{ $sales->alamat }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="cityInput" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control" id="cityInput"
                                                        placeholder="City" value="{{ $sales->district->dis_name }}"
                                                        disabled />
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="countryInput" class="form-label">Kota</label>
                                                    <input type="text" class="form-control" id="countryInput"
                                                        placeholder="Country" value="{{ $sales->city->city_name }}"
                                                        disabled />
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="zipcodeInput" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" id="zipcodeInput"
                                                        placeholder="Enter zipcode"
                                                        value="{{ $sales->province->prov_name }}" disabled>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            {{-- <div class="col-lg-12">
                                                <div class="mb-3 pb-2">
                                                    <label for="exampleFormControlTextarea"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea"
                                                        placeholder="Enter your description"
                                                        rows="3">Hi I'm Anna Adame,It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</textarea>
                                                </div>
                                            </div>
                                            <!--end col--> --}}
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Updates</button>
                                                    <a href="/permohonanuser" class="btn btn-danger">Kembali</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
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
</div>
<!-- end main content-->

@endsection