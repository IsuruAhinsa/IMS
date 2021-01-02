<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SparePart extends Model
{
    use SoftDeletes;

    protected $table = 'spares_used';
    protected $primaryKey = 'spare_id';

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
        'spare_id',
        'spare_code',
        'part_number',
        'part_description',
        'qty',
        'unit_price',
    ];
}
