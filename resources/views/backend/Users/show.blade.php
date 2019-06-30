@extends('layouts.main')
@section('content')
    @php
        $i = 1;
    @endphp
    <style>
        .is-invalid{
            border: 1px solid red;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('users.index') }}" class="btn blue">Вернуться к списку ролей  <i class="fa fa-list"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-control"><b>Роль: </b>{{ $user->username }}</div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Имеет разрешения</p>
                            <ul class="list-group">
                                @forelse($user->permissions as $permission)
                                    <li class="list-group-item" style="min-height: 3.7em">
                                        <form action="{{ route('revoke-permission-to-user', ['user' => $user, 'permission' => $permission]) }}" method="post">
                                            @csrf
                                            <i class="float-left" style="vertical-align: middle;">
                                                {{ $permission->name }}
                                            </i>
                                            <button class="btn btn-danger btn-sm" style="vertical-align: middle; float: right">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">no permission</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p>Нет разрешений</p>
                            <ul class="list-group">
                                @forelse($permissions->diff($user->permissions) as $permission)
                                    <li class="list-group-item" style="min-height: 3.7em">
                                        <form action="{{ route('attach-permission-to-user', ['user' => $user, 'permission' => $permission]) }}" method="post">
                                            @csrf
                                            <i class="float-left" style="vertical-align: middle; padding-top: 13px">
                                                {{ $permission->name }}
                                            </i>
                                            <button class="btn btn-success btn-sm" style="vertical-align: middle; float: right">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">no permission</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Имеет разрешения</p>
                            <ul class="list-group">
                                @forelse($user->roles as $role)
                                    <li class="list-group-item" style="min-height: 3.7em">
                                        <form action="{{ route('revoke-role-to-user', ['user' => $user, 'role' => $role]) }}" method="post">
                                            @csrf
                                            <i class="float-left" style="vertical-align: middle;">
                                                {{ $role->name }}
                                            </i>
                                            <button class="btn btn-danger btn-sm" style="vertical-align: middle; float: right">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">no permission</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p>Нет разрешений</p>
                            <ul class="list-group">
                                @forelse($roles->diff($user->roles) as $role)
                                    <li class="list-group-item" style="min-height: 3.7em">
                                        <form action="{{ route('attach-role-to-user', ['user' => $user, 'role' => $role]) }}" method="post">
                                            @csrf
                                            <i class="float-left" style="vertical-align: middle; padding-top: 13px">
                                                {{ $role->name }}
                                            </i>
                                            <button class="btn btn-success btn-sm" style="vertical-align: middle; float: right">
                                                <i class="fa fa-plus-circle"></i>
                                            </button>
                                        </form>
                                    </li>
                                @empty
                                    <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">no permission</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
            });
        </script>
@endsection
