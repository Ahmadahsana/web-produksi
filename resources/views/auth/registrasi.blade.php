@extends('auth.main')
@section('container')

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </a>
                        </div>
                        {{-- <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> --}}
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-9 col-xl-9">
                    <div class="card mt-4">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Create New Account </h5>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="/registrasi" method="post" enctype="multipart/form-data">
                                    @csrf

                                    {{-- <div class="card-body">
                                        <p class="text-muted">FilePond is a JavaScript library with profile
                                            picture-shaped file upload variation.</p>
                                        <div class="avatar-xl mx-auto">
                                            <input type="file" class="filepond filepond-input-circle" name="filepond"
                                                accept="image/png, image/jpeg, image/gif" id="dropzone-preview-list">
                                        </div>

                                    </div> --}}
                                    <!-- end card body -->

                                    {{-- <div class="avatar-xl mx-auto">
                                        <div class="filepond--root filepond filepond-input-circle filepond--hopper"
                                            data-style-panel-layout="compact circle"
                                            data-style-button-remove-item-position="left bottom"
                                            data-style-button-process-item-position="right bottom"
                                            data-style-load-indicator-position="center bottom"
                                            data-style-progress-indicator-position="right bottom"
                                            data-style-button-remove-item-align="false" style="height: 120px;"><input
                                                class="filepond--browser" type="file" id="filepond--browser" name="foto"
                                                aria-controls="filepond--assistant"
                                                aria-labelledby="filepond--drop-label"><a class="filepond--credits"
                                                aria-hidden="true" href="https://pqina.nl/" target="_blank"
                                                rel="noopener noreferrer" style="transform: translateY(120px);">Powered
                                                by PQINA</a>
                                            <div class="filepond--drop-label"
                                                style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label
                                                    for="filepond--browser" id="filepond--drop-label"
                                                    aria-hidden="true">Drag &amp;
                                                    Drop
                                                    your picture or <span class="filepond--label-action"
                                                        tabindex="0">Browse</span></label></div>
                                            <div class="filepond--list-scroller"
                                                style="transform: translate3d(0px, 0px, 0px);">
                                                <ul class="filepond--list" role="list"></ul>
                                            </div>
                                            <div class="filepond--panel filepond--panel-root" data-scalable="false">
                                                <div class="filepond--panel-top filepond--panel-root"></div>
                                                <div class="filepond--panel-center filepond--panel-root"
                                                    style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1.2, 1);">
                                                </div>
                                                <div class="filepond--panel-bottom filepond--panel-root"
                                                    style="transform: translate3d(0px, 120px, 0px);">
                                                </div>
                                            </div><span class="filepond--assistant" id="filepond--assistant"
                                                role="status" aria-live="polite" aria-relevant="additions"></span>
                                            <div class="filepond--drip"></div>
                                            <fieldset class="filepond--data"></fieldset>
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Masukkan Foto <span
                                                        class="text-danger">*</span></label>
                                                <input type="file"
                                                    class="form-control @error('foto')is-invalid @enderror" name="foto"
                                                    id="foto" placeholder="Masukkan Foto" required autofocus
                                                    autocomplete="off">
                                                @error('foto')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nama')is-invalid @enderror" name="nama"
                                                    id="nama" placeholder="Masukkan Nama" required autofocus
                                                    autocomplete="off">
                                                @error('nama')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('username')is-invalid @enderror"
                                                    name="username" id="username" placeholder="Masukkan Username"
                                                    required autofocus autocomplete="off">
                                                @error('username')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="nomor" class="form-label">Nomor Telp<span
                                                        class="text-danger">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('nomor')is-invalid @enderror"
                                                    name="nomor" id="nomor" placeholder="Masukkan Nomor Telpon" required
                                                    autofocus autocomplete="off">
                                                @error('nomor')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email')is-invalid @enderror"
                                                    name="email" id="email" placeholder="Masukkan Email" required
                                                    autofocus autocomplete="off">
                                                @error('email')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat<span
                                                        class="text-danger">*</span></label>
                                                <input type="alamat"
                                                    class="form-control @error('alamat')is-invalid @enderror"
                                                    name="alamat" id="alamat" placeholder="Masukkan Alamat" required
                                                    autofocus autocomplete="off">
                                                @error('alamat')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="provinsi" class="form-label">Provinsi<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    id="provinsi" name="provinsi" data-choices>
                                                    <option selected disabled>Pilih provinsi</option>
                                                </select>
                                                @error('provinsi')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">Kota<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    id="kota" name="kota" data-choices>
                                                    <option selected disabled>Pilih kota</option>
                                                </select>
                                                @error('kota')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="kecamatan" class="form-label">Kecamatan<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    id="kecamatan" name="kecamatan" data-choices>
                                                    <option selected disabled>Pilih kecamatan</option>
                                                </select>
                                                @error('kecamatan')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password<span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5"
                                                        placeholder="Masukkan Password" id="password-input"
                                                        name="password" required autocomplete="off" autofocus>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                @error('password')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Repeat Password<span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5"
                                                        placeholder="Masukkan Password" id="password1"
                                                        name="password_confirmation" required autocomplete="off"
                                                        autofocus>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                                @error('password1')
                                                <div class="text-danger">
                                                    {{-- {{ $message }} --}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-center">
                                        <button class="btn btn-success w-50" type="submit">Sign Up</button>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="mt-4 text-center">
                    <p class="mb-0">Already have an account ? <a href="/login"
                            class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end auth page content -->

<!-- footer -->
{{-- <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mb-0 text-muted">&copy; <script>
                            document.write(new Date().getFullYear())
                        </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
<!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->


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

<!-- dropzone min -->
<script src="{{ url('assets/libs/dropzone/dropzone-min.js') }}"></script>
<!-- filepond js -->
<script src="{{ url('assets/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ url('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ url('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
</script>
<script
    src="{{ url('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
</script>
<script src="{{ url('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

<script src="{{ url('assets/js/pages/form-file-upload.init.js') }}"></script>

<script src="{{ url('assets/js/app.js') }}"></script>
@endsection