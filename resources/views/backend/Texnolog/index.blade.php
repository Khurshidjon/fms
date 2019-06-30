@extends('layouts.main')
@section('content')
@php 
    $i = 1;
@endphp
    <div class="page-content">

        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('texnologs.create') }}" class="btn blue">Добавить новый город <i class="fa fa-plus"></i></a>  
                </div>
                <div class="col-md-6">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
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
                        <th>Из города</th>
                        <th>Из района</th>
                        <th>В город</th>
                        <th>В район</th>
                        <th>Вес</th>
                        <th>Срок поставки</th>
                        <th>Стоимость услуги</th>
                        <th>Курьерская цена</th>
                        <th>Цена доставки</th>
                        <th>Другие действия</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse($texnologs as $texnolog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $texnolog->from_city->name_ru }}</td>
                            <td>{{ $texnolog->from_district->name_ru }}</td>
                            <td>{{ $texnolog->to_city->name_ru }}</td>
                            <td>{{ $texnolog->to_district->name_ru }}</td>
                            <td>{{ $texnolog->weight }} кг</td>
                            <td>{{ $texnolog->delivery_time }} дня</td>
                            <td>{{ $texnolog->service_price }} сўм</td>
                            <td>{{ $texnolog->with_courier_from_home_price }} сўм</td>
                            <td>{{ $texnolog->with_courier_to_home_price }} сўм</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('texnologs.show', ['texnolog' => $texnolog]) }}" class="btn blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('texnologs.edit', ['texnolog' => $texnolog]) }}" class="btn blue">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn blue texnolog-delete" data-toggle="modal" data-target="#myModal" data-url="{{ route('texnologs.destroy', ['texnolog' => $texnolog]) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="13">No records in here :(</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div id="kottaxoleng">
            <!-- <example-component></example-component> -->
            </div>
            {{ $texnologs->links('vendor.pagination.bootstrap-4') }}

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
                            <form action="" class="texnolog-delete-form" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрить</button>
                                <button type="submit" class="btn btn-danger">Удалить</button>
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
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.texnolog-delete').on('click', function () {
                var url = $(this).attr('data-url');
                $('.texnolog-delete-form').attr('action', url);
            });
        });
    </script>
@endsection
