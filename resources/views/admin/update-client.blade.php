@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><-Client</h4>
                    </a>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('deleteClient', $client[0]->id)}}">DELETE</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('updateClient', $client[0]->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Avatar</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="profile">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Username*</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2"> <i
                                                                class="fa fa-user" aria-hidden="true"></i> </span>
                                                </div>
                                                <input type="text" class="form-control" name="name" placeholder="Username"
                                                      value="{{$client[0]->name}}" required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">@</span>
                                                </div>
                                                <input type="email" class="form-control" name="email" placeholder="User Email"
                                                       value="{{$client[0]->email}}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{--<div class="form-group col-md-6">--}}
                                            {{--<label for="validationDefaultUsername10" class="text-label">Password</label>--}}
                                            {{--<div class="input-group">--}}
                                                {{--<input type="password" class="form-control" name="password" placeholder="Password" required="">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="address" value="{{$client[0]->address}}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Phone*</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="phone" value="{{$client[0]->phone}}"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Status*</label>
                                            <div class="input-group">
                                                <select class="form-control" name="status">
                                                    <option class="text-muted" disabled="" selected="" style="display: none">{{$client[0]->status}}</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Note</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="note" rows="5">{{$client[0]->note}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-form">update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection