@extends("layouts.backend")
@section("content")

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- Order Detail</h4>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="address">
                                <div><label>CITY:</label>{{$business_address->city}}</div>
                                <div><label>FLOOR:</label>{{$business_address->floor}}</div>
                            </div>
                            <div class="row package">
                                @php($no=0)
                                @foreach($products as $product)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">{{$product->product_name}}</h3>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-12 col-form-label text-label">

                                                    </label>
                                                </div>
                                                <div class="form-check row">
                                                    <div class="d-flex justify-content-around">
                                                        <div style="padding: 15px;">
                                                            <label>Quantity</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control"
                                                                   value="{{$product_id[0]->qty}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php($no++)
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection