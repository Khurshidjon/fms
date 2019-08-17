@extends('layouts.main')
@section('content')
    <style>
        #from_content, #second_content{
            border: 1px solid #002e5b;
            padding: 2em 1em;
            min-height: 28em;
            max-height: 28em;
        }
        .post-inform-content{
            border: 1px solid #002e5b;
            padding: 2em;
            max-height: 9.7em;
        }
        .post-inform-content:hover, .post-inform-content input:focus{
            border: 1px solid #ff5e00;
        }
        .is-invalid{
            border: 1px solid red;
        }
        .orange{
            background-color: #ff5e00 !important;
            color: #ffffff !important;
        }
    </style>
    <div class="page-content">
        <div id="app"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Заявка - <span class="step-title">
								Шаг 1 из 3 </span>
                        </div>
                        <div class="tools hidden-xs">
                            <div class="form-actions">
                                <a href="{{ route('applications.index') }}" class="btn blue">Вернуться к списку <i class="fa fa-list"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="{{ route('admin.first-step-edit-result', ['application' => $application]) }}" class="form-horizontal" id="submit_form" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="active">
                                            <a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Информация о почте </span>
                                            </a>
                                        </li>
                                        <li style="pointer-events: none">
                                            <a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Сервисные сборы </span>
                                            </a>
                                        </li>
                                        <li style="pointer-events: none">
                                            <a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Накладной </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
                                             aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width:33.3%">
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="alert alert-danger display-none">
                                            <button class="close" data-dismiss="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="alert alert-success display-none">
                                            <button class="close" data-dismiss="alert"></button>
                                            Your form validation is successful!
                                        </div>
                                        <div class="tab-pane active container-fluid" id="tab1">
                                            <h3 class="block">Предоставьте данные вашего сервиса</h3>
                                            <div class="row">
                                                <div class="col-md-6" id="from_content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                              <label for="from_city" class="control-label col-md-4">
                                                                  <small>@lang('pages.from_city')</small>
                                                                  <span class="required">*</span>
                                                              </label>
                                                              <div class="col-md-8">
                                                                <div class="@error('from_city') is-invalid @enderror">
                                                                    <select name="from_city" id="from_city_action" class="form-control select2" data-city="{{ route('admin.change-city-action') }}">
                                                                        <option selected>--@lang('pages.select_one')--</option>
                                                                        @foreach($regions as $region)
                                                                            <option value="{{ $region->id }}" @if($application!=null){{ $application->from_city_id==$region->id?'selected':'' }} @endif>{{ $region->name_ru }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('from_city')
                                                                    <span class="text-danger help-block" role="alert">
                                                                       {{ $message }}
                                                                    </span>
                                                                 @enderror
                                                              </div>
                                                          </div>
                                                      </div>
                                                        <div class="col-md-6">
                                                          <div class="form-group">
                                                              <label for="from_district" class="control-label col-md-4">
                                                                  <small>@lang('pages.from_district')
                                                                      <span class="required">*</span>
                                                                  </small>
                                                              </label>
                                                              <div class="col-md-8">
                                                                <div class="@error('from_district') is-invalid @enderror">
                                                                    <select name="from_district" id="from_district_action" class="form-control select2">
                                                                        <option selected value="{{ $application->from_district_id }}">{{ $application->from_district->name_ru }}</option>
                                                                    </select>
                                                                </div>
                                                                @error('from_district')
                                                                    <span class="text-danger help-block" role="alert">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                              </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">
                                                                    <small>
                                                                        @lang('pages.sender_fio')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control @error('from_fio') is-invalid @enderror " name="from_fio" value="{{ old('from_fio', $application->from_fio) }}" autocomplete="off">
                                                                    @error('from_fio')
                                                                        <span class="text-danger help-block" role="alert">
                                                                        {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">
                                                                    <small>
                                                                        @lang('pages.sender_phone')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                <input id="from_phone" 
                                                                    type="tel" 
                                                                    name="from_phone" 
                                                                    class="form-control @error('from_phone') is-invalid @enderror"
                                                                    value="{{ old('from_phone', $application->from_phone) }}"
                                                                    required>
                                                                    @error('from_phone')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">
                                                                    <small>
                                                                        @lang('pages.sender_org_name')
                                                                        <span class="text-success">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="from_organ_name" class="form-control  @error('from_organ_name') is-invalid @enderror" value="{{ old('from_organ_name', $application->from_organ_name) }}" placeholder="Название организации">
                                                                    @error('from_organ_name')
                                                                    <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">
                                                                    <small>
                                                                    @lang('pages.sender_address')
                                                                        <span class="text-success">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea name="from_address" class="form-control  @error('from_address') is-invalid @enderror" cols="20" rows="3" style="resize: none">{{ old('from_address', $application->from_address) }}</textarea>
                                                                    @error('from_address')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">
                                                                    <small>
                                                                    @lang('pages.from_date')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input class="date form-control @error('from_date') is-invalid @enderror" type="text" name="from_date" placeholder="mm-dd-yyyy" value="{{ old('from_date', $application->from_date) }}" autocomplete="off">
                                                                    @error('from_date')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="second_content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="to_city" class="control-label col-md-4">
                                                                    <small>@lang('pages.to_city')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <div class="@error('to_city') is-invalid @enderror">
                                                                        <select name="to_city" id="to_city_action" class="form-control select2" data-city="{{ route('admin.change-city-action-to') }}">
                                                                            <option selected>--@lang('pages.select_one')--</option>
                                                                            @foreach($cities->unique('to_city_id') as $city)
                                                                                <option value="{{ $city->to_city->id }}" @if($application!=null){{ $application->to_city_id==$city->to_city->id?'selected':'' }} @endif>{{ $city->to_city->name_ru }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @error('to_city')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="to_district" class="control-label col-md-4">
                                                                    <small>@lang('pages.to_district')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <div class="@error('to_district') is-invalid @enderror">
                                                                        <select name="to_district" id="to_district_action"  class="form-control select2">
                                                                            <option selected value="{{ $application->to_district_id }}">{{ $application->to_district->name_ru }}</option>
                                                                        </select>
                                                                    </div>
                                                                    @error('to_district')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">
                                                                    <small>
                                                                    @lang('pages.receiver_fio')
                                                                        <span class="text-danger">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control @error('to_fio') is-invalid @enderror" name="to_fio" value="{{ old('to_fio', $application->to_fio) }}" autocomplete="off">
                                                                    @error('to_fio')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4">
                                                                    <small>
                                                                    @lang('pages.receiver_phone')
                                                                        <span class="required">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-8">
                                                                <input id="to_phone" 
                                                                    type="tel" 
                                                                    name="to_phone" 
                                                                    class="form-control @error('to_phone') is-invalid @enderror"
                                                                    value="{{ old('to_phone', $application->to_phone) }}"
                                                                    required>
                                                                    @error('to_phone')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">
                                                                    <small>
                                                                    @lang('pages.receiver_org_name')
                                                                        <span class="text-success">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" name="to_organ_name" class="form-control  @error('to_organ_name') is-invalid @enderror" value="{{ old('to_organ_name', $application->to_organ_name)  }}" placeholder="Название организации">
                                                                    @error('to_organ_name')
                                                                    <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2">
                                                                    <small>
                                                                    @lang('pages.receiver_address')
                                                                        <span class="text-success">*</span>
                                                                    </small>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea name="to_address" class="form-control @error('to_address') is-invalid @enderror" cols="20" rows="3" style="resize: none">{{ old('to_address', $application->to_address) }}</textarea>
                                                                    @error('to_address')
                                                                        <span class="text-danger help-block" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="text-align: center">
                                                        <div class="col-md-6">
                                                            <div class="form-body">
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="md-checkbox-inline">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" id="from_courier" name="from_courier" class="md-check" {{ $application->cost_from_courier!=null?'checked':'' }}>
                                                                            <label for="from_courier">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span>
                                                                                @lang('pages.with_courier') </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-body">
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="md-checkbox-inline">
                                                                        <div class="md-checkbox">
                                                                            <input type="checkbox" id="to_courier" name="to_courier" class="md-check"  {{ $application->cost_to_courier!=null?'checked':'' }}>
                                                                            <label for="to_courier">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span>
                                                                                @lang('pages.with_delivery') </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>
                                            </div>
                                            <br>
                                            <h4><b>Post information</b></h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-2 post-inform-content">
                                                    <div class="form-gorup">
                                                        <label for="pieces" class="control-label" style="margin-bottom: 13px">
                                                            @lang('pages.pieces')
                                                                <span class="required">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input id="pieces" type="number" class="form-control @error('pieces') is-invalid @enderror" value="{{ old('pieces', $application->pieces) }}" name="pieces" autocomplete="off" min="0">
                                                            <span class="input-group-btn">
                                                                <span class="btn blue @error('pieces') orange @enderror" type="button">dona</button>
                                                            </span>
                                                        </div>
                                                        @error('pieces')
                                                            <span class="text-danger help-block" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2 post-inform-content">
                                                    <div class="form-gorup">
                                                        <label for="weight" class="control-label" style="margin-bottom: 13px">
                                                        @lang('pages.weight')
                                                                <span class="required">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input id="weight" type="text" pattern="^[0-9\.\,]*$" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $application->weight) }}" name="weight" autocomplete="off" min="0">
                                                            <span class="input-group-btn">
                                                                <span class="btn blue @error('weight') orange @enderror" type="button">kg</button>
                                                            </span>
                                                        </div>
                                                        @error('weight')
                                                            <span class="text-danger help-block" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-5 post-inform-content">
                                                    <div class="form-gorup">
                                                        <label for="volume" class="control-label" style="margin-bottom: 13px">
                                                                @lang('pages.volume')
                                                                <span class="text-success">*</span>
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" name="volume_x" min="0" value="{{ old('volume_x') }}">
                                                                    <span class="input-group-btn">
                                                                        <span class="btn blue" type="button">sm</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" name="volume_y" min="0" value="{{ old('volume_y') }}">
                                                                    <span class="input-group-btn">
                                                                        <span class="btn blue" type="button">sm</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" name="volume_z" min="0" value="{{ old('volume_z') }}">
                                                                    <span class="input-group-btn">
                                                                        <span class="btn blue" type="button">sm</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 post-inform-content">
                                                    <div class="form-md-radios">
                                                        <label for="category_product" class="control-label" style="margin-bottom:9px">
                                                        @lang('pages.product_category')                                                                
                                                                <span class="required">*</span>
                                                        </label>
                                                        <div class="md-radio-inline">
                                                            <div class="md-radio">
                                                                <input type="radio" id="envelope" name="category_product" value="envelope" class="md-radiobtn"  {{ $application->category_product=='envelope'?'checked':'' }} checked>
                                                                <label for="envelope">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Конверт </label>
                                                            </div>
                                                            <div class="md-radio">
                                                                <input type="radio" id="package" name="category_product" value="package" class="md-radiobtn"  {{ $application->category_product=='package'?'checked':'' }}>
                                                                <label for="package">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Пакет </label>
                                                            </div>
                                                            <div class="md-radio">
                                                                <input type="radio" id="others" name="category_product" value="others" class="md-radiobtn" {{ $application->category_product=='others'?'checked':'' }}>
                                                                <label for="others">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Другая </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4 post-inform-content">
                                                    <div class="form-group">
                                                        <label class="control-label" style="margin-bottom: 2px;">
                                                            <small>
                                                            @lang('pages.contract_number')                                                                
                                                                <span class="text-success">*</span>
                                                            </small>
                                                        </label>
                                                        <input type="text" class="form-control" name="number_contract" autocomplete="off" value="{{ old('number_contract', $application->number_contract) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 text-center post-inform-content">
                                                    <div class="form-md-radios">
                                                        <label for="" class="control-label" style="margin-bottom: 13px">
                                                        @lang('pages.type_pay_for_service')
                                                            
                                                            <span class="required">*</span>
                                                        </label>
                                                        <div class="md-radio-inline">
                                                            <div class="md-radio">
                                                                <input type="radio" id="terminal" name="transfers" value="terminal" {{ $application->category_pay_service=='terminal'?'checked':'' }} class="md-radiobtn" checked>
                                                                <label for="terminal">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Терминал 
                                                                </label>
                                                            </div>
                                                            <div class="md-radio">
                                                                <input type="radio" id="payme" name="transfers" value="payme" {{ $application->category_pay_service=='payme'?'checked':'' }} class="md-radiobtn" >
                                                                <label for="payme">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Payme 
                                                                </label>
                                                            </div>
                                                            <div class="md-radio">
                                                                <input type="radio" id="transfer" name="transfers" value="transfer" {{ $application->category_pay_service=='transfer'?'checked':'' }} class="md-radiobtn">
                                                                <label for="transfer">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Перечисления 
                                                                </label>
                                                            </div>
                                                            <div class="md-radio">
                                                                <input type="radio" id="cash" name="transfers" value="cash" {{ $application->category_pay_service=='cash'?'checked':'' }} class="md-radiobtn">
                                                                <label for="cash">
                                                                    <span></span>
                                                                    <span class="check"></span>
                                                                    <span class="box"></span>
                                                                    Наличные деньги 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <a href="{{ route('admin.index') }}" class="btn blue">
                                            <i class="m-icon-swapleft m-icon-white"></i> @lang('pages.back_to_home')
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn blue">
                                            @lang('pages.continue') <i class="m-icon-swapright m-icon-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            $('.select2').select2();
            $('.date').datepicker({
                format: 'mm-dd-yyyy'
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });
        });
    </script>
@endsection
