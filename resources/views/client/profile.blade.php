@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Profile</h4>
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
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Avatar</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control"  required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend2"> <i class="fa fa-user" aria-hidden="true"></i> </span>
                                            </div>
                                            <input type="text" class="form-control" id="validationDefaultUsername10" placeholder="Username" aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">@</span>
                                            </div>
                                            <input type="email" class="form-control" placeholder="User Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Address" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Phone</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Phone number" required="">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-form">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection