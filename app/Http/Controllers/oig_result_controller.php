<?php

namespace App\Http\Controllers;

use App\employees_oig_result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;
use Excel;


class oig_result_controller extends Controller
{
    public function getView(){
        $year = date("Y");
        $year_months = array($year."01",$year."02",$year."03",$year."04",$year."05",$year."06",$year."07",$year."08",
            $year."09",$year."10",$year."11",$year."12");

        foreach ($year_months as $item) {

            $result = employees_oig_result::where(['YEARMONTH' => $item])->first();

            if($result != null){
                $data[] = $result->YEARMONTH;
            }

        }

        return view("oig_result",compact('data'));
    }



    public function file_download(Request $request){

        $yearmonth= $request->input('Period');
        $outputFormat = $request->input('selectOutputFormat');
        $data = employees_oig_result::where(['YEARMONTH' => $yearmonth])->get();
        if($data != null){
            //-------------EXPORT RESULT------------------------------------
            if($outputFormat == 'pdf'){

                $pdf = PDF::loadView('pdf', ['results'=>$data]);
                return $pdf->download('Exclution_List_'.$yearmonth.'.pdf');

            }elseif ($outputFormat == 'csv'){
                $data = employees_oig_result::where(['YEARMONTH' => $yearmonth])->get();

                return Excel::create('Exclution_List_'.$yearmonth, function($excel) use ($data) {
                    $excel->sheet('mySheet', function($sheet) use ($data)
                    {
                        $sheet->fromArray($data);
                    });
                })->download($outputFormat);
            }else{
                $request->session()->flash('alert-info', 'Please select a valid Out Put Format!');
                return redirect()->route("exclutionList");
            }
        }else{
            $request->session()->flash('alert-info', 'No record found in the database!');
            return redirect()->route("exclutionList");
        }
    }




































}
