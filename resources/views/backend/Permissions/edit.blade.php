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
