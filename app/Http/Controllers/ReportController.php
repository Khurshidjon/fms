<?php

namespace App\Http\Controllers;

use App\Application;
use App\Exports\ApplicationExport;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Region::all();
        return view('backend.report.index', [
            'is_active' => 'report',
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city =  $request->get('city');
        $from_date =  $request->get('from');
        $to_date =  $request->get('to');
        $number_contract = $request->input('number_contract');

        $from = strtotime(date_create($from_date)->format("Y-m-d"));
        $to = strtotime(date_create($to_date)->format("Y-m-d"));
        
        $result = Application::all();
        if($number_contract && $request->contract == '1'){
            if($from_date == null && $to_date == null){
                $applications = Application::where('number_contract', $number_contract)
                ->where('from_city_id', $city)
                ->get();            
            }else{
                $applications = Application::where('number_contract', $number_contract)
                ->where('created_at', '>=', date('Y-m-d', $from))
                ->where('created_at', '<=', date('Y-m-d', $to))
                ->orWhere('from_city_id', $city)
                ->get();
            }
        }else{
            if($from_date == null && $to_date == null){
                $applications = Application::where('from_city_id', $city)->get();            
            }else{
                $applications = Application::where('from_city_id', $city)
                ->where('created_at', '>=', date('Y-m-d', $from))
                ->where('created_at', '<=', date('Y-m-d', $to))
                ->get();
            }
        }
        
        $spread = new Spreadsheet();
        $spread->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
        $spread->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold( true );
        $spread->getActiveSheet()->getStyle("A2:O2")->getFont()->setBold( true );
        $spread->getActiveSheet()->getStyle("A3:O3")->getFont()->setBold( true );
        $spread->getActiveSheet()->getStyle("A1:O1")->getAlignment()->setHorizontal('center');
        $spread->getActiveSheet()->getStyle("A2:O2")->getAlignment()->setHorizontal('center');
        $spread->getActiveSheet()->getStyle("A3:O3")->getAlignment()->setHorizontal('center');

        $sheet = $spread->getActiveSheet();
        // $sheet->getDefaultRowDimension()->setRowHeight(25);
        $i = 4;
        $k = 1;
        $d = 4;
        if($request->contract == '1'){
            $sheet->mergeCells('A1:E1')->setCellValue("A1", 'Номер контракт №'  .' '. $number_contract);
        }else{
            $sheet->setCellValue("B1", 'до');
            $sheet->setCellValue("C1", $from_date);
            $sheet->setCellValue("D1", 'с');
            $sheet->setCellValue("E1", $to_date);
        }
   
        $sheet->mergeCells('A2:G2')->setCellValue('A2', 'Отправитель');
        $sheet->mergeCells('H2:I2')->setCellValue('H2', 'Получатель');
        $sheet->mergeCells('J2:O2')->setCellValue('J2', 'Финансовый');

        $sheet->setCellValue("A3", '№');
        $sheet->setCellValue("B3", 'Штрихкод');
        $sheet->setCellValue("C3", 'Дата');
        $sheet->setCellValue("D3", 'Город');
        $sheet->setCellValue("E3", 'Общий вес');
        $sheet->setCellValue("F3", 'Кол-во мест');
        $sheet->setCellValue("G3", 'Габариты, см 3');
        $sheet->setCellValue("H3", 'Город');
        $sheet->setCellValue("I3", 'Дата');
        $sheet->mergeCells('J3:K3')->setCellValue('J3', 'Курьер/От');
        $sheet->mergeCells('L3:M3')->setCellValue('L3', 'Почта');
        $sheet->mergeCells('N3:O3')->setCellValue('N3', 'Курьер/По');

        $sheet->setCellValue("I3", 'Дата');

        foreach ($applications as $application){
            $spread->getActiveSheet()->getStyle("A".$i.":"."O".$d)->getAlignment()->setHorizontal('center');

            $sheet->setCellValue("A".$i, $k);
            $sheet->setCellValue("B".$i, $application->guid);
            $sheet->setCellValue("C".$i, $application->from_date->format('d/m/Y'));
            $sheet->setCellValue("D".$i, $application->from_city->name_ru);
            $sheet->setCellValue("E".$i, $application->weight);
            $sheet->setCellValue("F".$i, $application->pieces);
            
            if($application->volume == 0)
            {
                $sheet->setCellValue("G".$i, '-');
            }else{
                $sheet->setCellValue("G".$i, $application->volume);
            }
            
            $sheet->setCellValue("H".$i, $application->to_city->name_ru);
            $sheet->setCellValue("I".$i, $application->performed_date);

            if($application->cost_from_courier == '0')
            {
                $sheet->setCellValue("J".$i, '-');
            }else{
                $sheet->setCellValue("J".$i, $application->cost_from_courier);
            }
            
            if($application->category_pay_from_courier == 'cash'){
                $sheet->setCellValue("K".$i, 'Наличные деньги');
            }elseif($application->category_pay_from_courier == 'payme'){
                $sheet->setCellValue("K".$i, 'Payme');
            }elseif($application->category_pay_from_courier == 'transfer'){
                $sheet->setCellValue("K".$i, 'Перечисление');
            }elseif($application->category_pay_from_courier == 'terminal'){
                $sheet->setCellValue("K".$i, 'Терминал');
            }

            if($application->cost_service == '0'){
                $sheet->setCellValue("L".$i, '-');
                
            }else{
                $sheet->setCellValue("L".$i, $application->cost_service);
            }
            
            if($application->category_pay_service == 'cash'){
                $sheet->setCellValue("M".$i, 'Наличные деньги');
            }elseif($application->category_pay_service == 'payme'){
                $sheet->setCellValue("M".$i, 'Payme');
            }elseif($application->category_pay_service == 'transfer'){
                $sheet->setCellValue("M".$i, 'Перечисление');
            }elseif($application->category_pay_service == 'terminal'){
                $sheet->setCellValue("M".$i, 'Терминал');
            }
            
            if($application->cost_to_courier == '0'){
                $sheet->setCellValue("N".$i, '-');
            }else{
                $sheet->setCellValue("N".$i, $application->cost_to_courier);
            }

            if($application->category_pay_to_courier == 'cash'){
                $sheet->setCellValue("O".$i, 'Наличные деньги');
            }elseif($application->category_pay_to_courier == 'payme'){
                $sheet->setCellValue("O".$i, 'Payme');
            }elseif($application->category_pay_to_courier == 'transfer'){
                $sheet->setCellValue("O".$i, 'Перечисление');
            }elseif($application->category_pay_to_courier == 'terminal'){
                $sheet->setCellValue("O".$i, 'Терминал');
            }

            $i++;
            $k++;
            $d++;
        }

        $writer = new Xlsx($spread);
        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use ($spread) {
            $writer =  new Xlsx($spread);
            $writer->save('php://output');
        });
        $streamedResponse->setStatusCode(200);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="report.xls"');
        return $streamedResponse->send();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
