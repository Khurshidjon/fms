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
                    <a href="{{ route('permissions.index') }}" class="btn blue">Вернуться к списку разрешений <i class="fa fa-list"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('permissions.update', ['permission' => $permission]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Название разрешения</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="example: Operator" autofocus autocomplete="off" value="{{ old('name', $permission->name) }}">
                    @error('name')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit"  class="btn btn-success">Обновить</button>
                </div>
            </form>
        </div>
        <script>
            $(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
            });
        </script>
@endsection
