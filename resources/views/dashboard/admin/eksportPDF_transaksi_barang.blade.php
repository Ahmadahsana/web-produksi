{{-- dompdf --}}
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Riwayat Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Daftar Riwayat Transaksi </h5>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Transaksi</th>
                <th>Jumlah</th>
                <th>Stok Awal</th>
                <th>Stok Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($data as $tr)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="id" style="display:none;"><a href="javascript:void(0);"
                        class="fw-medium link-primary">#VZ2101</a></td>
                <td>{{ date("d-M-Y", strtotime($tr->created_at)) }}</td>
                <td>{{ strtoupper($tr->Barang->nama) }}</td>
                <td>{{ $tr->kode_barang }}</td>
                <td>
                    <span
                        class="badge  @if ($tr->jenis_transaksi=='Debit') badge-soft-success @else badge-soft-danger @endif text-uppercase">@if($tr->jenis_transaksi=='Debit')
                        Debit @else Kredit @endif
                    </span>
                </td>
                <td>{{ $tr->jumlah }}</td>
                <td>{{ $tr->stok_awal }}</td>
                <td>{{ $tr->stok_akhir }}</td>
                <td>{{ strtoupper($tr->keterangan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

{{-- TCPDF --}}
{{--
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <table class="table table-active table-bordered table-responsive table-info" id="customerTable">
        <thead class="table-light">
            <tr>
                <th class="sort" data-sort="phone">No</th>
                <th class="sort" data-sort="customer_name">Tanggal</th>
                <th class="sort" data-sort="customer_name">Nama Barang</th>
                <th class="sort" data-sort="alamat">Kode</th>
                <th class="sort" data-sort="phone">Transaksi</th>
                <th class="sort" data-sort="action">Jumlah</th>
                <th class="sort" data-sort="action">Stok Awal</th>
                <th class="sort" data-sort="action">Stok Akhir</th>
                <th class="sort" data-sort="action">Keterangan</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($data as $tr)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="id" style="display:none;"><a href="javascript:void(0);"
                        class="fw-medium link-primary">#VZ2101</a></td>
                <td class="customer_name">{{ date("d-M-Y", strtotime($tr->created_at)) }}</td>
                <td class="alamat">{{ strtoupper($tr->Barang->nama) }}</td>
                <td class="alamat">{{ $tr->kode_barang }}</td>
                <td class="status"><span
                        class="badge  @if ($tr->jenis_transaksi=='Debit') badge-soft-success @else badge-soft-danger @endif text-uppercase">@if($tr->jenis_transaksi=='Debit')
                        Debit @else Kredit @endif</span></td>
                <td class="alamat">{{ $tr->jumlah }}</td>
                <td class="alamat">{{ $tr->stok_awal }}</td>
                <td class="alamat">{{ $tr->stok_akhir }}</td>
                <td class="alamat">{{ strtoupper($tr->keterangan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html> --}}




{{--
<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Transaksi</th>
                <th>Jumlah</th>
                <th>Stok Awal</th>
                <th>Stok Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $tr)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="id" style="display:none;"><a href="javascript:void(0);"
                        class="fw-medium link-primary">#VZ2101</a></td>
                <td class="customer_name">{{ date("d-M-Y", strtotime($tr->created_at)) }}</td>
                <td class="alamat">{{ strtoupper($tr->Barang->nama) }}</td>
                <td class="alamat">{{ $tr->kode_barang }}</td>
                <td class="status"><span
                        class="badge  @if ($tr->jenis_transaksi=='Debit') badge-soft-success @else badge-soft-danger @endif text-uppercase">@if($tr->jenis_transaksi=='Debit')
                        Debit @else Kredit @endif</span></td>
                <td class="alamat">{{ $tr->jumlah }}</td>
                <td class="alamat">{{ $tr->stok_awal }}</td>
                <td class="alamat">{{ $tr->stok_akhir }}</td>
                <td class="alamat">{{ strtoupper($tr->keterangan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}