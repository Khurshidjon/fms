@extends('layouts.main')
@section('content')
@php 
    $i = 1;
@endphp
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Form Stuff</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Material Design Form Controls</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">Action</a>
                        </li>
                        <li>
                            <a href="#">Another action</a>
                        </li>
                        <li>
                            <a href="#">Something else here</a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="#">Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('users.create') }}" class="btn blue">Добавить новый пользователь <i class="fa fa-plus"></i></a>
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
                        <th>Имя пользователя</th>
                        <th>Электронная почта пользователя</th>
                        <th>Пользовательские роли</th>
                        <th>Пользовательские разрешения</th>
                        <th>Другие действия</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @forelse($user->roles as $role)
                                    <span class="badge badge-success"><b>{{ $role->name }}</b></span>
                                @empty
                                    <span class="badge badge-warning"><b>no roles</b></span>
                                @endforelse
                            </td>
                            <td>
                                @forelse($user->getAllPermissions() as $permission)
                                    <span class="badge badge-success"><b>{{ $permission->name }}</b></span>
                                @empty
                                    <span class="badge badge-warning"><b>no roles</b></span>
                                @endforelse
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('users.show', ['user' => $user]) }}" class="btn blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn blue">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn blue" data-toggle="modal" data-target="#myModal">
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
            {{ $users->links('vendor.pagination.bootstrap-4') }}

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
