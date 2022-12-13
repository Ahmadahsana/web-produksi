<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Barang;
use App\Models\Order_detail;
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
            'barang' => Barang::all()
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
        $validatedData = [
            'sales_username' => auth()->user()->username,
            'tanggal' => date("Y/m/d H:i:s"),
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
        dd($request->id);
        return view('dashboard.admin.edit_order', [
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

        return 'sukses';
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
            'orders' => Order_detail::where('status_pengerjaan_id', '=', '1')->with(['barang', 'status_pengerjaan', 'header', 'header.sales'])
                ->get()
        ]);
    }

    public function list()
    {
        return view('dashboard.admin.daftar_order', [
            'orders' => Order_detail::where('status_pengerjaan_id', '!=', '1')->with(['barang', 'status_pengerjaan', 'header'])
                ->get()
        ]);
    }

    public function order_by_sales()
    {
        return view('dashboard.admin.order_sales', [
            'orders' => Order::with(['order_detail', 'order_detail.barang'])->get()
        ]);
    }

    public function order_by_sales_edit($id)
    {
        $order = Order::where('id', $id)->with(['order_detail', 'order_detail.barang', 'order_detail.status_pengerjaan', 'sales'])->first();
        return view('dashboard.admin.order_sales_detail', [
            'title' => 'Detail order sales',
            'orders' => $order
        ]);
    }
}
