<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'vendor_id';

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
        'vendor_id',
        'vendor_code',
        'supplier_name',
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
     * Get the assets for the vendor.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'vendor_id');
    }
}
