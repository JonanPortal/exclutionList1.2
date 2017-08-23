<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{

    protected $table = 'companys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'COMPANY_CODE', 'COMPANY_NAME',
    ];
}
