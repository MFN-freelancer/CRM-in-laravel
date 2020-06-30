@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Packages</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('add-package')}}"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>New Package</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Packages</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Products</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no=0)
                                    @foreach($packages as $package)

                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->price}}</td>
                                            <td>
                                            @for($i=0; $i<count($product_list[$no]);$i++)
                                            {{$product_list[$no][$i]->product_name.","}}<br>
                                            @endfor
                                            </td>
                                            @php($no++)
                                            <td> <a href="{{route('update-package', $package->id)}}" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
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