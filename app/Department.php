<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'department_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'department_id',
        'department_code',
        'description',
    ];

    /**
     * Get the assets for the department.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'department_id');
    }
}
