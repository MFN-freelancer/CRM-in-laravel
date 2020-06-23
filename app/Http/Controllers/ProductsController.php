<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        return view('admin.add-product');
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
    public function store(Request $request)
    {
        $product_image='';
        if ($request->hasFile('product_img')){
            $product_image = $request->file('product_img')->getClientOriginalName();
            $request->file('product_img')->move(public_path('products'), $product_image);
        }
        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_img = $product_image;
        $product->product_qty = $request->input('product_number');
        $product->product_detail = $request->input('product_detail');
        $product->save();
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::whereId($id)->get();
        return view('admin.update-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_image='';
        if ($request->hasFile('product_img')){
            $product_image = $request->file('product_img')->getClientOriginalName();
            $request->file('product_img')->move(public_path('products'), $product_image);
        }
        $formData = array(
            'product_name'=>$request->input('product_name'),
            'product_price'=>$request->input('product_price'),
            'product_img' => $product_image,
            'product_qty' => $request->input('product_number'),
            'product_detail' => $request->input('product_detail'),
        );
        Products::where('id','=',$id)->update($formData);
        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::whereId($id)->delete();
        return redirect()->route('product');
    }
}
