@extends("layouts.backend")
@section("content")
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
                    <h4>Clients</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('addClient')}}"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>New Client</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Clients</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Detail Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->status}}</td>
                                            <td> <a href="{{route('updateClient', $client->id)}}" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
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

    {{--<script src="{{asset('assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>--}}
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