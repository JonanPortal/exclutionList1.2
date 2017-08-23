<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees_oig_result extends Model
{


    protected $table = 'employee_oig_results';


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'YEARMONTH', 'OIG_RESULT', 'EXCLTYPE', 'NAME', 'DOB', 'DATE_HIRED',
    ];



}
