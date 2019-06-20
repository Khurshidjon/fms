@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('admin.index') }}">Главная</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('texnologs.index') }}">Технолог</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Добавить</a>
            </li>
        </ul>
    </div>

    <div class="container">
        <form action="{{ route('texnologs.update', ['texnolog' => $texnolog]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Из города <span class="text-danger">*</span></label>
                        <div class="@error('from_city_id') is-invalid @enderror">
                            <select name="from_city_id" class="form-control select2" id="from_city" data-city="{{ route('admin.change-city') }}">
                                <option value="">--select once</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id==$texnolog->from_city_id?'selected':'' }}>{{ $city->regions }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('from_city_id')
                            <span class="text-danger help-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Из района<span class="text-danger">*</span></label>
                        <div class="@error('from_district_id') is-invalid @enderror">
                            <select name="from_district_id" id="from_district" class="form-control select2">
                                <option selected value="{{ $texnolog->from_district_id }}">{{ $texnolog->from_district->districts }}</option>
                            </select>
                        </div>
                        @error('from_district_id')
                            <span class="text-danger help-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="delivery_time">Срок поставки <small>1 день, 2 дня</small><span class="text-danger">*</span></label>
                        <input id="delivery_time" type="number" class="form-control" value="{{ old('delivery_time', $texnolog->delivery_time) }}" name="delivery_time" placeholder="1 день, 2 дня">
                    </div>
                    <div class="form-group">
                        <label for="with_courier_from_home_price">Из дома с курьером <small>сўм</small><span class="text-danger">*</span></label>
                        <input id="with_courier_from_home_price" type="text" class="form-control" name="with_courier_from_home_price" value="{{ old('with_courier_from_home_price', $texnolog->with_courier_from_home_price) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">В город <span class="text-danger">*</span></label>
                        <div class="@error('to_city_id') is-invalid @enderror">
                            <select name="to_city_id" class="form-control select2" id="to_city" data-city="{{ route('admin.change-city') }}">
                                <option value="">--select once</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id==$texnolog->to_city_id?'selected':'' }}>{{ $city->regions }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('to_city_id')
                            <span class="text-danger help-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">В район <span class="text-danger">*</span></label>
                        <div class="@error('to_district_id') is-invalid @enderror">
                            <select name="to_district_id" id="to_district" class="form-control select2">
                                <option selected value="{{ $texnolog->to_district_id }}">{{ $texnolog->to_district->districts }}</option>
                            </select>
                        </div>
                        @error('to_district_id')
                            <span class="text-danger help-block" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="service_price">Стоимость услуги <small>сўм</small><span class="text-danger">*</span></label>
                        <input id="service_price" type="text" class="form-control" name="service_price" value="{{ old('service_price', $texnolog->service_price) }}">
                    </div>
                    <div class="form-group">
                        <label for="with_courier_to_home_price">К дому с курьером <small>сўм</small> <span class="text-danger">*</span></label>
                        <input id="with_courier_to_home_price" type="text" class="form-control" name="with_courier_to_home_price" value="{{ old('with_courier_to_home_price', $texnolog->with_courier_to_home_price) }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Обнавить</button>
        </form>
    </div>

</div>
<script>
    $(function(){
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        $('.select2').select2();
    })
</script>
@endsection
