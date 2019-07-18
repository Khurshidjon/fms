@extends('layouts.main')
@section('content')
    <style>
        .list-border{
            border: 1px solid darkgrey;
        }
        td{
            max-width: 60mm;
        }
        @media print {
            .post_phone_number{
                font-size: 12px
            }
        }
    </style>
    @php 
        $from_city = \App\Region::where('id', $application->from_city_id)->first();
        $to_city = \App\Region::where('id', $application->to_city_id)->first();
        $from_district = \App\District::where('id', $application->from_district_id)->first();
        $to_district = \App\District::where('id', $application->to_district_id)->first();
    @endphp
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Заявка - <span class="step-title">
								Шаг 3 из 3 </span>
                        </div>
                        <div class="tools hidden-xs">
                            <div class="form-actions">
                                <a href="{{ URL::previous() }}" class="btn blue border" style="border: 1px solid #002e5b !important;">
                                <i class="m-icon-swapleft m-icon-white"></i> Назад
                                </a>
                                <a href="{{ route('admin.first-step') }}" class="btn blue" style="border: 1px solid #002e5b !important;">Добавить новая заявка <i class="fa fa-plus"></i></a>
                                <button onclick="printDiv('printableArea')"  type="button" class="btn blue border" style="border: 1px solid #002e5b !important;">
                                    Печать <i class="fa fa-print m-icon-white"></i>
                                </button>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li class="done" style="pointer-events: none">
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number">
                                            1 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Информация о почте </span>
                                        </a>
                                    </li>
                                    <li class="done" style="pointer-events: none">
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number">
                                            2 </span>
                                            <span class="desc">
                                            <i class="fa fa-check"></i> Сервисные сборы </span>
                                        </a>
                                    </li>
                                    <li class="active">
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
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
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
                                    <div class="tab-pane active print-content" id="tab3"  style="height:300mm;width:210mm; margin-left: auto; margin-right: auto;" >
                                        <table style="padding-left: 5px;" cellspacing="0" cellpadding-left="0" width="100%">
                                            <tr>
                                                <td colspan="2" width="30mm;" style="padding-left-right:15px;"><img src="{{ asset('backend/assets/global/img/logo.png') }}" width='240px' style="padding-left:5px;"></td>
                                                <td colspan="2" style="padding-left: 25px; font-size: 10px" ><span style="font-size:14px;font-weight: bold; color:#002e5b; font-family: Arial;">Тел. +998 91 781-09-99 <br> www.flymail.uz </span></td>
                                                <td colspan="4" rowspan="2" style="text-align:center;padding-left-right:15px;"><img style="width: 200px;" src="data:image/png;base64,{!!  \DNS1D::getBarcodePNG($application->guid, 'C128',2,33,array(1,1,1), true) !!}" alt="">
                                                    <br><b>{{ $application->guid }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" style="height:25px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Отправитель</td>
                                                <td colspan="4" style="border:1px solid black; padding-left:5px;color:#002e5b;font-size:18px; font-weight:bold;">Описание отправления</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Ф.И.О:</b> <i>{{ $application->from_fio }}</i></td>
                                                <td style="border:1px solid black;"><b>Тел:</b> <i>{{ $application->from_phone }}</i></td>
                                                <td style="border:1px solid black; text-align:center;"><b>Общий вес</b></td>
                                                <td colspan="2" style="border:1px solid black; text-align:center;"><b>Кол-во мест</b></td>
                                                <td style="border:1px solid black; text-align:center;"><b>Габариты, см <sup>3</sup></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b> Организация: </b> <i> {{ $application->from_organ_name }} </i> </td>
                                                <td style="border:1px solid black; text-align:center;"><i>{{ $application->weight }}</i></td>
                                                <td colspan="2" style="border:1px solid black; text-align:center;"><i>{{ $application->pieces }}</i></td>
                                                <td style="border:1px solid black; text-align:center; color:red"><i>{{ $application->volume*6000 }} </i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="2" style="border:1px solid black;padding-left:5px;"><b>Город:</b> <i>{{ $from_city->name_ru }}</i></td>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Контракт №:</b> <i></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->from_pay_courier == 'sender')
                                                            Отправитель
                                                        @elseif($application->from_pay_courier == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                                <td colspan="2" style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->pay_service == "sender")
                                                            Отправитель
                                                        @elseif($application->pay_service == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                                <td style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->to_pay_courier == "sender")
                                                            Отправитель
                                                        @elseif($application->to_pay_courier == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="2" style="border:1px solid black;padding-left:5px;"><b>Адрес: </b><i> {{ $application->from_address }}</i></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Курьер/От</b><br><i> {{ $application->cost_from_courier }} сум</i></td>
                                                <td colspan="2" style="border:1px solid black;text-align:center;"><b>Почта</b><br><i> {{ $application->cost_service }} сум</i></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Курьер/По</b><br><i> {{ $application->cost_to_courier }} сум</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Объявленная ценность:</b><i> {{ $application->cost_from_courier + $application->cost_to_courier + $application->cost_service }} сум</i></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;">Конверт</td>
                                                <td style="border:1px solid black;text-align:center;">Пакет</td>
                                                <td style="border:1px solid black;text-align:center;">Другая</td>
                                                <td style="border:1px solid black;text-align:center;"><b>Перечисление</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Наличние</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Payme</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Терминал</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_product=='envelope'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"> <i class="fa {{ $application->category_product=='package'?'fa-check':'' }}"></i> </td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_product=='others'?'fa-check':'' }}"></i></td>
                                                
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='transfer'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='cash'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='payme'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='terminal'?'fa-check':'' }}"></i></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td>
                                                <td colspan="4" style="border:1px solid black;text-align:center;" colspan="3"><b>Дата:</b><i> {{ $application->from_date->format('d.m.Y') }}г.</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="height:10px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Получатель</td>
                                                <td colspan="4" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Курьер</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Ф.И.О:</b> <i>{{ $application->to_fio }}</i></td>
                                                <td style="border:1px solid black;padding-left:5px;"><b>Тел:</b> <i>{{ $application->to_phone }}</i></td>
                                                <td colspan="4" rowspan="2" style="border:1px solid black; padding-left:5px;"><b>Ф.И.О:</b> <i> {{ $courier!=null?$courier->courier_name:'' }}</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Организация:</b> <i>{{ $application->to_organ_name }}</i> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"  style="border:1px solid black;padding-left:5px;"><b>Город:</b> <i>{{ $to_city->name_ru }}</i></td>
                                                <td colspan="4" rowspan="2" style="border:1px solid black; padding-left:5px;"><b>Тел:</b><i> {{ $courier!=null?$courier->courier_phone:'' }}</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Адрес: </b><i> {{ $application->to_address }}</i></td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td><td style="padding-left:5px; border:1px solid black;text-align:center;" colspan="1"><b>Дата:</b><i> {{ $application->to_date->format('d.m.Y') }}г.</i></td>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td>
                                            </tr>
                                        </table>

                                        <br><hr><br>

                                        <table style="padding-left: 5px;" cellspacing="0" cellpadding-left="0" width="100%">
                                            <tr>
                                                <td colspan="2" width="30mm;" style="padding-left-right:15px;"><img src="{{ asset('backend/assets/global/img/logo.png') }}" width='240px' style="padding-left:5px;"></td>
                                                <td colspan="2" style="padding-left: 25px"><span style="font-size:14px;font-weight: bold; color:#002e5b; font-family: Arial;">Тел. +998 91 781-09-99 <br> www.flymail.uz </span></td>
                                                <td colspan="4" rowspan="2" style="text-align:center;padding-left-right:15px;"><img style="width: 200px;" src="data:image/png;base64,{!!  \DNS1D::getBarcodePNG($application->guid, 'C128',2,33,array(1,1,1), true) !!}" alt="">
                                                    <br><b>{{ $application->guid }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" style="height:25px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Отправитель</td>
                                                <td colspan="4" style="border:1px solid black; padding-left:5px;color:#002e5b;font-size:18px; font-weight:bold;">Описание отправления</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Ф.И.О:</b> <i>{{ $application->from_fio }}</i></td>
                                                <td style="border:1px solid black;"><b>Тел:</b> <i>{{ $application->from_phone }}</i></td>
                                                <td style="border:1px solid black; text-align:center;"><b>Общий вес</b></td>
                                                <td colspan="2" style="border:1px solid black; text-align:center;"><b>Кол-во мест</b></td>
                                                <td style="border:1px solid black; text-align:center;"><b>Габариты, см <sup>3</sup></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Организация:</b> <i>{{ $application->from_organ_name }}</i> </td>
                                                <td style="border:1px solid black; text-align:center;"><i>{{ $application->weight }}</i></td>
                                                <td colspan="2" style="border:1px solid black; text-align:center;"><i>{{ $application->pieces }}</i></td>
                                                <td style="border:1px solid black; text-align:center; color:red"><i>{{ $application->volume*6000 }} </i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="2" style="border:1px solid black;padding-left:5px;"><b>Город:</b> <i>{{ $from_city->name_ru }}</i></td>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Контракт №:</b> <i></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->from_pay_courier == 'sender')
                                                            Отправитель
                                                        @elseif($application->from_pay_courier == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                                <td colspan="2" style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->pay_service == "sender")
                                                            Отправитель
                                                        @elseif($application->pay_service == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                                <td style="border:1px solid black;text-align:center;">
                                                    <i>
                                                        @if($application->to_pay_courier == "sender")
                                                            Отправитель
                                                        @elseif($application->to_pay_courier == "receiver")
                                                            Получатель
                                                        @else
                                                            -
                                                        @endif
                                                    </i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" rowspan="2" style="border:1px solid black;padding-left:5px;"><b>Адрес: </b><i> {{ $application->from_address }}</i></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Курьер/От</b><br><i> {{ $application->cost_from_courier }} сум</i></td>
                                                <td colspan="2" style="border:1px solid black;text-align:center;"><b>Почта</b><br><i> {{ $application->cost_service }} сум</i></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Курьер/По</b><br><i> {{ $application->cost_to_courier }} сум</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Объявленная ценность:</b><i> {{ $application->cost_from_courier + $application->cost_to_courier + $application->cost_service }} сум</i></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;">Конверт</td>
                                                <td style="border:1px solid black;text-align:center;">Пакет</td>
                                                <td style="border:1px solid black;text-align:center;">Другая</td>
                                                <td style="border:1px solid black;text-align:center;"><b>Перечисление</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Наличние</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Payme</b></td>
                                                <td style="border:1px solid black;text-align:center;"><b>Терминал</b></td>
                                            </tr>
                                            <tr>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_product=='envelope'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"> <i class="fa {{ $application->category_product=='package'?'fa-check':'' }}"></i> </td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_product=='others'?'fa-check':'' }}"></i></td>
                                                
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='transfer'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='cash'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='payme'?'fa-check':'' }}"></i></td>
                                                <td style="border:1px solid black;text-align:center;"><i class="fa {{ $application->category_pay_service=='terminal'?'fa-check':'' }}"></i></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td>
                                                <td colspan="4" style="border:1px solid black;text-align:center;" colspan="3"><b>Дата:</b><i> {{ $application->from_date->format('d.m.Y') }}г.</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="height:10px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Получатель</td>
                                                <td colspan="4" style="border:1px solid black;color:#002e5b; font-size:18px; font-weight:bold; padding-left:5px;">Курьер</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Ф.И.О:</b> <i>{{ $application->to_fio }}</i></td>
                                                <td style="border:1px solid black;padding-left:5px;"><b>Тел:</b> <i>{{ $application->to_phone }}</i></td>
                                                <td colspan="4" rowspan="2" style="border:1px solid black; padding-left:5px;"><b>Ф.И.О:</b> <i>{{ $courier!=null?$courier->courier_name:'' }}</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Организация:</b> <i>{{ $application->to_organ_name }}</i> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"  style="border:1px solid black;padding-left:5px;"><b>Город:</b> <i>{{ $to_city->name_ru }}</i></td>
                                                <td colspan="4" rowspan="2" style="border:1px solid black; padding-left:5px;"><b>Тел:</b><i>{{ $courier!=null?$courier->courier_phone:'' }}</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border:1px solid black;padding-left:5px;"><b>Адрес: </b><i> {{ $application->to_address }}</i></td>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td><td style="padding-left:5px; border:1px solid black;text-align:center;" colspan="1"><b>Дата:</b><i> {{ $application->to_date->format('d.m.Y') }}г.</i></td>
                                                <td colspan="4" style="border:1px solid black;padding-left:5px;"><b>Подпись:</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" style="border:1px solid black;text-align:center;"><span style="text-transform:uppercase; font-weight:bold;">Копия Получателя</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <script>
        $(function () {
            Layout.init(); // init current layout
        });
        function printDiv(divName) {
            var printContents = document.getElementById('tab3').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
