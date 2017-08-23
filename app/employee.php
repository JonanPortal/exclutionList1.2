<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'COMPANY_ID', 'NAME', 'DOB', 'DATE_HIRED',
    ];




}
