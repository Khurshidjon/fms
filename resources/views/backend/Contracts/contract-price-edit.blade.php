@extends('layouts.main')
@section('content')
@php 
    $i =1;
@endphp
<style>
    .is-invalid{
        border-bottom: 1px solid red;
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
                <a href="#">Контракты</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Форма нового контракта</a>
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
    <div class="portlet light">
        <div class="portlet-title">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button style="margin-top: 5px !important;" type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="caption font-green">
                <i class="icon-pin font-green"></i>
                <span class="caption-subject bold uppercase">Форма нового контракта</span>
            </div>
            <div class="actions">
                <div class="btn-group">
                    <a class="btn btn-sm default dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                    Settings <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-pencil"></i> Edit </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-trash-o"></i> Delete </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="fa fa-ban"></i> Ban </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="i"></i> Make admin </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body form">
            <ul class="nav nav-pills nav-justified steps">
                <li style="pointer-events: none; background: rgba(0,0,0,0.1);">
                    <a href="#tab1" data-toggle="tab" class="step">
                        <span class="number">
                        1 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Account Setup </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Profile Setup </span>
                    </a>
                </li>
                <li style="pointer-events: none; background: rgba(0,0,0,0.1);">
                    <a href="#tab3" data-toggle="tab" class="step active">
                        <span class="number">
                        3 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Накладной </span>
                    </a>
                </li>
            </ul>
            <br>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
                        aria-valuenow="66.6" aria-valuemin="0" aria-valuemax="100" style="width:66.6%">
                </div>
            </div>
            <div class="table-responsve">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Из города</th>
                            <th>Из района</th>
                            <th>В город</th>
                            <th>В район</th>
                            <th>Weight</th>
                            <th>Delivery time</th>
                            <th>Service price</th>
                            <th>Courier price</th>
                            <th>Dostavka price</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prices as $price)
                            <form action="{{ route('contract.price-update', ['id' => $price->id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{ $price->from_city->regions }}
                                        </td>
                                        <td>
                                            {{ $price->from_district->districts }}
                                        </td>
                                        <td>
                                            {{ $price->to_city->regions }}
                                        </td>
                                        <td>
                                            {{ $price->to_district->districts }}
                                        </td>
                                        <td>
                                            {{ $price->weight }} кг
                                        </td>
                                        <td>
                                            {{ $price->delivery_time }} дня
                                        </td>
                                        <td><input type="text" value="{{ old('service_price', $price->service_price) }}" name="service_price"> сўм</td>
                                        <td><input type="text" value="{{ old('with_courier_from_home_price', $price->with_courier_from_home_price) }}" name="with_courier_from_home_price"> сўм</td>
                                        <td><input type="text" value="{{ old('with_courier_to_home_price', $price->with_courier_to_home_price) }}" name="with_courier_to_home_price"> сўм</td>
                                        <td>
                                            <button type="submit" class="btn blue btn-sm">Изменить <i class="m-icon-swapright m-icon-white"></i></button>
                                        </td>
                                    </tr>
                            </form>
                        @empty
                            <tr></tr>
                        @endforelse
                    </tbody>
                </table>
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
