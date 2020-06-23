@extends("layouts.login_layout")
@section('content')
    <div class="login-bg2 h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">
                <div class="col-xl-4">
                    <div class="login-info">
                        <h2>Build by Brain Solutions</h2>
                    </div>
                </div>
                <div class="col-xl-3 p-0">
                    <div class="form-input-content login-form bg-white">
                        <div>
                            <div class="card-body">
                                <h4 class="text-center mt-4">Log into Your Account</h4>
                                <form action="{{route('login')}}" method="post" class="mt-5 mb-5">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                                               placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection