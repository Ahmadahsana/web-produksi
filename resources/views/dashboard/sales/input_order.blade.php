@extends('dashboard.layout.main')

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">{{ $tittlePage }}</h4>
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
                        <select id="nama" name="nama" class="form-select" data-choices data-choices-sorting="true">
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
                                    {{-- <div class="input-group-text">Rp. </div> --}}
                                    <input type="text" class="form-control" placeholder="Harga" id="cleave-numeral"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="jumlah" class="form-label d-block">jumlah</label>
                                {{-- <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" min="1"> --}}
                                <div class="input-step step-primary inline-block">
                                    <button type="button" class="minus">-</button>
                                    <input type="number" class="product-quantity" value="1" min="0" max="100" readonly="" id="jumlah" name="jumlah">
                                    <button type="button" class="plus">+</button>
                                </div>
                                <div id="wadah_peringatan_jumlah"></div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <button type="button" id="tombol_keranjang" class="btn btn-primary">Masukkan Keranjang</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <label for="gambar" class="form-label">Gambar</label>
                <div id="tampung_gambar">
                    <div id="muncul_gambar" class="d-flex justify-content-center">
                        
                    </div>
                    {{-- <div class="input-group">
                        <img src="" height="100px" class="img-fluid" alt="">
                    </div> --}}
                </div>
            </div>
        </div>

    </div><!-- end card -->
</div>
<form action="" method="post" id="form_submit_order">
    @csrf
    <div class="row">
        <div class="col-sm">
            <div class="card mt-1">
                <div class="card-header">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Keranjang saya</h4>
                            <div class="px-2">
                                <span class="badge badge-soft-warning fs-13"><span id="totalItem" class="">0</span>
                                    items</span>
                            </div>
                        </div>
                    </div>
                    {{-- <h4 class="card-title mb-0">Keranjang saya</h4> --}}
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="" id="masukSini"></div>
                    <div id="wadah_peringatan_barang"></div>


                    <div class="row">
                        <div class="d-flex justify-content-around align-items-center pb-3 mt-3">
                            <h5 class="ms-5 text-muted">Total:</h5>
                            <div class="px-2" id="totalBayar">
                                <h5 class="m-0" id="cart-item-total">Rp 0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end card -->
    <div class="col-sm">
        <div class="card mt-1">
            <div class="card-header">
                <h4 class="card-title mb-0">Down Payment</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="dp" class="form-label">DP</label>
                        <input type="text" class="form-control" id="dpmask" name="dpmask" placeholder="dp">
                        <input type="text" class="form-control d-none" id="dp" name="dp" placeholder="dp">
                        <div id="wadah_peringatan_dp"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <label for="jumlah" class="form-label">Bank</label>
                        <select id="payment" name="payment" class="form-select">
                            <option value="" disabled selected>Pilih Bank</option>
                            <option value="bni">BNI</option>
                            <option value="mandiri">Mandiri</option>
                        </select>
                        <div id="wadah_peringatan_payment"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="button" id="submit_order" class="btn btn-primary">Input Data</button>
                    </div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</form>



<!-- cleave.js -->
{{-- <script src="assets/libs/cleave.js/cleave.min.js"></script> --}}
<!-- form masks init -->
{{-- <script src="assets/js/pages/form-masks.init.js"></script> --}}

<script>
    let wadah_peringatan_barang = document.querySelector('#wadah_peringatan_barang');
    let dataBarang = @json($barang);
    let tampung_gambar = document.querySelector('#tampung_gambar')
    let nama = document.querySelector('#nama');
    
    nama.addEventListener('change', function() {
        document.getElementById("jumlah").focus();
        tampung_gambar.innerHTML = ''
        let muncul = document.createElement('div');
        muncul.setAttribute("id","muncul_gambar");
        document.querySelector('#tampung_gambar').appendChild(muncul)
        let id = this.value;
        let index = dataBarang.findIndex((barang) => barang.id == id);
        let harga = formatCurrency(dataBarang[index].hpp)
        let tampilHarga = document.querySelector('#cleave-numeral');
        let muncul_gambar = document.querySelector('#muncul_gambar');

        tampilHarga.value = harga;
        muncul_gambar.insertAdjacentHTML('beforeend', `<img src="{{ asset('storage/')}}/${dataBarang[index].foto}" class="img-thumbnail" alt="">`);
        
    });

    barang = document.querySelector('#nama');
    harga = document.querySelector('#cleave-numeral');
    jumlah = document.querySelector('#jumlah')

    masukKeranjang = [];
    hargaKeranjang = [];
    let sum = 0;
    let tombol_keranjang = document.querySelector('#tombol_keranjang');
    tombol_keranjang.addEventListener('click', function(){
        let id = barang.value;
        
        let index = dataBarang.findIndex((barang) => barang.id == id);

        let namaBarang = dataBarang[index].nama;
        let idBarang = dataBarang[index].id;
        let fotoBarang = dataBarang[index].foto;
        let jumlahBarang = jumlah.value
        let hargaBarang = dataBarang[index].hpp
        let Total = parseInt(jumlahBarang) * parseInt(hargaBarang)
        
        let wadah_peringatan_jumlah = document.querySelector('#wadah_peringatan_jumlah');
        let found = masukKeranjang.find(({id}) => id == idBarang);

        if (jumlahBarang == '' || jumlahBarang == '0') {
            console.log(jumlahBarang);
            wadah_peringatan_jumlah.innerHTML = '<p class="text-danger">Masukkan jumlah barang</p>'
        }else{
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
                sum = sum + Total
    
                let masukSini = document.querySelector('#masukSini');
                wadah_peringatan_jumlah.innerHTML = ''
                wadah_peringatan_barang.innerHTML = ''
    
                masukSini.insertAdjacentHTML('beforeend', `<div class="row d-flex align-items-center mb-2 list_barang">
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
                                                                    <h5 class="m-0 fw-normal"><span class="cart-item-price">${formatCurrency(Total)}</span> </h5>
                                                                </div>
                                                                <div class="col-1">
                                                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn" onclick="hapusItem(this, ${idBarang}, ${Total})">
                                                                        <i class="ri-close-fill fs-16"></i></button>
                                                                </div>
                                                                
                                                                <input type="text" class="d-none" name="idbarang[]" value="${idBarang}">
                                                                <input type="text" class="d-none" name="jumlahbarang[]" value="${jumlahBarang}">
                                                                <input type="text" class="d-none" name="total_harga[]" value="${Total}">
                                                            </div>`);
                                                            
                
                harga.value = '';
                jumlah.value = '0';
                    
            }
        }


        
        // hargaKeranjang.forEach(harga => {
        //     sum = sum + parseInt(harga);
        // });

        let totalItem = document.querySelector('#totalItem');
        let totalBayar = document.querySelector('#totalBayar');
        totalItem.innerHTML= masukKeranjang.length;
        totalBayar.innerHTML = `<h5 class="m-0" id="cart-item-total">${formatCurrency(sum)}</h5><input type="text" class="d-none" value="${sum}" name="total_bayar">`;

        
        console.log(hargaKeranjang);
        
    });


    // hapus item di kranjang
    function hapusItem(e, id, Total) {
        let idx = masukKeranjang.findIndex((barang) => barang.id == id);
        let ttl = hargaKeranjang.findIndex((element) => element == Total);
        console.log(ttl);
        masukKeranjang.splice(idx, 1);
        hargaKeranjang.splice(ttl, 1);
        e.parentElement.parentElement.remove();
        totalItem.innerHTML= masukKeranjang.length;
        sum = sum-Total;
        totalBayar.innerHTML = `<h5 class="m-0" id="cart-item-total">Rp ${sum}</h5><input type="text" class="d-none" value="${sum}" name="total_bayar">`;
        console.log(sum);
    } 

    let submit_order = document.querySelector('#submit_order');
    let dp = document.querySelector('#dp').value;
    let inputdp = document.querySelector('#dp');
    let dpmask = document.querySelector('#dpmask');
    let payment = document.querySelector('#payment').value;

    submit_order.addEventListener('click', function (e) {
        let list_barang = document.querySelector('.list_barang');
        let wadah_peringatan_dp = document.querySelector('#wadah_peringatan_dp');

        if (list_barang == null) {
            wadah_peringatan_barang.innerHTML = '<p class="text-danger">Barang tidak boleh kosong</p>'
        }else{
            if (dp == '') {
            // console.log(list_barang);
            wadah_peringatan_dp.innerHTML = '<p class="text-danger">Dp harus diisi</p>'
            }else{
                if (dp > sum) {
                    wadah_peringatan_dp.innerHTML = '<p class="text-danger">Dp tidak valid</p>'
                }else{
                    wadah_peringatan_dp.innerHTML = ''
                    if (payment == '') {
                        let wadah_peringatan_payment = document.querySelector('#wadah_peringatan_payment');
                        wadah_peringatan_payment.innerHTML = '<p class="text-danger">Pilih metode payment</p>'
                    }else{
                        let form_submit_order = document.querySelector('#form_submit_order');
                        form_submit_order.submit()
                    }
                }
            }
        }

    })


    dpmask.addEventListener('change', function(event) {
        // let mask = this.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        // console.log(mask);
        // dpmask.value = mask;
        nomask = destroyMask(this.value);
        inputdp.value = destroyMask(nomask);
        
        mask = createMask(nomask);
        this.value = mask
    })

    function createMask(string){
        return string.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

    function destroyMask(string){
        return string.replace(/\D/g,'').substring(0,9);
    }
    
</script>
@endsection