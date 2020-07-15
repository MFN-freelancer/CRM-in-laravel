@extends('layouts.backend')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Orders</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href=""></a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Customer</th>
                                        <th>Title</th>
                                        <th>Kind</th>
                                        <th>Floor</th>
                                        <th>Code</th>
                                        <th>Area</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @for($i=0;$i<count($final_orders);$i++)
                                    <tr>
                                        <td>{{$final_orders[$i][0]['time']}}</td>
                                        <td>{{$final_orders[$i][0]['customer']}}</td>
                                        <td>{{$final_orders[$i][0]['address']}}</td>
                                        <td>{{$final_orders[$i][0]['kind']}}</td>
                                        <td>{{$final_orders[$i][0]['floor']}}</td>
                                        <td> {{$final_orders[$i][0]['code']}}</td>
                                        <td> {{$final_orders[$i][0]['area']}}</td>
                                        <td><a href="{{route('order-detail', $final_orders[$i][0]['order_id'])}}" class="btn
                                        btn-info
                                        btn-ft">View</a>
                                        </td>
                                    </tr>
                                    @endfor
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