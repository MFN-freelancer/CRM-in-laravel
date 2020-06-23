@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- Product Detail</h4>
                    </a>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('delete-product', $product[0]->id)}}">DELETE</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('update-product', $product[0]->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">product image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="product_img">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Product Name*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{$product[0]->product_name}}" name="product_name" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Price*</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{$product[0]->product_price}}" name="product_price" required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Stock</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="{{$product[0]->product_qty}}" name="product_number"  required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Supplier Detail</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="product_detail" rows="5">{{$product[0]->product_detail}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-form">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection