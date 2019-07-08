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
                    <a href="{{ route('categories-techno.index') }}" class="btn blue">Вернуться к списку зоны  <i class="fa fa-list"></i></a>
                </div>
                <div class="col-md-9">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button style="margin-top: 5px !important;" type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="form-control"><b>Роль: </b>{{ $categories_techno->name }}</div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <p>Имеет разрешения</p>
                    <ul class="list-group">
                        @forelse($categories_techno->country_zone as $country_1)
                            <li class="list-group-item" style="min-height: 3.7em">
                                <form action="{{ route('detach_country_from_zone', ['categories_techno' => $categories_techno, 'country' => $country_1]) }}" method="post">
                                    @csrf
                                    <i class="float-left" style="vertical-align: middle;">
                                        {{ $country_1->name }}
                                    </i>
                                    <button class="btn btn-danger btn-sm" style="vertical-align: middle; float: right">
                                        <i class="fa fa-minus-circle"></i>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">нет городов</li>
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-6">
                    <p>Нет разрешений</p>
                    <ul class="list-group">
                        @forelse($countries->diff($categories_techno->country_zone) as $country_2)
                            <li class="list-group-item" style="min-height: 3.7em">
                                <form action="{{ route('attach_country_to_zone', ['categories_techno' => $categories_techno, 'country' => $country_2]) }}" method="post">
                                    @csrf
                                    <i class="float-left" style="vertical-align: middle; padding-top: 13px">
                                        {{ $country_2->name }}
                                    </i>
                                    <button class="btn btn-success btn-sm" style="vertical-align: middle; float: right">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-danger" style="min-height: 3.7em; padding-top: 13px">нет городов</li>
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
