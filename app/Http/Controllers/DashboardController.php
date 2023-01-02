<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori_barang;
use App\Models\User;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Status_pengerjaan;
use App\Models\Vendor_produksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index', [
            'tittlePage'    =>  'DASHBOARD',
            'sales'         =>  User::where('role_id', 2)->get(),
            'barangjadi'    =>  Barang::where('kategori_barang_id', 3)->get(),
            // 'mentahan'      =>  Barang::where('kategori_barang_id', 1)->get(),
            // 'accesoris'     =>  Barang::where('kategori_barang_id', 2)->get(),
            // 'packing'       =>  Barang::where('kategori_barang_id', 4)->get(),
            'mentahanP'     =>  Order_detail::where('status_pengerjaan_id', 3)->get(),
            'finishingP'    =>  Order_detail::where('status_pengerjaan_id', 4)->get(),
            'jokp'          =>  Order_detail::where('status_pengerjaan_id', 5)->get(),
            'packingp'      =>  Order_detail::where('status_pengerjaan_id', 6)->get(),
            'pengirimanp'   =>  Order_detail::where('status_pengerjaan_id', 7)->get(),
            // 'finishingP'    =>  Order_detail::where('status_pengerjaan_id', 4)->get(),
            // 'lpermintaan'   =>  Order_detail::where('status_pengerjaan_id', 1)->get(),
            // 'lorder'        =>  Order_detail::whereNot('status_pengerjaan_id', '=', 1)->get(),
            'vendor'        =>  Vendor_produksi::all()
        ]);
    }
}
