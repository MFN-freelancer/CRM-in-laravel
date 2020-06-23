@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <a href="javascript:void(0)" onclick="javascript: window.history.back();">
                        <h4><- New package</h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card forms-card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" id="upload_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">package image</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control package_img" name="package_img">
                                        </div>
                                    </div>
                                </form>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Set Name*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control package_name" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$product->product_name}}</h5>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-sm-6 col-form-label text-label">Quantity</label>
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control qty{{$product->id}}" value="0" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input styled-checkbox" data-price="{{$product->product_price}}" data-id="{{$product->id}}" type="checkbox" id="p_check{{$product->id}}">
                                                        <label class="form-check-label mr-sm-5" for="p_check{{$product->id}}">Confirm</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Total Price*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control total_price" name="total_price" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationDefaultUsername10" class="text-label">Set Description</label>
                                        <div class="input-group">
                                            <textarea class="form-control description" name="description" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="package-btn btn btn-primary btn-form" disabled="true">ADD</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var i = 0;
        var p_price = 0;
        var keyword='';
        $(".package_name").keypress(function(){
            $('.package-btn').removeAttr('disabled');
            keyword = $(this).val();

            console.log(keyword);
        });

        $('.package-btn').click(function(event) {
            event.preventDefault();
                var package_name = $('.package_name').val();
                var arr = [];
                var p_id = [];
                var desc = $('.description').val();
                $(':checkbox:checked').each(function () {
                    var no = $(this).attr('data-id');
                    arr.push($('.qty'+no).val());
                    p_id.push(no);
                    p_price = p_price + $(this).attr('data-price')*$('.qty'+no).val();
                });

                $('.total_price').val(p_price);
                if (arr.length!=0 && keyword !=''){
                    console.log('sucess');
                    $.post("{{route('add-package')}}",{
                        _token:'{{csrf_token()}}',
                     package_name:package_name, product_qty:arr, product_id:p_id, total_price:p_price, description: desc,
                    }).done(
                        function (data) {
                            console.log(data);
                            document.location.href = '{{route('package')}}'
                        }
                    );
                }
                console.log(p_price);
            });

    </script>
@endsection