@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Order History</h4>
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
                                        <th>Title</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>address </td>
                                        <td>$33</td>
                                        <td><span class="label label-secondary">ordered</span></td>
                                        <td>2020-6-17</td>
                                        <td><a href="" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
                                        <td>
                                            <span>
                                                <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                <a href="javascript:void()" data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Close"><i
                                                            class="fa fa-close color-danger"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>address </td>
                                        <td>$33</td>
                                        <td><span class="label label-success">Delivered</span></td>
                                        <td>2020-6-17</td>
                                        <td><a href="" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
                                        <td>
                                            <span>
                                                <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Edit"><i
                                                            class="fa fa-pencil color-muted"></i> </a>
                                                <a href="javascript:void()" data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Close"><i
                                                            class="fa fa-close color-danger"></i></a>
                                            </span>
                                        </td>
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