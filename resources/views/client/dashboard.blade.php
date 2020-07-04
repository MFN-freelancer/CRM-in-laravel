@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <tbody>
                                    @foreach($businesses as $business)
                                    <tr>
                                        <td>{{$business->address}}
                                        </td>
                                        <td><button type="button" class="btn btn-danger btn-ft">Auto</button></td>
                                        <td><a href="{{route('product-order', $business->id)}}" class="btn btn-info
                                        btn-ft">Store</a></span>
                                        </td>
                                        <td style="font-size: 18px;">
                                            @foreach($orders as $order)
                                                @if($business->id == $order->business_id)
                                                    <i class="fa fa-check-circle" style="color: green;"></i>
                                                    <span style="padding-right: 10px;">{{date('j F', strtotime
                                                    ($order->date))
                                                    }}</span>
                                                @endif
                                            @endforeach
                                        </td>
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