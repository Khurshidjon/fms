@extends('layouts.main')
@section('content')
    @php
        $i = 1;
    @endphp
    <div class="page-content">
        <div class="container-fluid" style="margin-bottom: 35px">
            <div style="margin-bottom:50px">
                <span style="font-size: 22px"><b>Бухгалтерский учет</b></span>
            </div>
            <form action="{{ route('reports.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for=""><b>Выберите город</b></label>
                        <select name="city" id="" class="form-control select2">
                            <option value="">-- @lang('pages.select_one') --</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name_ru }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="form-group">
                                <label for=""><b>Выберите интервал времени</b></label>
                                <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control" name="from" autocomplete="off">
                                    <span class="input-group-addon">
                                            до </span>
                                    <input type="text" class="form-control" name="to" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px">
                        <button class="btn btn-success">Отправить</button>
                    </div>
                </div>
            </form>
            <br>
            <hr>
            <br>
            <form action="{{ route('reports.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for=""><b>Выберите город</b></label>
                        <input type="hidden" name="contact" value="1">
                        <input type="text" class="form-control" placeholder="@lang('pages.contract_number')" name="number_contract">
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="form-group">
                                <label for=""><b>Выберите интервал времени</b></label>
                                <div class="input-group date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control" name="from" autocomplete="off">
                                    <span class="input-group-addon">
                                            до </span>
                                    <input type="text" class="form-control" name="to" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px">
                        <button class="btn btn-success">Отправить</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="container table-responsive">
            <!-- <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название разрешения</th>
                    <th>Роли разрешения</th>
                    <th>Другие действия</th>
                </tr>
                </thead>
                <tbody id="myTable">

                </tbody>
            </table> -->
            <div id="kottaxoleng">
                <!-- <example-component></example-component> -->
            </div>

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
                            <form action="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <div id="app"></div>
        </div>
        <script src="{{ asset('backend/assets/admin/pages/scripts/components-pickers.js') }}"></script>
        <script>
            $(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                $('.select2').select2();
                ComponentsPickers.init();
            });
        </script>
@endsection
