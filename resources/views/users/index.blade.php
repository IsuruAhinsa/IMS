@extends('layouts.app')

{{-- page title --}}
@section('title', 'Users')

{{-- page content --}}
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-friends mr-2"></i>
                        Users
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-{{ $commonSetting->skin ? $commonSetting->skin : 'primary' }} card-outline">
                        <div class="card-body">
                            <table id="example" class="table table-sm table-hover table-borderless" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\User::all() as $user)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/user/avatar/' . $user->avatar) }}" alt="" class="img-fluid" width="32">
                                            </td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->website }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <th>
                                                <div class="btn-group">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v text-danger"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right border-0" role="menu">
                                                        <a href="{{ route('users.show', [$user->id]) }}" class="dropdown-item"><i class="far fa-eye mr-2"></i> View</a>
                                                        <a href="{{ route('users.edit', [$user->id]) }}" class="dropdown-item"><i class="far fa-edit mr-2"></i> Edit</a>
                                                        <a href="{{ route('users.destroy', [$user->id]) }}" class="dropdown-item text-danger"><i class="far fa-trash-alt mr-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </th>
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
