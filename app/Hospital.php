<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'hospital_id',
        'asset_id',
        'hospital_code',
        'hospital_name',
        'region',
        'address',
        'telephone',
        'fax',
        'email',
    ];
}
