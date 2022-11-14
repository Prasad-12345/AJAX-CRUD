<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empdata extends Model
{
    //
    protected $table = 'empdata';

    protected $fillable = [
        'firstName',
        'lastName',
        'city',
        'state',
        'email',
        'password',
        'company_id'
    ];
}
