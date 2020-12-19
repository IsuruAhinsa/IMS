<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'department_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'department_id',
        'department_code',
        'description',
    ];
}
