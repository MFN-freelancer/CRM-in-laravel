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
                                <div><label><h3>CITY: {{$business[0]->city}}</h3></label><h4></h4></div>
                                <div><label><h3>FLOOR: {{$business[0]->contact}}</h3></label><h4></h4></div>
                            </div>
                            <div class="row package">
                                @for($i=0; $i<count($total_products);$i++)

                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">{{$total_products[$i][0]['name']}}</h3>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-12 col-form-label text-label">
                                                        Quantity: {{$total_products[$i][0]['qty']}}
                                                    </label>
                                                </div>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-12 col-form-label text-label">
                                                      {{$total_products[$i][0]['desc']}}
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection