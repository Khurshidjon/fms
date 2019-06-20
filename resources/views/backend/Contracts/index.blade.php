@extends('layouts.main')
@section('content')
@php 
    $i = 1;
@endphp
    <div class="page-content">
        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('contracts.create') }}" class="btn blue">Добавить новый контракт <i class="fa fa-plus"></i></a>
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
                        <th>Название компании</th>
                        <th>Адрес компании</th>
                        <th>Директор компании</th>
                        <th>Банк</th>
                        <th>rs</th>
                        <th>mfo</th>
                        <th>ИНН</th>
                        <th>Номер телефона</th>
                        <th>oked</th>
                        <th>email</th>
                        <th>Статус</th>
                        <th>Операторы</th>
                        <th>Другие действия</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse($contracts as $contract)
                        @if(Auth::user()->can('view', $contract) || Auth::user()->hasRole('Admin'))
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $contract->company_name }}</td>
                            <td>{{ $contract->address }}</td>
                            <td>{{ $contract->director }}</td>
                            <td>{{ $contract->bank }}</td>
                            <td>{{ $contract->rs }}</td>
                            <td>{{ $contract->mfo }}</td>
                            <td>{{ $contract->inn }}</td>
                            <td>{{ $contract->phone }}</td>
                            <td>{{ $contract->oked }}</td>
                            <td>{{ $contract->email }}</td>
                            <td>
                                @if($contract->status == 1)
                                    <span class="badge badge-warning">На исполнено</span>
                                @elseif($contract->status == 2)
                                    <span class="badge badge-success">Исполнено</span>    
                                @elseif($contract->status == 3)
                                    <span class="badge badge-danger">Просрочка</span> 
                                @endif
                            </td>
                            <td>
                                {{ $contract->operator->username }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('contracts.show', ['contract' => $contract]) }}" class="btn blue">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <a href="{{ route('contracts.edit', ['contract' => $contract]) }}" class="btn blue">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn blue" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr class="text-center">
                            <td colspan="14">No records in here :(</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div id="kottaxoleng">
            <!-- <example-component></example-component> -->
            </div>
            {{ $contracts->links('vendor.pagination.bootstrap-4') }}

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
    </div>
@endsection
