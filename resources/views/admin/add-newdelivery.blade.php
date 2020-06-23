@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- New Delivery Man</h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('addDelivery')}}" method="post" enctype="multipart/form-data">
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
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">@</span>
                                                </div>
                                                <input type="email" class="form-control" name="email" placeholder="User Email"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="address" placeholder="Address" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Phone*</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="phone" placeholder="Phone number"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="validationDefaultUsername10" class="text-label">Status*</label>
                                            <div class="input-group">
                                                <select class="form-control" name="status">
                                                    <option class="text-muted" disabled="" selected="" style="display: none">Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Note</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="note" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-form">ADD</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection