<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;

    protected $table = 'assets';
    protected $primaryKey = 'asset_id';

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
        'purchase_date',
        'warranty_end',
        'date_created',
    ];

    protected $fillable = [
        'asset_id',
        'brand',
        'model',
        'serial_no',
        'purchase_date',
        'warranty_period',
        'warranty_end',
        'warranty_status',
        'cost',
        'variation',
        'contract',
        'asset_condition',
        'remarks',
        'date_created',
        'created_by',
        'description',
        'asset_photo',
        'asset_photo2',
        'asset_photo3',
    ];

    /**
     * Get the accessories for the asset.
     */
    public function accessories()
    {
        return $this->hasMany(Accessory::class, 'asset_id');
    }

    /**
     * Get the hospital that owns the asset.
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'asset_id');
    }

    /**
     * Get the location that owns the asset.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'asset_id');
    }

    /**
     * Get the asset category that owns the asset.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'asset_id');
    }

    /**
     * Get the manufacturer that owns the asset.
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'asset_id');
    }

    /**
     * Get the department that owns the asset.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'asset_id');
    }

    /**
     * Get the department that owns the asset.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'asset_id');
    }

    /**
     * Get the contractor that owns the asset.
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'asset_id');
    }

    /**
     * Get the asset images for the asset.
     */
    public function images()
    {
        return $this->hasMany(AssetImage::class, 'asset_id');
    }
}
