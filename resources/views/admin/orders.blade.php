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
                                    <tr>
                                        <td>09:00</td>
                                        <td>2020-06-17</td>
                                        <td>Edinburgh</td>
                                        <td>address</td>
                                        <td> Single sheet * 1,  You were expecting a pillow * 1,</td>
                                        <td> Singel set*1</td>
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