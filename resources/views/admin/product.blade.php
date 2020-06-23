@extends('layouts.backend')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Products</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{route('add-product')}}"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>Add Product</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>Product image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Detail Action</th>
                                        <th>Supplier Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td><img src="{{asset('products/'.$product->product_img)}}"style="width: 100px;"></td>
                                        <td>{{$product->product_name}}</td>
                                        <td>${{$product->product_price}}</td>
                                        <td>{{$product->product_qty}}</td>
                                        <td> <a href="{{route('update-product', $product->id)}}" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
                                        <td> {{$product->product_detail}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection