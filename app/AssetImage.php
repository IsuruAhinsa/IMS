<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    protected $table = 'asset_images';

    protected $fillable = [
        'asset_id',
        'image',
    ];

    /**
     * Get the asset that owns the image.
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'id');
    }
}
