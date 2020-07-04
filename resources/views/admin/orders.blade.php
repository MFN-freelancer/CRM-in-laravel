@extends("layouts.backend")
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
                            <a href="">Export To PDF</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Title</th>
                                        <th>Products</th>
                                        <th>packages</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<count($final_orders);$i++)
                                        <tr>
                                            <td>{{$final_orders[$i][0]['time']}}</td>
                                            <td>{{$final_orders[$i][0]['date']}}</td>
                                            <td>{{$final_orders[$i][0]['client']}}</td>
                                            <td>{{$final_orders[$i][0]['address']}}</td>
                                            <td>
                                            @for($j=0;$j<count($final_orders[$i][0]['product'][0]);$j++)
                                                {{$final_orders[$i][0]['product'][0][$j][0]['product_name']}},
                                            @endfor
                                            </td>
                                            <td>{{$final_orders[$i][0]['package']}}</td>
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