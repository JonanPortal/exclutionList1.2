<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class oig extends Model
{

    protected $table = 'oigs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'LASTNAME', 'FIRSTNAME', 'MIDNAME', 'BUSNAME', 'GENERAL', 'ESPECIALTY', 'UPIN','NPI', 'DOB'
        , 'ADDRESS', 'CITY', 'STATE', 'ZIP', 'EXCLTYPE','EXCLDATE','REINDATE','WAIVERDATE','WVRSTATE',
    ];

    protected $primaryKe = 'false';
    public $incrementing = 'false';

}
