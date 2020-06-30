@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- Address Detail</h4>
                    </a>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{route('delete-place', $place[0]->id)}}">
                                Delete</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{route('update-place', $place[0]->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <input class="form-check-input styled-checkbox" type="checkbox"
                                                   id="apartment-check" name="apartment"
                                                   @if($place[0]->kind == 0)
                                                   checked
                                                   @endif
                                            >
                                            <label class="form-check-label mr-sm-5"
                                                   for="apartment-check">Apartment</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input styled-checkbox" type="checkbox"
                                                   name="hotel" id="hotel-check"
                                                   @if($place[0]->kind == 1)
                                                   checked
                                                   @endif
                                            >
                                            <label class="form-check-label mr-sm-5" for="hotel-check">Hotel</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="validationDefaultUsername10" class="text-label">Address*</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="address"
                                                    value="{{$place[0]->address}}"   placeholder="Address" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="validationDefaultUsername10" class="text-label">City*</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="city"
                                                     value="{{$place[0]->city}}"  placeholder="City" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 apart-field"
                                             @if($place[0]->kind == 1)
                                             style="display: none;"
                                             @endif
                                        >
                                            <label for="validationDefaultUsername10" class="text-label">Floor</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="floor"
                                                       value="{{$place[0]->floor}}" placeholder="Floor">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 apart-field"
                                             @if($place[0]->kind == 1)
                                             style="display: none;"
                                             @endif
                                        >
                                            <label for="validationDefaultUsername10" class="text-label">Number</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="number"
                                                       value="{{$place[0]->house_cnt}}" placeholder="number">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 hotel-field"
                                             @if($place[0]->kind == 0)
                                             style="display: none;"
                                             @endif
                                        >
                                            <label for="validationDefaultUsername10" class="text-label">Contact Number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="contact_number"
                                                       value="{{$place[0]->contact}}" placeholder="contact number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input styled-checkbox" type="checkbox"
                                                       id="code-check"
                                                   @if($place[0]->code != '')
                                                       checked
                                                   @endif
                                                >
                                                <label class="form-check-label mr-sm-5"
                                                       for="code-check">Do you have a code?</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 code"
                                             @if($place[0]->code == '')
                                                 style="display:none;"
                                             @endif
                                        >
                                            <label for="validationDefaultUsername10" class="text-label">Code Lobby</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code"
                                                      value="{{$place[0]->code}}" placeholder="code ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Parking Info</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="note" rows="5">{{$place[0]->note}}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-form">UPDATE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            // $('.hotel-field').css('display','none');
            // $('.code').css('display', 'none');

            //check hotel or apartment
            $('#hotel-check').on('change', function() {
                console.log('change')
                if($('#hotel-check').prop('checked', true)){
                    $('#apartment-check').not(this).prop('checked', false);
                    $('.apart-field').css('display', 'none');
                    $('.hotel-field').css('display', 'block');
                }else {
                    $('#hotel-check').prop('checked', true)
                }

            });
            $('#apartment-check').on('change', function() {
                console.log('change')
                if ($('#apartment-check').prop('checked', true)){
                    $('#hotel-check').not(this).prop('checked', false);
                    $('.hotel-field').css('display', 'none');
                    $('.apart-field').css('display', 'block');
                } else{
                    $('#apartment-check').prop('checked', true);
                }
            });
            //end hotel apartment check
            //    code part
            $('#code-check').on('change', function () {
                if ($('#code-check').prop('checked', true)){
                    $('.code').css('display', 'block');
                }else{
                    $('.code').css('display', 'none');
                }

            });
        });
    </script>
@endsection