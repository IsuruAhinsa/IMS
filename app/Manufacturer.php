<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;

    protected $table = 'manufacturers';
    protected $primaryKey = 'manufacturer_id';

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
        'manufacturer_id',
        'manufacturer_code',
        'manufacturer_name',
        'contact_person',
        'address',
        'city',
        'state_or_province',
        'postal_code',
        'country',
        'phone_number',
        'fax_number',
        'email',
    ];

    /**
     * Get the assets for the manufacturer.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'manufacturer_id');
    }
}
