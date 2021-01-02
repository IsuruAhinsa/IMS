<?php

namespace App\Http\Controllers;

use App\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $work_orders = WorkOrder::onlyTrashed()->get();
        } else {
            $work_orders = WorkOrder::all();
        }
        return view('work_orders.index')->with(compact('work_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('work_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $workOrder = new WorkOrder;
        $workOrder->work_order_id = $request->input('work_order_id');
        $workOrder->work_order_number = $request->input('work_order_number');
        $workOrder->wo_date = $request->input('wo_date');
        $workOrder->wo_time = $request->input('wo_time');
        $workOrder->location = $request->input('location');
        $workOrder->wo_type = $request->input('wo_type');
        $workOrder->wo_schedule_type = $request->input('wo_schedule_type');
        $workOrder->sr_number = $request->input('sr_number');
        $workOrder->request_priority = $request->input('request_priority');
        $workOrder->contact_person = $request->input('contact_person');
        $workOrder->requestor_phone = $request->input('requestor_phone');
        $workOrder->request_date = $request->input('request_date');
        $workOrder->request_time = $request->input('request_time');
        $workOrder->wo_comp_exp_date = $request->input('wo_comp_exp_date');
        $workOrder->request_assess_name = $request->input('request_assess_name');
        $workOrder->assigned_to = $request->input('assigned_to');
        $workOrder->call_attended_date = $request->input('call_attended_date');
        $workOrder->call_attended_time = $request->input('call_attended_time');
        $workOrder->problem_reported = $request->input('problem_reported');
        $workOrder->problem_observed = $request->input('problem_observed');
        $workOrder->action_taken = $request->input('action_taken');
        $workOrder->cause_code = $request->input('cause_code');
        $workOrder->problem_code = $request->input('problem_code');
        $workOrder->wo_status = $request->input('wo_status');
        $workOrder->work_start_date = $request->input('work_start_date');
        $workOrder->work_start_time = $request->input('work_start_time');
        $workOrder->completed_date = $request->input('completed_date');
        $workOrder->completed_time = $request->input('completed_time');
        $workOrder->engineer = $request->input('engineer');
        $workOrder->engineer_others = $request->input('engineer_others');
        $workOrder->request_comp_verif_name = $request->input('request_comp_verif_name');
        $workOrder->down_time = $request->input('down_time');
        $workOrder->man_hours = $request->input('man_hours');
        $workOrder->save();

        return redirect()->route('work_orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(WorkOrder $workOrder)
    {
        return view('work_orders.view')->with('workOrder', $workOrder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(WorkOrder $workOrder)
    {
        return view('work_orders.edit')->with('workOrder', $workOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        $workOrder->work_order_id = $request->input('work_order_id');
        $workOrder->work_order_number = $request->input('work_order_number');
        $workOrder->wo_date = $request->input('wo_date');
        $workOrder->wo_time = $request->input('wo_time');
        $workOrder->location = $request->input('location');
        $workOrder->wo_type = $request->input('wo_type');
        $workOrder->wo_schedule_type = $request->input('wo_schedule_type');
        $workOrder->sr_number = $request->input('sr_number');
        $workOrder->request_priority = $request->input('request_priority');
        $workOrder->contact_person = $request->input('contact_person');
        $workOrder->requestor_phone = $request->input('requestor_phone');
        $workOrder->request_date = $request->input('request_date');
        $workOrder->request_time = $request->input('request_time');
        $workOrder->wo_comp_exp_date = $request->input('wo_comp_exp_date');
        $workOrder->request_assess_name = $request->input('request_assess_name');
        $workOrder->assigned_to = $request->input('assigned_to');
        $workOrder->call_attended_date = $request->input('call_attended_date');
        $workOrder->call_attended_time = $request->input('call_attended_time');
        $workOrder->problem_reported = $request->input('problem_reported');
        $workOrder->problem_observed = $request->input('problem_observed');
        $workOrder->action_taken = $request->input('action_taken');
        $workOrder->cause_code = $request->input('cause_code');
        $workOrder->problem_code = $request->input('problem_code');
        $workOrder->wo_status = $request->input('wo_status');
        $workOrder->work_start_date = $request->input('work_start_date');
        $workOrder->work_start_time = $request->input('work_start_time');
        $workOrder->completed_date = $request->input('completed_date');
        $workOrder->completed_time = $request->input('completed_time');
        $workOrder->engineer = $request->input('engineer');
        $workOrder->engineer_others = $request->input('engineer_others');
        $workOrder->request_comp_verif_name = $request->input('request_comp_verif_name');
        $workOrder->down_time = $request->input('down_time');
        $workOrder->man_hours = $request->input('man_hours');
        $workOrder->save();

        return redirect()->route('work_orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();
        return back()->with('success', 'The Order was deleted successfully.');
    }

    public function restore($work_order_id = null)
    {
        WorkOrder::onlyTrashed()->where('work_order_id', $work_order_id)->restore();
        return redirect()->route('work_orders.index')->with('success', 'Order restored successfully.');
    }

    public function fdelete($work_order_id = null)
    {
        WorkOrder::onlyTrashed()->where('work_order_id', $work_order_id)->forceDelete();
        return back()->with('success', 'The Order was permanently deleted successfully.');
    }
}
