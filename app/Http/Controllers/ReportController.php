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
        $result = Application::all();

        $applications = Application::where('from_city_id', $city)->get();

        $spread = new Spreadsheet();
        $sheet = $spread->getActiveSheet();


        $i = 2;

        $sheet->setCellValue("A1",'Из города');
        $sheet->setCellValue("B1",'Из района');
        $sheet->setCellValue("C1",'В город');
        $sheet->setCellValue("D1",'В район');
        $sheet->setCellValue("E1",'Статус');

        foreach ($applications as $application){
            $sheet->setCellValue("A".$i, $application->from_city->name_ru);
            $sheet->setCellValue("B".$i, $application->from_district->name_ru);
            $sheet->setCellValue("C".$i, $application->to_city->name_ru);
            $sheet->setCellValue("D".$i, $application->to_district->name_ru);
            if ($application->status == 2){
                $sheet->setCellValue("E".$i, 'Исполнено');
            }elseif($application->status == 1){
                $sheet->setCellValue("E".$i, 'На исполнено');
            }
            $i++;
        }

        $writer = new Xlsx($spread);

        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use ($spread) {
            // $spreadsheet = //create you spreadsheet here;
            $writer =  new Xlsx($spread);
            $writer->save('php://output');
        });
        $streamedResponse->setStatusCode(200);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="report.xlsx"');
        return $streamedResponse->send();

        return $result;
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
