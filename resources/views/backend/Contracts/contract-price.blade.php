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
        </div>
        <div class="portlet-body form">
            <ul class="nav nav-pills nav-justified steps">
                <li style="pointer-events: none; background: rgba(0,0,0,0.1);">
                    <a href="#tab1" data-toggle="tab" class="step">
                        <span class="number">
                        1 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Информация о контракте </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i>Цена контракта </span>
                    </a>
                </li>
                <li style="pointer-events: none; background: rgba(0,0,0,0.1);">
                    <a href="#tab3" data-toggle="tab" class="step active">
                        <span class="number">
                        3 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Контракт </span>
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
                                        <input type="hidden" value="{{ $contractSession!=null?$contractSession['contract_id']:'' }}" name="contract_id[]">
                                    </td>
                                    <td>
                                        {{ $price->from_city->name_ru }}
                                        <input type="hidden" value="{{ $price->from_city->id }}" name="from_city_id[]">
                                    </td>
                                    <td>
                                        {{ $price->from_district->name_ru }}
                                        <input type="hidden" value="{{ $price->from_district->id }}" name="from_district_id[]">
                                    </td>
                                    <td>
                                        {{ $price->to_city->name_ru }}
                                        <input type="hidden" value="{{ $price->to_city->id }}" name="to_city_id[]">
                                    </td>
                                    <td>
                                        {{ $price->to_district->name_ru }}
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
