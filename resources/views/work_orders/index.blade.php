@extends('layouts.app')

{{-- page title --}}
@section('title', 'Orders')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>
                        <i class="fas fa-briefcase mr-2"></i>
                        {{ request('status') != 'deleted' ? 'Orders' : 'Deleted Orders' }}
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                        @if(request('status') == 'deleted')
                            <li class="breadcrumb-item"><a href="{{ route('work-orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active">Deleted Orders</li>
                        @else
                            <li class="breadcrumb-item active">Orders</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-{{ $commonSetting ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body">

                            <div class="text-right mb-2">

                                @if(request('status') == 'deleted')

                                    <a href="{{ route('work-orders.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Current Orders</a>

                                @else

                                    <a href="{{ route('work-orders.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Show Deleted Orders</a>

                                @endif

                                <a href="{{ route('work-orders.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> Create Order</a>

                            </div>

                            @if(session()->has('success'))
                                <x-Alert type="success" :message="session()->get('success')"></x-Alert>
                            @endif

                            @if($errors->any())
                                <x-Alert type="danger" :message="$errors->first()"></x-Alert>
                            @endif

                            <table id="example" class="table table-sm table-hover table-borderless" style="width:100%">
                                <thead>
                                <tr>
                                    <th>
                                        Order Number
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Time
                                    </th>
                                    <th>
                                        Location
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                    <th>
                                        Schedule Type
                                    </th>
                                    <th>
                                        SR Number
                                    </th>
                                    <th>
                                        Request Priority
                                    </th>
                                    <th>
                                        Contact Person
                                    </th>
                                    <th>
                                        Requestor Phone
                                    </th>
                                    <th>
                                        Request Date
                                    </th>
                                    <th>
                                        Request Time
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($work_orders as $work_order)
                                    <tr>
                                        <td>{{ $work_order->first_name ? $work_order->first_name : '-' }}</td>
                                        <td>{{ $work_order->first_name ? $work_order->first_name : '-' }}</td>
                                        <td>{{ $work_order->last_name ? $work_order->last_name : '-' }}</td>
                                        <td>{{ $work_order->email ? $work_order->email : '-' }}</td>
                                        <td>{{ $work_order->phone ? $work_order->phone : '-' }}</td>
                                        <td>{{ $work_order->website ? $work_order->website : '-' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $work_order->created_at->toDateString() }}</td>
                                        <td class="text-center">
                                            <x-ActionButtonGroup
                                                :viewRoute="route('work_orders.show', $work_order->id)"
                                                :editRoute="route('work_orders.edit', $work_order->id)"
                                                :deleteRoute="route('work_orders.destroy', $work_order->id)"
                                                :forceDeleteRoute="route('work_orders.fdelete', $work_order->id)"
                                                :restoreRoute="route('work_orders.restore', $work_order->id)"
                                            ></x-ActionButtonGroup>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
