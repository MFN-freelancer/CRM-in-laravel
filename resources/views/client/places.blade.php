@extends('layouts.backend')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Places</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href=""><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>Add Address</a>
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
                                        <th>Kind</th>
                                        <th>Title</th>
                                        <th>City</th>
                                        <th>Contact Number</th>
                                        <th>Floor</th>
                                        <th>Code</th>
                                        <th>Detail Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Hotel</td>
                                        <td>Sam & Blondy</td>
                                        <td>tel aviv</td>
                                        <td>2342344</td>
                                        <td>2</td>
                                        <td>#233</td>
                                        <td> <a href="" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
                                    </tr>
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