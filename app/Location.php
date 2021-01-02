<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';
    protected $primaryKey = 'location_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'location_id',
        'location_code',
        'description',
    ];

    /**
     * Get the assets for the location.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'location_id');
    }
}
