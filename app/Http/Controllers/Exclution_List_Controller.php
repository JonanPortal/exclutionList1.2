<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;
use App\employee;
use App\oig;
use App\employees_oig_result;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class Exclution_List_Controller extends Controller
{
    public function getView()
    {
        return view('exclutionList');
    }

    public function postImport(Request $request)
    {

        $yearmonth = date('Y').$request->input('Period');

        //-------LOADING THE DATA FOR THE EXCLUTION LIST PROCESS----------------------
        $files = $request->file('file');
        $data = employees_oig_result::where(['YEARMONTH' => $yearmonth])->first();
        if ($data != null) {
            $request->session()->flash('alert-info', 'This report already excist!');
            return redirect()->route("exclutionList");
        } else {
            if ($request->hasFile('file')) {
                foreach ($files as $file) {




                    //---------------------CHECK EXCISTING RECORD IN THE DATABASE------------------

                    if (str_contains($file->getClientOriginalName(), 'EXCL') || str_contains($file->getClientOriginalName(), 'REIN')) {

                        //---------------MOVE THE FILE TO THE SERVER--------------------------------------

                        $file->move('./file_storage/', $file->getClientOriginalName());

                        $file_name = $file->getClientOriginalName();

                        //-----------CLEAR THE OIG TABLE FOR THE NEW DATA----------------------
                        $statement = "DELETE FROM oigs";

                        DB::connection()->getpdo()->exec($statement);
                        //------LOAD THE NEW DATA----------------------------
                        $statement1 = "LOAD DATA INFILE 'C:/wamp64/www/exclutinList1.2/public/file_storage/$file_name' INTO TABLE oigs 
                    FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES;";

                        DB::connection()->getpdo()->exec($statement1);
                    } else {
                        if (str_contains($file->getClientOriginalName(), 'Employee')) {

                            //-----------CLEAR THE EMPLOYEE TABLE FOR THE NEW DATA----------------------
                            $statement = "DELETE FROM employees";

                            DB::connection()->getpdo()->exec($statement);

                            //----------EMPLOYEES FILE LOADER-------------------------------------------
                            Excel::load($file, function ($reader) {

                                // Loop through all sheets
                                $reader->each(function ($sheet) {

                                    $array = $sheet->toArray();

                                    //get employee information

                                    $company_id = $array['company_id'];
                                    $name = $array['last_name_first_name'];
                                    $formatted_dob = explode('/', $array['birth_date']);
                                    $dob = $formatted_dob[2].$formatted_dob[0].$formatted_dob[1];
                                    $formatted_doh = explode('/', $array['date_hired']);
                                    $doh = $formatted_doh[2].$formatted_dob[0].$formatted_dob[1];

                                    employee::Create([
                                        'COMPANY_ID' => $company_id,
                                        'NAME' => $name,
                                        'DOB' => $dob,
                                        'DATE_HIRED' => $doh,
                                    ]);
                                });
                            });
                        } else {
                            $request->session()->flash('alert-warning', 'Please select a valid file!'.strpos($file->getClientOriginalName(), 'employee') >= 0);
                            return redirect()->route("exclutionList");
                        }
                    }
                }
            } else {
                $request->session()->flash('alert-warning', 'No file was selected, please select one!');
                return redirect()->route("exclutionList");
            }
        }

        //-----------EXCLUTION LIST PROCESS--------------------------
        $employee_list = employee::all();

        foreach ($employee_list as $value) {

            //---------GET EMPLOYEE INFORMATION---------------------

            $name = explode(",", $value->NAME);
            $employee['LAST'] = trim($name[0]);
            $employee['FIRST'] = trim($name[1]);
            $dob = trim($value->DOB);

            //--------FIND THE EMPLOYEE IN THE OIG LIST--------------

            $result = oig::where([
                'LASTNAME' => $employee['LAST'],
                'FIRSTNAME' => $employee['FIRST'],
                'DOB' => $dob,
            ])->first();

            if ($result != null) {

                employees_oig_result::Create([
                    'NAME' => $value['NAME'],
                    'DOB' => $value['DOB'],
                    'DATE_HIRED' => $value['DATE_HIRED'],
                    'YEARMONTH' => $yearmonth,
                    'OIG_RESULT' => 'FAILURE',
                    'EXCLTYPE' => $result->EXCLTYPE,
                ]);
            } else {
                employees_oig_result::Create([
                    'NAME' => $value['NAME'],
                    'DOB' => $value['DOB'],
                    'DATE_HIRED' => $value['DATE_HIRED'],
                    'YEARMONTH' => $yearmonth,
                    'OIG_RESULT' => 'PASS',
                    'EXCLTYPE' => 'NULL',
                ]);
            }
        }

        $request->session()->flash('alert-success', 'Exclusion List Complete!');
        return redirect()->route("exclutionList");
    }
}
