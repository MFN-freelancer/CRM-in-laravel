@extends("layouts.backend")
@section("content")
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Areas</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"
                               data-whatever="@fat"><span class="btn-icon-left text-info">
                                    <i class="fa fa-plus color-info"></i> </span> Add Areas</a>
                            {{--<a href="{{route('add-areas')}}"><span class="btn-icon-left text-info">--}}
                                    {{--<i class="fa fa-plus color-info"></i> </span> Add Areas</a>--}}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Areas</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border" style="min-width: 500px;">
                                    <thead>
                                    <tr>
                                        <th>Area</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($areas as $area)
                                    <tr>
                                        <td>{{$area->area_name}}</td>
                                        <td><a href="javascript:void(0)" onclick="updateArea({{$area->id}})"
                                               class="btn btn-ft btn-rounded btn-outline-info">
                                            Edit</a>
                                        </td>
                                        <td><a href="{{route('delete-area', $area->id)}}" class="btn btn-ft btn-rounded btn-outline-info">
                                            Delete</a>
                                        </td>
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
    {{--add aread modal--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('add-areas')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Area Name</label>
                            <input type="text" class="form-control" name="area">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ADD</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{--update arear modal--}}
    <div class="area-update"></div>
    <script>
        function updateArea(id) {

            $.post("{{route('get-area')}}",{
                _token:'{{csrf_token()}}',
                area_id: id,
            }).done(
                function (data) {
                    var area =JSON.parse(data);
                    console.log(area);
                    console.log(area[0]['id']);
                    var myvar = '<div class="modal fade" id="exampleModal-update" tabindex="-1" role="dialog"'+
                        '         aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                        '        <div class="modal-dialog" role="document">'+
                        '            <div class="modal-content">'+
                        '                <div class="modal-body">'+
                        '                    <form action="areas/update/'+area[0]['id']+'" method="post">'+
                        '                        @csrf'+
                        '                        <div class="form-group">'+
                        '                            <label for="recipient-name" class="col-form-label">Update Area Name</label>'+
                        '                            <input type="text" value="'+area[0]['area_name']+'" class="form-control" name="area">'+
                        '                        </div>'+
                        '                        <div class="modal-footer">'+
                        '                            <button type="submit" class="btn btn-primary">UPDATE</button>'+
                        '                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>'+
                        '                        </div>'+
                        '                    </form>'+
                        '                </div>'+
                        ''+
                        '            </div>'+
                        '        </div>'+
                        '    </div>';
                    $('.area-update').html(myvar);
                    $('#exampleModal-update').modal('show');
                }
            );
        }
    </script>
@endsection