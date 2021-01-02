<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessory extends Model
{
    use SoftDeletes;

    protected $table = 'accessories';
    protected $primaryKey = 'asset_tag_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'asset_tag_id',
        'asset_tag',
        'asset_name',
        'asset_disacription',
        'asset_model',
        'asset_serial',
        'asset_manufacture',
    ];

    /**
     * Get the asset that owns the accessory.
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_tag_id');
    }
}
