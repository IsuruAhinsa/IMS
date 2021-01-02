<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'asset_categories';
    protected $primaryKey = 'asset_category_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'asset_category_id',
        'asset_id',
        'ecri_code',
        'asset_category',
        'asset_definition',
        'asset_type',
        'classification',
        'pm_hours',
        'task_no',
        'pm_frequency',
        'fda_risk',
        'proficiency_level',
        'tools_required',
        'safety_instructions',
        'est_service_life',
    ];

    /**
     * Get the assets for the asset category.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class, 'asset_category_id');
    }
}
