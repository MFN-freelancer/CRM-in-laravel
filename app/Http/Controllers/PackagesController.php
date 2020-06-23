<?php

namespace App\Http\Controllers;

use App\Packages;
use App\Products;
use App\PackageDetail;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin.add-package', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package_name = $request->input('package_name');
        $length = count(collect($request)->get('product_qty'));
        $total_price = $request->input('total_price');
        $desc = $request->input('description');
        $package = new Packages();
        $package->name = $package_name;
        $package->price = $total_price;
        $package->description = $desc;
        $package->save();
        $package_id = $package->id;

        for($i=0;$i<$length;$i++){
            $package_detail = new PackageDetail();
            $package_detail->packages_id = $package_id;
            $package_detail->products_id = $request->product_id[$i];
            $package_detail->qty =  $request->product_qty[$i];
            $package_detail->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit(Packages $packages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Packages $packages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $packages)
    {
        //
    }
}
