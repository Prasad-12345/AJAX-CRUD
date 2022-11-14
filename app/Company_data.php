<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_data extends Model
{
    //
    protected $table = 'company_data';

    protected $fillable = [
        'companyName',
        'companyAddress',
        'companyLandmark',
        'companyCity',
        'companystate',
        'pincode'
    ];
}
