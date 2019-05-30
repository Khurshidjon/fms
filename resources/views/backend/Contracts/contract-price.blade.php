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

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
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
            <form action="{{ route('make.contract') }}" method="post">
                @csrf
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
                            </tr>
                        </thead>
                        <tbody>
                        @php 
                            //dd($contractSession['id'])
                        @endphp
                            @forelse($prices as $price)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                        <input type="hidden" value="{{ $price->id }}" name="id[]">
                                        <input type="hidden" value="{{ $contractSession!=null?$contractSession['id']:'' }}" name="contract_id[]">
                                    </td>
                                    <td>
                                        {{ $price->from_city->regions }}
                                        <input type="hidden" value="{{ $price->from_city->id }}" name="from_city_id[]">
                                    </td>
                                    <td>
                                        {{ $price->from_district->districts }}
                                        <input type="hidden" value="{{ $price->from_district->id }}" name="from_district_id[]">
                                    </td>
                                    <td>
                                        {{ $price->to_city->regions }}
                                        <input type="hidden" value="{{ $price->to_city->id }}" name="to_city_id[]">
                                    </td>
                                    <td>
                                        {{ $price->to_district->districts }}
                                        <input type="hidden" value="{{ $price->to_district->id }}" name="to_district_id[]">
                                    </td>
                                    <td>
                                        {{ $price->weight }} кг
                                        <input type="hidden" value="{{ $price->weight }}" name="weight[]">    
                                    </td>
                                    <td>
                                        {{ $price->delivery_time }} дня
                                        <input type="hidden" value="{{ $price->delivery_time }}" name="delivery_time[]">
                                    </td>
                                    <td><input type="text" value="{{ $price->service_price }}" name="service_price[]"> сўм</td>
                                    <td><input type="text" value="{{ $price->with_courier_from_home_price }}" name="with_courier_from_home_price[]"> сўм</td>
                                    <td><input type="text" value="{{ $price->with_courier_to_home_price }}" name="with_courier_to_home_price[]"> сўм</td>
                                </tr>
                            @empty
                                <tr></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="form-actions noborder text-right">
                    <button type="submit" class="btn blue">Далее <i class="m-icon-swapright m-icon-white"></i></button>
                </div>
            </form>
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
