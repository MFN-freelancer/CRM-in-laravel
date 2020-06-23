@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Delivery Man</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('addDelivery')}}"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>Delivery Man</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">View places</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Detail Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($deliverys as $delivery)
                                        @php($no++)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$delivery->name}}</td>
                                        <td>{{$delivery->email}}</td>
                                        <td>{{$delivery->status}}</td>
                                        <td> <a href="{{route('delivery-update', $delivery->id)}}" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
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
