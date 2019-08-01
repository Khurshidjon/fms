@extends('layouts.main')
@section('content')
<style>
    .is-invalid{
        border-bottom: 1px solid red;
    }
</style>
<div class="page-content">
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class="icon-pin font-green"></i>
                <span class="caption-subject bold uppercase">Форма нового контракта</span>
            </div>
        </div>
        <div class="portlet-body form">
            <ul class="nav nav-pills nav-justified steps">
                <li class="active">
                    <a href="#tab1" data-toggle="tab" class="step">
                        <span class="number">
                        1 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Информация о контракте </span>
                    </a>
                </li>
                <li style="pointer-events: none; background: rgba(0,0,0,0.1); border-right: 1px solid rgba(0,0,0,0.3);">
                    <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Цена контракта </span>
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
                        aria-valuenow="33.3" aria-valuemin="0" aria-valuemax="100" style="width:33.3%">
                </div>
            </div>
            <form action="{{ route('contracts.store') }}" method="post" class="container">
                @csrf
                    <div class="form-group @error('address') has-error @enderror">
                        <label class="control-label">Адрес компании <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" value="{{ old('address') }}" style="resize: none"></textarea>
                        @error('address')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group @error('contract_id') has-error @enderror">
                                    <label for="" class="control-label">Номер договора №</label>
                                    <input type="number" class="form-control" min="1" name="contract_id" placeholder="12345" value="{{ $contract_number }}">
                                    @error('contract_id')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('contract_period') has-error @enderror">
                                    <label class="control-label">Контрактный период <span class="text-success">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" name="contract_period" placeholder="1 год, 1 месяц" value="{{ old('contract_period') }}">
                                        <span class="input-group-addon">
                                            <label for="year">
                                                <input id="year" type="radio" name="contract_period_date" value="год" checked> год
                                            </label>
                                            <label for="mounth">
                                                <input id="mounth" type="radio" name="contract_period_date" value="месяц"> месяц
                                            </label>
                                        </span>
                                    </div>
                                    @error('contract_period')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('contract_start') has-error @enderror">
                                    <label class="control-label">Начало контракта  <span class="text-danger">*</span></label>
                                    <input type="text" name="contract_start" class="form-control date form-control" autocomplete="off" value="{{ old('contract_start') }}" placeholder="mm-dd-yyyy">
                                    @error('contract_start')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('contract_expiration') has-error @enderror">
                                    <label class="control-label">Истечение срока действия договора <span class="text-danger">*</span></label>
                                    <input type="text" name="contract_expiration" class="form-control date form-control" autocomplete="off" value="{{ old('contract_expiration') }}" placeholder="mm-dd-yyyy">
                                    @error('contract_expiration')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('company_name') has-error @enderror">
                                    <label class="control-label">Название компании <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}">
                                    @error('company_name')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('nds') has-error @enderror">
                                    <label class="control-label">НДС <span class="text-success">*</span></label>
                                    <input type="text" name="nds" class="form-control" value="{{ old('nds') }}">
                                    @error('nds')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('director') has-error @enderror">
                                    <label class="control-label">Директор компании <span class="text-danger">*</span></label>
                                    <input type="text" name="director" class="form-control" value="{{ old('director') }}">
                                    @error('director')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
						</div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group @error('bank') has-error @enderror">
                                    <label class="control-label">Банк <span class="text-danger">*</span></label>
                                    <input type="text" name="bank" class="form-control" value="{{ old('bank') }}">
                                    @error('bank')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('rs') has-error @enderror">
                                    <label class="control-label">RS <span class="text-danger">*</span></label>
                                    <input type="text" name="rs" class="form-control" value="{{ old('rs') }}">
                                    @error('rs')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('mfo') has-error @enderror">
                                    <label class="control-label">MFO <span class="text-danger">*</span></label>
                                    <input type="text" name="mfo" class="form-control" value="{{ old('mfo') }}">
                                    @error('mfo')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('inn') has-error @enderror">
                                    <label class="control-label">ИНН <span class="text-danger">*</span></label>
                                    <input type="text" name="inn" class="form-control" value="{{ old('inn') }}">
                                    @error('inn')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('phone') has-error @enderror">
                                    <label class="control-label">Номер телефона <span class="text-danger">*</span></label>
                                    <input id="phone" 
                                            type="tel" 
                                            name="phone" 
                                            class="form-control"
                                            value="{{ old('phone', '+998 (__) ___-__-__') }}" 
                                            required>
                                    @error('phone')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('oked') has-error @enderror">
                                    <label class="control-label">OKED <span class="text-danger">*</span> </label>
                                    <input type="text" name="oked" class="form-control" value="{{ old('oked') }}">
                                    @error('oked')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group @error('email') has-error @enderror">
                                    <label class="control-label">email <span class="text-success">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
						</div>                    
                    </div>
                </div>
                <div class="form-actions noborder text-right">
                    <button type="submit" class="btn blue">Далее <i class="m-icon-swapright m-icon-white"></i></button>
                    <!-- <button type="button" class="btn default">Cancel</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
        $(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            $('.date').datepicker({
                format: 'dd-mm-yyyy'
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });
        });
    </script>
@endsection
