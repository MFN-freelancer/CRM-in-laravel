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
                            <a href="{{route('add-place')}}">
                                <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>
                                Add Address</a>
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
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Contact Number</th>
                                        <th>Floor</th>
                                        <th>Code</th>
                                        <th>Detail Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($businesses as $business)
                                    <tr>
                                        <td>
                                            @if($business->kind == 0)
                                                Apartment
                                            @else
                                                Hotel
                                            @endif
                                        </td>
                                        <td>{{$business->address}}</td>
                                        <td>{{$business->city}}</td>
                                        <td>{{$business->contact}}</td>
                                        <td>{{$business->floor}}</td>
                                        <td>{{$business->code}}</td>
                                        <td> <a href="{{route('update-place', $business->id)}}" class="btn btn-ft btn-rounded btn-outline-info">Detail</a></td>
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