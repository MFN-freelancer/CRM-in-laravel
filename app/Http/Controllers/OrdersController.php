<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Orders;
use App\PackageDetail;
use App\Products;
use App\Packages;
use Auth;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products_in_packages = [];
        $products = Products::all();
        $packages = Packages::all();
        foreach ($packages as $package){
            $products_in_packages[] = Packages::find($package->id)->products;
        }
        $business_id = $id;
//        $no = 1;
//        for ($i = 0; $i<count($products_in_packages[$no]);$i++){
//            echo $products_in_packages[$no][$i]->product_name;
//        }
//        dd($products_in_packages);

        return view('client.product-order', compact('packages', 'products', 'products_in_packages','business_id'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $date = date('Y-m-d', strtotime($request->input('date')));
        $order = new Orders();
        $order->client_id = Auth::user()->id;
        $order->business_id = $request->input('b_id');
        $order->date = $date;
        $order->time_range = $request->input('time_range');
        $order->total = $request->input('total_price');
        $order->status = 1;
        $order->sos_order = 0;
        $order->save();
//        order_detail
        if ($request->input('package_id')!=''){
//            $order_detail = new OrderDetail();
            $order_id = $order->id;
            $package_id = $request->input('package_id');
            $product_ids = PackageDetail::where('packages_id', $package_id)->get();
//            $qty = $request->input('qty');
            foreach ($product_ids as $product_id){
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order_id;
                $order_detail->product_id = $product_id->products_id;
                $order_detail->qty = $product_id->qty;
                $order_detail->package_id = $package_id;
                $order_detail->save();
            }
            echo 'package successful!';
        }
        if ($request->input('product_id')){
            $order_detail = new OrderDetail();
            $order_id = $order->id;
            $product_id = $request->input('product_id');
            $qty = $request->input('qty');

            $order_detail->order_id = $order_id;
            $order_detail->product_id = $product_id;
            $order_detail->qty = $qty;
            $order_detail->save();
            echo 'product successful!';
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
