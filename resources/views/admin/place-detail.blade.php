@extends("layouts.backend")
@section("content")
<?php use App\Area;?>
    <style>
        .dataTables_filter{
            display: flex;
            justify-content: center;
            float: none !important;
            margin-top: 0px !important;
            height: 100px !important;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                    <h4><- Places</h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Places</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Parking Info</th>
                                        <th>Area</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$place_details->isEmpty())
                                    @foreach($place_details as $place_detail)
                                        <tr>
                                            <td>{{$place_detail->address}}</td>
                                            <td>{{$place_detail->city}}</td>
                                            <td>{{$place_detail->note}}</td>
                                            <?php
                                                $area = Area::whereId($place_detail->area_id)->get();
                                            ?>
                                            <td>@if(!$area->isEmpty()){{$area[0]->area_name}}@endif</td>
                                            <td> <a href="" class="btn btn-ft  btn-rounded btn-outline-info"
                                                    data-toggle="modal"
                                                    data-target="#basicModal{{$place_detail->id}}">add area</a></td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{$place_detail->id}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('add-area', $place_detail->id)}}" method="post">
                                                        @csrf
                                                        <div class="row justify-content-center" style="font-size: 20px">
                                                            <select name="area">
                                                                <option value="">Selected Area</option>
                                                                @foreach($areas as $area)
                                                                    <option
                                                                            value="{{$area->id}}">{{$area->area_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-light
                                                            btn-ft">Save</button>
                                                            <button type="button" class="btn btn-light btn-ft" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="row justify-content-center" style="font-size: 20px">
                        <select id="area-select" name="area">
                            <option value="">Selected Area</option>
                            @foreach($areas as $area)
                                <option value="{{$area->area_name}}">{{$area->area_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-light btn-ft">Save</button>
                        <button type="button" class="btn btn-light btn-ft" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function () {
            $('#example2').dataTable({
                "bProcessing": true,
                "sAutoWidth": false,
                "bDestroy":true,
                "sPaginationType": "bootstrap", // full_numbers
                "iDisplayStart ": 10,
                "iDisplayLength": 10,
                "bPaginate": false, //hide pagination
                "bFilter": true, //hide Search bar
                "bInfo": false, // hide showing entries
            })
        });

    </script>
@endsection
