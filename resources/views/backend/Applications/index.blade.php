@extends('layouts.main')
@section('content')
    <div class="page-content">
    <div class="container-fluid" style="margin-bottom: 35px">
        <div id="app"></div>
        <div class="row">
            <div class="col-md-3">
                @can('application create')
                <a href="{{ route('admin.first-step') }}" class="btn blue">Добавить новая заявка <i class="fa fa-plus"></i></a>  
                @endcan
            </div>
            <div class="col-md-6">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button style="margin-top: 5px !important;" type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button style="margin-top: 5px !important;" type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                @endif
            </div>
            <div class="col-md-3">
                <input class="form-control float-right" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            <div class="row">
                                <div class="col-md-4">
                                    Из города
                                </div>
                                <div class="col-md-8">
                                    <select class="select2 form-control" id="change_city_id_one" data-city="{{ route('admin.index-from-city') }}">
                                        <option value="">-- @lang('pages.select_one') --</option>
                                        @foreach($cities->unique('from_city_id') as $city )
                                            <option value="{{ $city->from_city->id }}">{{ $city->from_city->name_ru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="col-md-4">
                                    В город
                                </div>
                                <div class="col-md-8">
                                    <select class="select2 form-control" id="change_city_id_two" data-city="{{ route('admin.index-to-city') }}">
                                        <option value="">-- @lang('pages.select_one') --</option>
                                        @foreach($cities->unique('to_city_id') as $city )
                                            <option value="{{ $city->to_city->id }}">{{ $city->to_city->name_ru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </th>
                        <script>
                            $(function(){
                                $('#change_city_id_one').on('change', function(){
                                    var city_id = $('#change_city_id_one option:selected').val();
                                    var url = $(this).attr('data-city');
                                    $.ajax({
                                        url:url,
                                        type: 'GET',
                                        data: {
                                            city_id: city_id
                                        },
                                        success: function(data){
                                            $('#myTable').html(data)               
                                        }
                                    });
                                });
                                $('#change_city_id_two').on('change', function(){
                                    var city_id = $('#change_city_id_two option:selected').val();
                                    var url = $(this).attr('data-city');
                                    $.ajax({
                                        url:url,
                                        type: 'GET',
                                        data: {
                                            city_id: city_id
                                        },
                                        success: function(data){
                                            $('#myTable').html(data)               
                                        }
                                    });
                                });
                            })
                        </script>
                        <th>От кого</th>
                        <th>Кому</th>
                        <th>Курьер</th>
                        <th>Доставка</th>
                        <th>Статусы</th>
                        <th>Операторы</th>
                        <th>Другие действия</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @include('backend.Applications.app-render')
                </tbody>
            </table>
            {{ $applications->links('vendor.pagination.bootstrap-4') }}
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-danger"><b>Delete confirm</b></h4>
                        </div>
                        <div class="modal-body text-danger">
                            <b>Some text in the modal.</b>
                        </div>
                        <div class="modal-footer">
                            <form class="application-remove-form" action="" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="statusModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form class="application-status-form" action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-danger"><b>Submit confirm</b></h4>
                            </div>
                            <div class="modal-body text-danger text-center">
                                <label style="margin-right: 20px">
                                    <input type="radio" name="status" value="1" checked> На исполнено
                                </label>
                                <label style="margin-left: 20px">
                                    <input type="radio" name="status" value="2"> Исполнено
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрить</button>
                                <button type="submit" class="btn btn-danger">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            $('.select2').select2();
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.remove-application').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $('.application-remove-form').attr('action', url);
            });
            $('.status-application').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $('.application-status-form').attr('action', url);
            });
        });
    </script>
@endsection
