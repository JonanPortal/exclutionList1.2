<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;
use app\employee;

class ExcelController extends Controller
{

    public function postImport(){

        Excel::load(Input::file('employeesList_file'), function($reader) {

            // Loop through all sheets
            $reader->each(function($sheet) {

                $array = $sheet->toArray();

                foreach ($array as $value) {
                    //get employee information

                    $company_id = $value['Company ID'];
                    $name = $value['Last Name, First Name'];
                    $formatted_dob = explode('/', $value['Birth Date']);
                    $dob = $formatted_dob[2] . $formatted_dob[0] . $formatted_dob[1];
                    $formatted_doh = explode('/', $value['Date Hired']);
                    $doh = $formatted_doh[2] . $formatted_dob[0] . $formatted_dob[1];

                    employee::create(['COMPANY_ID' => $company_id , 'NAME' => $name , 'DOB' => $dob ,
                        'DATE_HIRED' => $doh ]);



                }
            });
        });

    }



}
