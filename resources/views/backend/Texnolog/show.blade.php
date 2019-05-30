@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('texnologs.index') }}">Технолог</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Показ</a>
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
    <div class="text-right">
        <div class="tools hidden-xs">
            <div class="form-actions">
                <a href="{{ route('texnologs.edit', ['texnolog' => $texnolog]) }}" class="btn blue">Обновить тариф <i class="fa fa-edit"></i> </a>
                <a href="{{ route('texnologs.index') }}" class="btn blue">Вернуться к списку <i class="fa fa-list"></i> </a>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <img src="{{ asset('img/from_to.png') }}" alt="" style="width: 100%; max-width: 35em">
    </div>
    <div class="container" style="margin-top: 5em">
        <div class="row">
            <div class="col-md-6">
                <h4>От <br> <small><b>From</b></small></h4>
                <ul class="list-group">
                    <li class="list-group-item"><b>Город: </b> {{ $texnolog->from_city->regions }}</li>
                    <li class="list-group-item"><b>Район: </b> {{ $texnolog->from_district->districts }}</li>
                    <li class="list-group-item"><b>Стоимость услуги: </b> {{ $texnolog->service_price .' сўм  /'. $texnolog->weight }} кг</li>
                    <li class="list-group-item"><b>Курьерская цена: </b> {{ $texnolog->with_courier_from_home_price }} сўм</li>
                </ul>
            </div>
            <div class="col-md-6">
            <h4>В <br> <small><b>To</b></small></h4>
                <ul class="list-group">
                    <li class="list-group-item"><b>Город: </b> {{ $texnolog->to_city->regions }}</li>
                    <li class="list-group-item"><b>Район: </b> {{ $texnolog->to_district->districts }}</li>
                    <li class="list-group-item"><b>Срок поставки: </b> {{ $texnolog->delivery_time }} кун</li>
                    <li class="list-group-item"><b>Цена доставки: </b> {{ $texnolog->with_courier_from_home_price }} сўм</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
    })
</script>
@endsection