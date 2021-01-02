<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkOrder extends Model
{
    use SoftDeletes;

    protected $table = 'work_orders';
    protected $primaryKey = 'work_order_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = [
        'work_order_number',
        'wo_date',
        'wo_time',
        'location',
        'wo_type',
        'wo_schedule_type',
        'sr_number',
        'request_priority',
        'contact_person',
        'requestor_phone',
        'request_date',
        'request_time',
        'wo_comp_exp_date',
        'request_assess_name',
        'assigned_to',
        'call_attended_date',
        'call_attended_time',
        'problem_reported',
        'problem_observed',
        'action_taken',
        'cause_code',
        'problem_code',
        'wo_status',
        'work_start_date',
        'work_start_time',
        'completed_date',
        'completed_time',
        'engineer',
        'engineer_others',
        'request_comp_verif_name',
        'down_time',
        'man_hours',
    ];
}
