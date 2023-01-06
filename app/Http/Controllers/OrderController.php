<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Barang;
use App\Models\Order_detail;
use App\Models\Riwayat_pengerjaan;
use App\Models\Status_pengerjaan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sales.input_order', [
            'tittlePage'    => 'INPUT ORDER',
            'barang'        => Barang::where('status_jual_id', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        // return $request;
        // dd($request->total_bayar);
        $validatedData = [
            'sales_username' => auth()->user()->username,
            'tanggal' => date("Y/m/d H:i:s"),
            'total_bayar' => $request->total_bayar,
            'dp' => $request->dp,
            'payment' => $request->payment
        ];


        $buatOrder = Order::create($validatedData);
        $idOrder = $buatOrder->id;


        $i = 0;
        foreach ($request->idbarang as $b) {
            $dataDetail = [
                'order_id' => $idOrder,
                'barang_id' => $request->idbarang[$i],
                'jumlah' => $request->jumlahbarang[$i],
                'total_harga' => $request->total_harga[$i],
                'status_pengerjaan_id' => 1
            ];

            Order_detail::create($dataDetail);

            $i++;
        }

        return redirect('/order')->with('success', 'Berhasil input order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('dashboard.admin.edit_order', [
            'tittlePage'    => 'DETAIL ORDER',
            'order' => Order_detail::find($request)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_detail $order)
    {
        // dd($order);
        return view('dashboard.admin.edit_order', [
            'tittlePage'    => 'EDIT ORDER',
            'order' => $order,
            'status' => Status_pengerjaan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order_detail $order)
    {
        // $request->validate([
        //     'tanggal' => 'required',
        //     'sales' => 'required',
        //     'nama' => 'required',
        //     'jumlah' => 'required',
        //     'status' => 'required'
        // ]);
        $data = [
            'status_pengerjaan_id' => $request->status
        ];
        Order_detail::where('id', $order->id)->update($data);


        if ($request->status == 9) {
            return redirect('/list_permintaan')->with('success', 'Permintaan Berhasil Menolak Orderan !!');
        } elseif ($request->status > 2) {
            $data_riwayat_order = [
                'order_detail_id' => $order->id,
                'status_pengerjaan_id' => $request->status,
                'keterangan' => 'masuk'
            ];

            Riwayat_pengerjaan::create($data_riwayat_order);

            return redirect('/list_order')->with('success', 'Orderan Sudah Mulai Di Produksi 😊');
        } else {
            return redirect('/list_permintaan')->with('success', 'Permintaan Berhasil Terima Orderan 😊');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function permintaan()
    {
        return view('dashboard.admin.permintaan_order', [
            'tittlePage'    => 'LIST PERMINTAAN ORDER',
            'orders' => Order_detail::where('status_pengerjaan_id', '=', '1')->with(['barang', 'status_pengerjaan', 'Order', 'Order.sales'])
                ->get()
        ]);
    }

    public function list()
    {
        return view('dashboard.admin.daftar_order', [
            'tittlePage'    => 'LIST ORDER',
            'orders' => Order_detail::where('status_pengerjaan_id', '!=', '1')->with(['barang', 'status_pengerjaan', 'Order'])
                ->get()
        ]);
    }

    public function order_by_sales()
    {
        return view('dashboard.admin.order_sales', [
            'tittlePage'    => 'ORDER SALES',
            'orders' => Order::with(['order_detail', 'order_detail.barang'])->get()
        ]);
    }

    public function order_by_sales_edit($id)
    {
        $order = Order::where('id', $id)->with(['order_detail', 'order_detail.barang', 'order_detail.status_pengerjaan', 'sales'])->first();
        return view('dashboard.admin.order_sales_detail', [
            'tittlePage'    => 'ORDER SALES DETAIL',
            'title' => 'Detail order sales',
            'orders' => $order
        ]);
    }

    public function riwayatOrder()
    {
        return view('dashboard.sales.daftar_riwayatOrder', [
            'tittlePage'    =>  'RIWAYAT ORDER',
            'orders'        =>  Order::where('sales_username', auth()->user()->username)->get()
        ]);
    }

    public function Detailriwayatorder(Order $id_order)
    {
        return view('dashboard.sales.detail_riwayatOrder', [
            'tittlePage'    =>  'DETAIL RIWAYAT ORDER',
            'order'         =>  $id_order->load('Order_detail'),

        ]);
    }

    public function order_selesai()
    {
        return view('produksi.order_selesai.list_order_selesai', [
            'tittlePage'    => 'LIST ORDER SELESAI',
            'orders' => Order_detail::where('status_pengerjaan_id', '=', '8')->with(['barang', 'status_pengerjaan', 'Order', 'Order.sales'])
                ->get()
        ]);
    }

    public function detail_order_selesai($id_order_detail)
    {
        // return $id_order_detail;
        return view('produksi.order_selesai.detail_order', [
            'tittlePage'        => 'Detail order',
            'order_detail' => Order_detail::where('id', $id_order_detail)->with(['barang', 'status_pengerjaan', 'Order.sales', 'keuntungan'])
                ->first()
        ]);
    }
}
