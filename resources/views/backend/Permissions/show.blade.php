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
                    <a href="{{ route('permissions.index') }}" class="btn blue">Вернуться к списку разрешений  <i class="fa fa-list"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-control"><b>Разрешение: </b>{{ $permission->name }}</div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p>Имеет разрешения</p>
                    <ul class="list-group">
                        @forelse($permission->roles as $role)
                            <li class="list-group-item" style="min-height: 3.7em">
                                <form action="{{ route('revoke-role-to-permission', ['role' => $role, 'permission' => $permission]) }}" method="post">
                                    @csrf
                                    <i style="vertical-align: middle;">
                                        {{ $role->name }}
                                    </i>
                                    <button type="submit" class="btn btn-danger btn-sm" style="vertical-align: middle; float: right">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-danger" style="min-height: 3.7em">no roles</li>
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-6">
                    <p>Нет разрешений</p>
                    <ul class="list-group">
                        @forelse($roles->diff($permission->roles) as $role)
                            <li class="list-group-item" style="min-height: 3.7em">
                                <form action="{{ route('attach-role-to-permission', ['role' => $role, 'permission' => $permission]) }}" method="post">
                                    @csrf
                                    <i style="vertical-align: middle; float: left">
                                        {{ $role->name }}
                                    </i>
                                    <button type="submit" class="btn btn-success btn-sm" style="vertical-align: middle; float: right">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-danger" style="min-height: 3.7em">no roles</li>
                        @endforelse
                    </ul>
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
