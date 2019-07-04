@extends('layouts.main')
@section('content')
@php 
    $i = 1;
@endphp
    <div class="page-content">
        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('international-techno.create') }}" class="btn blue">Добавить новый контракт <i class="fa fa-plus"></i></a>
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
                    @forelse($interTech as $contract)
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
                            <td class="contract-update" data-toggle="modal" data-target="#statusModal" style="cursor: pointer" data-url="{{ route('status.contract', ['contract' => $contract]) }}">
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
                                    <button type="button" class="btn blue contract-delete" data-toggle="modal" data-target="#myModal" data-url="{{ route('contracts.destroy', ['contract' => $contract]) }}">
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
            {{ $interTech->links('vendor.pagination.bootstrap-4') }}

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
                            <form action="" class="contract-remove-form" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="statusModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-danger"><b>Update confirm</b></h4>
                        </div>
                        <form action="" class="contract-update-form" method="post">
                            @csrf
                            <div class="modal-body text-danger">
                                <label style="margin-right: 20px">
                                    <input type="radio" name="status" value="1" checked> На исполнено
                                </label>
                                <label style="margin-left: 20px">
                                    <input type="radio" name="status" value="2"> Исполнено
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" >Update</button>
                            </div>
                        </form>
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
                    $('.contract-delete').on('click', function () {
                        var url = $(this).data('url');
                        $('.contract-remove-form').attr('action', url);
                    });
                    $('.contract-update').on('click', function () {
                        var url = $(this).data('url');
                        $('.contract-update-form').attr('action', url);
                    });
                });
            </script>
    </div>
@endsection
