@extends("layouts.backend")
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Orders</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="ml-2">
                            <label>Client name</label>
                            <select id="client-select">
                                <option value="all">All</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="ml-5">
                            <input id="txtfuturedate" name="order_date" type="text" style="width: 97px;"
                                   placeholder="Order date"/>
                        </li>
                        <li class="ml-5">
                            <form action="{{route('pdf-export')}}" method="post" id="order">
                                @csrf
                                <input type="hidden" name="order_date" id="filter-date">
                                <input type="hidden" name="client_id" id="filter-client">
                            </form>
                            <a href="javascript:void(0)" class="pdf btn
                            btn-success btn-ft">Export To PDF</a>
                            {{--<a href="#" class=" btn--}}
                            {{--btn-success btn-ft" style="display: none;">Export To  PDF</a>--}}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="warning-msg"></div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" id="r-order">
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
                                    @for($i=0; $i<count($final_orders);$i++)
                                        <tr>
                                            <td>{{$final_orders[$i][0]['time']}}</td>
                                            <td>{{$final_orders[$i][0]['date']}}</td>
                                            <td>{{$final_orders[$i][0]['client']}}</td>
                                            <td>{{$final_orders[$i][0]['address']}}</td>
                                            <td>
                                                @for($j=0;$j<count($final_orders[$i][0]['product'][0]);$j++)
                                                    {{$final_orders[$i][0]['product'][0][$j][0]['product_name']}},
                                                @endfor
                                            </td>
                                            <td>{{$final_orders[$i][0]['package']}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('#txtfuturedate').datepicker({});
            $('.pdf').click(function (e) {
                e.preventDefault();
                if ($('#txtfuturedate').val() == '') {
                    var myvar = '<div class="alert alert-danger">Please select a date!</div>';
                    $('.warning-msg').html(myvar);
                    alertTimeout(3000);
                } else {
                    var order_date = $('#txtfuturedate').val();
                    var client_id = $('#client-select').val();
                    $('#filter-date').val(order_date);
                    $('#filter-client').val(client_id);
                    $('#order').submit();
                    // $('.test').attr('href', 'pdf-export/'+order_date);
                    // $('.test')[0].click();

                }
            });
            // searching according to date
            $("#txtfuturedate").change(function () {
                console.log($('#txtfuturedate').val());
                var filter_date = $('#txtfuturedate').val();
                var client_id = $('#client-select').val();
                $.post("{{route('order-filter')}}", {
                    _token: '{{csrf_token()}}',
                    filter_date: filter_date, client_id: client_id
                }).done(
                    function (data) {
                        // console.log(data);
                        var filter_orders = JSON.stringify(data);
                        console.log(data.length);
                        var t_body=''
                        for (var i = 0; i < data.length; i++) {
                            console.log(data[i][0].time);
                            var products='';
                            for (var j = 0; j < data[i][0].product[0].length; j++) {
                                console.log(data[i][0].product[0][j][0].product_name);
                                products = products+','+data[i][0].product[0][j][0].product_name;
                            }
                            var temp = '<tr>'+
                                '  <td>'+data[i][0].time+'</td>'+
                                '  <td>'+data[i][0].date+'</td>'+
                                '  <td>'+data[i][0].client+'</td>'+
                                '  <td>'+data[i][0].address+'</td>'+
                                '  <td>'+products+
                                '  </td>'+
                                '  <td>'+data[i][0].package+'</td>'+
                                '  </tr>';

                            t_body = t_body+temp;
                        }

                        var myvar = '<table class="table header-border" style="min-width: 500px;">' +
                            '            <thead>' +
                            '                <tr>' +
                            '                  <th>Time</th>' +
                            '                  <th>Date</th>' +
                            '                  <th>Client Name</th>' +
                            '                  <th>Title</th>' +
                            '                  <th>Products</th>' +
                            '                  <th>packages</th>' +
                            '                </tr>' +
                            '             </thead>' +
                            '             <tbody>' + t_body+

                            '              </tbody>' +
                            '         </table>';
                        $('#r-order').html(myvar);
                        {{--document.location.href = '{{route('package')}}'--}}
                    }
                );
            });
        });

        function alertTimeout(wait) {
            setTimeout(function () {
                $('.warning-msg .alert').remove();
            }, wait);
        }


    </script>
@endsection