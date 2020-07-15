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
                                        <td><button type="button" class="btn btn-danger btn-ft" data-toggle="modal"
                                                    data-target="#basicModal" >Auto</button></td>
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
                                    <!-- Modal -->
                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="">
                                                    @csrf
                                                    <div class="row justify-content-center mt-lg-5">
                                                        <input id="txtfuturedate" type="text" style="width: 97px;" placeholder="Choose date" />
                                                    </div>
                                                    <div class="row justify-content-center mt-lg-5">
                                                        <select name="order_time">
                                                            <option value="">09:00</option>
                                                            <option value="">11:00</option>
                                                            <option value="">14:00</option>
                                                        </select>
                                                    </div>
                                                    <div class="row justify-content-center mt-lg-5">
                                                        <label>Packages</label><hr>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" class="btn btn-light
                                                            btn-ft" id="auto">Order</button>
                                                        <button type="button" class="btn btn-light btn-ft" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        jQuery(document).ready(function($) {
            $('#txtfuturedate').datepicker({
                minDate: 0,
            });
            $('#auto').prop('disabled', true);
        });
    </script>
@endsection