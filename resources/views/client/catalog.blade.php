@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Catalog</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Supplier Detail</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($products as $product)
                                        @php($no++)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td><img src="{{asset('products/'.$product->product_img)}}"style="width: 100px;">
                                            {{$product->product_name}}
                                        </td>
                                        <td>not yet</td>
                                        <td>{{$product->product_price}}</td>
                                        <td> {{$product->product_detail}}</td>
                                        <td> <a href="" class="btn btn-ft btn-rounded btn-outline-info"
                                                data-toggle="modal" data-target="#exampleModal{{$no}}">Detail</a></td>
                                    </tr>
                                        {{--modal--}}
                                        <div class="modal fade" id="exampleModal{{$no}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <div class="form-group">
                                                            <h3>{{$product->product_name}}</h3>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="{{asset('products/'.$product->product_img)}}"
                                                            style="width: 300px;">
                                                        </div>
                                                        <div class="form-group">
                                                            <div><h4>Price:</h4></div>
                                                            <div>${{$product->product_price}}</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{--modal end--}}
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