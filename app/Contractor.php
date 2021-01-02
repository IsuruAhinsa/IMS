<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use SoftDeletes;

    protected $table = 'contractors';
    protected $primaryKey = 'reference_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'reference_id',
        'end_date',
        'start_date',
        'contractor_value',
        'contractor_name',
        'contract_status',
        'type',
        'contractor_no',
        'reference_code',
    ];

    /**
     * Get the assets for the contractor.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'reference_id');
    }
}
