@extends('layouts.main')
@section('content')
    <style>
        .toggle-on.btn{
            background-color: #002e5b !important;
            color: white !important;
        }
        .toggle-off.btn{
            background-color: #ff5e00 !important;
            color: white !important;
        }
    </style>
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Form Wizard <small>form wizard sample</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ route('admin.index') }}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Form Stuff</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Form Wizard</a>
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
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Form Wizard - <span class="step-title">
								Step 2 of 3 </span>
                        </div>
                        <div class="tools hidden-xs">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form action="{{ route('admin.second-step-edit-result', ['application' => $application]) }}" class="form-horizontal" id="submit_form" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-wizard">
                                <div class="form-body">
                                    <ul class="nav nav-pills nav-justified steps">
                                        <li class="done" style="pointer-events: none">
                                            <a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												    1
                                                </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Информация о почте </span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												    2
                                                </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Сервисные сборы </span>
                                            </a>
                                        </li>
                                        <li style="pointer-events: none">
                                            <a href="#tab3" data-toggle="tab" class="step">
												<span class="number">
												    3
                                                </span>
                                                <span class="desc">
												<i class="fa fa-check"></i> Накладной </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
                                             aria-valuenow="66.6" aria-valuemin="0" aria-valuemax="100" style="width:66.6%">
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
                                        <div class="tab-pane active" id="tab2">
                                            <h3 class="block">Предоставьте данные вашего сервиса</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Сервисы</th>
                                                        <th class="text-center">Цена</th>
                                                        <th class="text-center">Кто оплачивает почтовые расходы?</th>
                                                        <th class="text-center">Скидка</th>
                                                        <th class="text-center">Типы оплаты</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="form-group">
                                                            <label class="control-label">From courier
                                                                <span class="required">*</span>
                                                            </label>
                                                        </td>
                                                        @php
                                                            //dd($zayavka)
                                                        @endphp
                                                        <td class="form-group">
                                                            <input type="number" class="form-control" name="cost_from_courier" value="{{ $application!=null?$application->cost_from_courier:'' }}">
                                                        </td>
                                                        <td class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" data-toggle="toggle" name="from_pay_courier" data-on="Отправитель" data-off="Получатель" class="form-control" {{ $application->from_pay_courier=='sender'?'checked':'' }}>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="form-group">
                                                            <input type="text" class="form-control" name="sale_for_from_courier" readonly placeholder="Sale for courier (%)" value="{{ old('sale_for_from_courier', $application->sale_for_from_courier) }}">
                                                        </td>
                                                        <td class="form-group">
                                                            <div class="form-md-radios">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="terminal_from_courier" name="category_pay_from_courier" value="terminal" {{ $application->category_pay_from_courier=='terminal'?'checked':'' }} class="md-radiobtn">
                                                                        <label for="terminal_from_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Терминал 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="payme_from_courier" name="category_pay_from_courier" value="payme" {{ $application->category_pay_from_courier=='payme'?'checked':'' }} class="md-radiobtn" >
                                                                        <label for="payme_from_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Payme 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="transfer_from_courier" name="category_pay_from_courier" value="transfer" {{ $application->category_pay_from_courier=='transfer'?'checked':'' }} class="md-radiobtn">
                                                                        <label for="transfer_from_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Перечисления 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="cash_from_courier" name="category_pay_from_courier" class="md-radiobtn" value="cash" {{ $application->category_pay_from_courier=='cash'?'checked':'' }}>
                                                                        <label for="cash_from_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Наличные деньги 
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="form-group">
                                                            <label class="control-label">Post
                                                                <span class="required">*</span>
                                                            </label>
                                                        </td>
                                                        <td class="form-group">
                                                            <input type="text" class="form-control" name="cost_service" value="{{ $application!=null?$application->cost_service:'' }}" readonly>
                                                        </td>
                                                        <td class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" data-toggle="toggle" name="pay_service" data-on="Отправитель" data-off="Получатель" class="form-control" {{ $application->pay_service=='sender'?'checked':'' }}>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="form-group">
                                                            <input type="text" class="form-control" name="sale_for_service" readonly placeholder="Sale for service (%)" value="{{ old('sale_for_service', $application->sale_for_service) }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="form-group">
                                                            <label class="control-label">To courier
                                                                <span class="required">*</span>
                                                            </label>
                                                        </td>
                                                        <td class="form-group">
                                                            <input type="text" class="form-control" name="cost_to_courier" value="{{ $application!=null?$application->cost_to_courier:'' }}">
                                                        </td>
                                                        <td class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" data-toggle="toggle" name="to_pay_courier" data-on="Отправитель" data-off="Получатель" class="form-control"  {{ $application->to_pay_courier=='sender'?'checked':'' }}>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="form-group">
                                                            <input type="text" class="form-control" name="sale_for_to_courier" readonly placeholder="Sale for delivery (%)" value="{{ old('sale_for_to_courier', $application->sale_for_to_courier) }}">
                                                        </td>
                                                        <td>
                                                            <div class="form-md-radios">
                                                                <div class="md-radio-inline">
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="terminal_to_courier" name="category_pay_to_courier" value="terminal" {{ $application->category_pay_to_courier=='terminal'?'checked':'' }} class="md-radiobtn">
                                                                        <label for="terminal_to_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Терминал 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="payme_to_courier" name="category_pay_to_courier" value="payme" {{ $application->category_pay_to_courier=='payme'?'checked':'' }} class="md-radiobtn" >
                                                                        <label for="payme_to_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Payme 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="transfer_to_courier" name="category_pay_to_courier" value="transfer" {{ $application->category_pay_to_courier=='transfer'?'checked':'' }} class="md-radiobtn">
                                                                        <label for="transfer_to_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Перечисления 
                                                                        </label>
                                                                    </div>
                                                                    <div class="md-radio">
                                                                        <input type="radio" id="cash_to_courier" name="category_pay_to_courier" class="md-radiobtn" value="cash" {{ $application->category_pay_to_courier=='cash'?'checked':'' }}>
                                                                        <label for="cash_to_courier">
                                                                            <span></span>
                                                                            <span class="check"></span>
                                                                            <span class="box"></span>
                                                                            Наличные деньги 
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6 col-6 text-left">
                                            <a href="{{ url()->previous() }}" class="btn blue">
                                                <i class="m-icon-swapleft m-icon-white"></i> Back
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-6 text-right">
                                            <button type="submit" class="btn blue button-next">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <script>
        $(function () {
            // initiate layout and plugins
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            // QuickSidebar.init(); // init quick sidebar
            // Demo.init(); // init demo features
            // FormWizard.init();
        })
    </script>
@endsection
