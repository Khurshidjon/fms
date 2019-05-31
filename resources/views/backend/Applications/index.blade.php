@extends('layouts.main')
@section('content')
@php 
    $i = 1;
@endphp
    <div class="page-content">
    <div class="container-fluid" style="margin-bottom: 35px">
        <div class="row">
            <div class="col-md-3">
                @can('application create')
                <a href="{{ route('admin.first-step') }}" class="btn blue">Добавить новая заявка <i class="fa fa-plus"></i></a>  
                @endcan
            </div>
            <div class="col-md-6"></div>
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
                        <th>В город</th>
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
                    @forelse($applications as $application)
                        @if(Auth::user()->can('view',  $application) || Auth::user()->hasRole('Admin'))
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $application->from_city->regions }}</td>
                            <td>{{ $application->to_city->regions }}</td>
                            <td>
                                {{ $application->from_fio }}
                                <span class="badge badge-dark"><b>{{ $application->from_phone }}</b></span>
                            </td>
                            <td>
                                {{ $application->to_fio }}
                                <span class="badge badge-dark"><b>{{ $application->to_phone }}</b></span>
                            </td>
                            <td>
                                @if($application->cost_from_courier == null)
                                    <span><i class="fa fa-minus-circle text-danger"></i></span>
                                @else
                                    <span><i class="fa fa-check-circle text-success"></i></span>
                                @endif
                            </td>
                            <td>
                                @if($application->cost_to_courier == null)
                                    <span><i class="fa fa-minus-circle text-danger"></i></span>
                                @else
                                    <span><i class="fa fa-check-circle text-success"></i></span>
                                @endif
                            </td>
                            <td>
                                @if($application->status == 1)
                                    <span class="badge badge-warning"><b>На исполнено</b></span>
                                @elseif($application->status == 2)
                                    <span class="badge badge-success"><b>Исполнено</b></span>
                                @elseif($application->status == 3)
                                    <span class="badge badge-danger"><b>Просрочка</b></span>
                                @endif
                            </td>
                            <td>
                                <b>{{ $application->operator->username }}</b>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('applications.show', ['application' => $application]) }}" class="btn blue">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="{{ route('admin.first-step-edit', ['application' => $application]) }}" class="btn blue">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @role('Admin')
                                        <button type="button" class="btn blue" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endrole
                                </div>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td class="text-center" colspan="9">No records in here :(</td>
                        </tr>
                    @endforelse
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
                            <form action="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                            </form>
                        </div>
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
        });
    </script>
@endsection
