<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class companyData extends Model
{
    //
    protected $table = 'company_data';

    protected $fillable = [
        'companyName',
        'companyAddress',
        'companyLandmark',
        'companyCity',
        'companyState',
        'pincode'
    ];
}
