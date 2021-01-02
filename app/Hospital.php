<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;

    protected $table = 'hospitals';
    protected $primaryKey = 'hospital_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'hospital_id',
        'hospital_code',
        'hospital_name',
        'region',
        'address',
        'telephone',
        'fax',
        'email',
        'total_ppm',
        'total_assets',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dece',
        'wo_prefix',
        'wocm_slno',
        'wopm_slno',
        'hospital_code_prefix',
    ];

    /**
     * Get the assets for the hospital.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'hospital_id');
    }
}
