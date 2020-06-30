@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- Order</h4>
                    </a>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li style="padding: 15px;">
                            <input id="txtfuturedate" type="text" style="width: 97px;" placeholder="Choose date" />
                        </li>
                        <li style="padding: 15px;">
                            <select  tabindex="-98">
                                <option>9:00</option>
                                <option>11:00</option>
                                <option>14:00</option>
                            </select>
                        </li>
                        <li style="padding: 15px;"><input class="form-check-input styled-checkbox" type="checkbox"
                                                          id="sos_check">
                            <label class="form-check-label mr-sm-5" for="sos_check">SOS</label>
                        </li>
                        <li class="breadcrumb-item active" style="padding: 15px;">
                            <a href="">Order</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="row">
                                @php($no=0)
                                @foreach($packages as $package)
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">{{$package->name}}</h3>
                                                <div class="form-group row align-items-center">
                                                    <label class="col-sm-12 col-form-label text-label">
                                                    @for($i=0; $i<count($products_in_packages[$no]);$i++ )
                                                        {{$products_in_packages[$no][$i]->product_name}},
                                                    @endfor
                                                    </label>
                                                </div>
                                                <div class="form-check row">
                                                    <div class="d-flex justify-content-around">
                                                        <div style="padding: 15px;">
                                                            <label>${{$package->price}}</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control"
                                                                   value="0" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php($no++)
                                @endforeach
                            </div>
                            <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->product_name}}</h5>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-6 col-form-label
                                            text-label">{{$product->product_detail}}</label>
                                        </div>
                                        <div class="form-check row">
                                            <div class="d-flex">
                                                <div >
                                                    <input type="number" class="form-control qty{{$product->id}}" value="0" >
                                                </div>
                                                <div style="padding:14px;">
                                                    <input class="form-check-input styled-checkbox" type="checkbox" id="p_check{{$product->id}}">
                                                    <label class="form-check-label mr-sm-5" for="p_check{{$product->id}}">Add</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $("#txtfuturedate").datepicker({
                minDate: 0
            });
        });
    </script>
@endsection