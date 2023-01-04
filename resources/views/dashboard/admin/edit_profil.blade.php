@extends('dashboard.layout.main')
@section('container_beda')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ url('storage/default/bg.jpg') }}" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto d-none rounded-circle profile-photo-edit">
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
                            @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    @if (auth()->user()->foto)
                                    <img src="{{ asset('storage').'/'. auth()->user()->foto }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                    @else
                                    <img class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        src="/storage/foto-sales/default.jpg" alt="Header Avatar">
                                    @endif

                                    <div class="avatar-xs d-none p-0 rounded-circle profile-photo-edit">
                                        {{-- <input id="profile-img-file-input" type="hidden"
                                            class="profile-img-file-input" name="oldFoto">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input"
                                            name="foto"> --}}
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1">{{ auth()->user()->nama }}</h5>
                                <p class="text-muted mb-0">{{ auth()->user()->Role->nama }}</p>
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
                                <li class="nav-item">
                                    <a class="nav-link" id="ubahpassword" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="far fa-user"></i>
                                        Change Password
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <form action="/profil/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Masukkan
                                                        Gambar</label>
                                                    <input id="profile-img-file-input" type="hidden"
                                                        class="profile-img-file-input" name="oldFoto">
                                                    <input id="profile-img-file-input" type="file" class="form-control"
                                                        name="foto">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Nama
                                                        Lengkap</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        name="nama" placeholder="Enter your firstname"
                                                        value="{{ auth()->user()->nama }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="lastnameInput"
                                                        name="username" placeholder="Enter your lastname"
                                                        value="{{ auth()->user()->username }}" readonly>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone
                                                        Number</label>
                                                    <input type="number" class="form-control" name="nomor"
                                                        id="phonenumberInput" placeholder="Enter your phone number"
                                                        value="{{ auth()->user()->nomor }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="emailInput"
                                                        name="alamat" placeholder="Enter your email"
                                                        value="{{ auth()->user()->alamat }}">
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <select class="form-select mb-3" aria-label="Default select example"
                                                        id="provinsi" name="provinsi" data-choices>
                                                        <option selected disabled>Pilih Provinsi</option>
                                                    </select>
                                                    @error('provinsi')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="kota" class="form-label">Kota</label>

                                                    <select class="form-select mb-3" aria-label="Default select example"
                                                        id="kota" name="kota">
                                                        <option selected disabled>Pilih Kota</option>

                                                    </select>
                                                    @error('kota')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                    <select class="form-select mb-3" aria-label="Default select example"
                                                        id="kecamatan" name="kecamatan">
                                                        <option selected disabled>Pilih Kecamatan</option>

                                                    </select>
                                                    @error('kecamatan')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
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
                                                    <a href="/profil" class="btn btn-danger">Kembali</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="/ganti_password" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" class="form-control" name="old_password" id="oldpasswordInput"
                                                placeholder="Enter current password">
                                            @error('old_password')
                                                <p class="text-danger">{{ $message }}</p>
                                                <script>
                                                    window.onload=function(){
                                                    document.getElementById("ubahpassword").click();
                                                };
                                                </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" class="form-control" name="password" id="newpasswordInput"
                                                placeholder="Enter new password">
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                                <script>
                                                    window.onload=function(){
                                                    document.getElementById("ubahpassword").click();
                                                };
                                                </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="confirmpasswordInput"
                                                placeholder="Confirm password">
                                            @error('password_confirmation')
                                                <p class="text-danger">{{ $message }}</p>
                                                <script>
                                                    window.onload=function(){
                                                    document.getElementById("ubahpassword").click();
                                                };
                                                </script>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>

                        </div>
                        <!--end tab-pane-->


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



<script>
let provinsi = @json($provinsi);
let selectProvinsi = document.querySelector('#provinsi');
let selectKota = document.querySelector('#kota');
let selectKecamatan = document.querySelector('#kecamatan');
provinsi.forEach(e => {
    selectProvinsi.insertAdjacentHTML('beforeend', `<option value="${e.prov_id}">${e.prov_name}</option>`)
});

selectProvinsi.addEventListener('change', function() {
    let indexProvinsi = this.value - 1;
    selectKota.innerHTML = '';
    provinsi[indexProvinsi].city.forEach(e => {
        selectKota.insertAdjacentHTML('beforeend', `<option value="${e.city_id}">${e.city_name}</option>`)
    });
});

selectKota.addEventListener('change', function () {
    let id = this.value;
    provinsi.forEach(e => {
        e.city.forEach(i => {
            if (i.city_id == id) {
                let indexKota = e.city.findIndex((y) => y.city_id == id);
                // console.log(e.city[indexKota]);
                selectKecamatan.innerHTML = '';
                e.city[indexKota].district.forEach(element => {
                    selectKecamatan.insertAdjacentHTML('beforeend', `<option value="${element.dis_id}">${element.dis_name}</option>`)
                });
            }
        });
    });
})
</script>
@endsection