@extends('layouts.main')
@section('content')
    @php
        $i = 1;
    @endphp
    <style>
        .is-invalid{
             border: 1px solid red !important;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid" style="margin-bottom: 35px">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url()->previous() }}" class="btn blue">Вернуться к списку зон &nbsp;&nbsp;  <i class="fa fa-list"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('categories-techno.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Название странаы</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="example: 1 - зона" autofocus autocomplete="off" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit"  class="btn btn-success">Добавить</button>
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
