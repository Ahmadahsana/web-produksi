@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Input Order</h4>
    </div><!-- end card header -->

    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div> 
        @endif

        <div class="row ">
            <div class="col-sm-7">
                <form action="">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama barang</label>
                        <select id="nama" name="nama" class="form-select" data-choices data-choices-sorting="true" >
                            <option value="" disabled selected>Pilih produk</option>
                            @foreach ($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="harga" class="form-label">harga</label>
                                <div class="input-group">
                                    <div class="input-group-text">Rp. </div>
                                    <input type="text" class="form-control" placeholder="Harga" id="cleave-numeral">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="">
                        <button type="button" id="tombol_keranjang" class="btn btn-primary">Masukkan Keranjang</button>
                    </div>
                </form>
            </div>
            <div class="col-sm">
                <label for="gambar" class="form-label">Gambar</label>
                <div id="tampung_gambar">
                    <div id="muncul_gambar"></div>
                    <div class="input-group">
                        <img src="" class="img-thumbnail" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- end card -->
</div>
<form action="" method="post">
    @csrf
<div class="row">
    <div class="col-7">
        <div class="card mt-1">
            <div class="card-header">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Keranjang saya</h4>
                        <div class="px-2" >
                            <span class="badge badge-soft-warning fs-13"><span id="totalItem" class="">0</span> items</span>
                        </div>
                    </div>
                </div>
                {{-- <h4 class="card-title mb-0">Keranjang saya</h4> --}}
            </div><!-- end card header -->
            <div class="card-body">
                <div class="" id="masukSini"></div>
                
                {{-- <div class="row d-flex align-items-center mb-2">
                    <div class="col-3">
                        <img src="assets/images/products/img-2.png" class="rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                    </div>
                    <div class="col-5">
                        <div class="flex-1">
                            <h6 class="mt-0 mb-1 fs-14">
                                Bentwood Chair
                            </h6>
                            <p class="mb-0 fs-12 text-muted">
                                Quantity: <span>5 x $18</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <h5 class="m-0 fw-normal">$<span class="cart-item-price">89</span> </h5>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn">
                            <i class="ri-close-fill fs-16"></i></button>
                    </div>
                    
                </div> --}}
                

                <div class="row">
                    <div class="d-flex justify-content-between align-items-center pb-3 mt-3">
                        <h5 class="m-0 text-muted">Total:</h5>
                        <div class="px-2" id="totalBayar">
                            <h5 class="m-0" id="cart-item-total">Rp 0</h5>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div><!-- end card -->
    </div>
    <div class="col">
        <div class="card mt-1">
            <div class="card-header">
                <h4 class="card-title mb-0">Down Payment</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="dp" class="form-label">DP</label>
                        <input type="number" class="form-control" id="dp" name="dp" placeholder="dp"> 
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <label for="jumlah" class="form-label">Bank</label>
                        <select id="payment" name="payment" class="form-select" >
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="bni">BNI</option>
                            <option value="mandiri">Mandiri</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Input Data</button>
                </div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div>
</form>



        <!-- cleave.js -->
        {{-- <script src="assets/libs/cleave.js/cleave.min.js"></script> --}}
        <!-- form masks init -->
        {{-- <script src="assets/js/pages/form-masks.init.js"></script> --}}
<script>
    
    let dataBarang = @json($barang);
    let tampung_gambar = document.querySelector('#tampung_gambar')
    let nama = document.querySelector('#nama');
    
    nama.addEventListener('change', function() {
        tampung_gambar.innerHTML = ''
        let muncul = document.createElement('div');
        muncul.setAttribute("id","muncul_gambar");
        document.querySelector('#tampung_gambar').appendChild(muncul)
        let id = this.value;
        let index = dataBarang.findIndex((barang) => barang.id == id);
        let harga = dataBarang[index].deskripsi_barang.harga
        let tampilHarga = document.querySelector('#cleave-numeral');
        let muncul_gambar = document.querySelector('#muncul_gambar');

        tampilHarga.value = harga;
        muncul_gambar.insertAdjacentHTML('afterend', `<img src="{{ asset('storage/')}}/${dataBarang[index].foto}" class="img-thumbnail" alt="">`);
        // document.querySelector('#jumlah').focus();
    });

    barang = document.querySelector('#nama');
    harga = document.querySelector('#cleave-numeral');
    jumlah = document.querySelector('#jumlah')

    masukKeranjang = [];
    hargaKeranjang = [];
    let tombol_keranjang = document.querySelector('#tombol_keranjang');
    tombol_keranjang.addEventListener('click', function(){
        let id = barang.value;
        
        let index = dataBarang.findIndex((barang) => barang.id == id);

        let namaBarang = dataBarang[index].nama;
        let idBarang = dataBarang[index].id;
        let fotoBarang = dataBarang[index].foto;
        let jumlahBarang = jumlah.value
        let hargaBarang = dataBarang[index].deskripsi_barang.harga
        let Total = parseInt(jumlahBarang) * parseInt(hargaBarang)
        
        let found = masukKeranjang.find(({id}) => id == idBarang);

        if (found !== undefined) {
            // console.log('sudah ada');
        } else {
            masukKeranjang.push({
                id : idBarang,
                nama : namaBarang,
                harga : hargaBarang,
                jumlah : jumlahBarang
            });
            hargaKeranjang.push(Total)
            // console.log('masuk');

            let masukSini = document.querySelector('#masukSini');

            masukSini.insertAdjacentHTML('beforeend', `<div class="row d-flex align-items-center mb-2">
                    <div class="col-3">
                        <img src="{{ asset('storage/')}}/${fotoBarang}" class="rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                    </div>
                    <div class="col-5">
                        <div class="flex-1">
                            <h6 class="mt-0 mb-1 fs-14">
                                ${namaBarang}
                            </h6>
                            <p class="mb-0 fs-12 text-muted">
                                Quantity: <span>${jumlahBarang} x ${hargaBarang}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-3">
                        <h5 class="m-0 fw-normal">Rp. <span class="cart-item-price">${Total}</span> </h5>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn">
                            <i class="ri-close-fill fs-16"></i></button>
                    </div>
                </div>
                <input type="text" class="d-none" name="idbarang[]" value="${idBarang}">
                <input type="text" class="d-none" name="jumlahbarang[]" value="${jumlahBarang}">`);
                
                
            }

        let sum = 0;
        hargaKeranjang.forEach(harga => {
            sum += parseInt(harga);
        });

        let totalItem = document.querySelector('#totalItem');
        let totalBayar = document.querySelector('#totalBayar');
        totalItem.innerHTML= masukKeranjang.length;
        totalBayar.innerHTML = `<h5 class="m-0" id="cart-item-total">Rp ${sum}</h5>`;

        harga.value = '';
        jumlah.value = '';
        
    });

</script>

@endsection