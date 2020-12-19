<form class="form-horizontal" action="{{ $route }}" method="POST" enctype="multipart/form-data">

    @csrf

    @if(Route::currentRouteName() == 'users.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="first_name"
                    placeholder="Enter First Name"
                    name="first_name"
                    value="{{ $firstnameVal }}"
                >
            </div>

            <div class="form-group">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="last_name"
                    placeholder="Enter Last Name"
                    name="last_name"
                    value="{{ $lastnameVal }}"
                >
            </div>

            @if(Request::is('users/*'))

                <div class="form-group">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <input
                        type="password"
                        class="form-control form-control-sm rounded-0"
                        id="password"
                        placeholder="Enter Password"
                        name="password"
                    >
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control form-control-sm rounded-0"
                        id="password_confirmation"
                        placeholder="Re-enter Password"
                        name="password_confirmation"
                    >
                </div>

            @endif

            <div class="form-group">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <input
                    type="email"
                    class="form-control form-control-sm rounded-0"
                    id="email"
                    placeholder="Enter Email"
                    name="email"
                    value="{{ $emailVal }}"
                >
            </div>

            @if(Route::currentRouteName() != 'profile')

                <div class="form-group">
                    <label for="roles" class="col-sm-3 col-form-label">Role</label>
                    <select
                        class="select2bs4 custom-select rounded-0"
                        id="roles"
                        name="roles[]"
                        data-placeholder="Select a Role"
                        multiple
                    >
                        @foreach($roles as $role)
                            <option
                                value="{{ $role->name }}"
                            @if(Route::currentRouteName() == 'users.edit')
                                {{ $user->hasRole($role->name) ? 'selected' : '' }}
                                @endif
                            >
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            @endif

            <div class="form-group">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="phone"
                    placeholder="Enter Phone Number"
                    name="phone"
                    value="{{ $phoneVal }}"
                >
            </div>

            <div class="form-group">
                <label for="website" class="col-sm-3 col-form-label">Website</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="website"
                    placeholder="Enter Website"
                    name="website"
                    value="{{ $websiteVal }}"
                >
            </div>

            <div class="form-group">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="address"
                    placeholder="Enter Address"
                    name="address"
                    value="{{ $addressVal }}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="city" class="col-sm-3 col-form-label">City</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="city"
                    placeholder="Enter City"
                    name="city"
                    value="{{ $cityVal }}"
                >
            </div>

            <div class="form-group">
                <label for="state" class="col-sm-3 col-form-label">State</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="state"
                    placeholder="Enter State"
                    name="state"
                    value="{{ $stateVal }}"
                >
            </div>

            <div class="form-group">
                <label for="zip" class="col-sm-3 col-form-label">Zip</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="zip"
                    placeholder="Enter Zip"
                    name="zip"
                    value="{{ $zipVal }}"
                >
            </div>

            <div class="form-group">
                <label for="country" class="col-sm-3 col-form-label">Country</label>
                <input
                    type="text"
                    class="form-control form-control-sm rounded-0"
                    id="country"
                    placeholder="Enter Country"
                    name="country"
                    value="{{ $countryVal }}"
                >
            </div>

            <div class="form-group">
                <label for="notes" class="col-sm-3 col-form-label">Notes</label>
                <textarea
                    class="form-control form-control-sm rounded-0"
                    id="notes"
                    placeholder="Notes"
                    name="notes" s="5"
                >{{ $notesVal }}</textarea>
            </div>

            <div class="form-group">
                <label for="image" class="col-form-label">Image</label>
                <div class="row">
                    @if(Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'users.edit')

                        @if(Auth::user()->image || isset($user->image))

                            <div class="col-md-2">

                                <img class="img-thumbnail img-fluid rounded-0" src="{{ asset('uploads/user/image/'. $imageVal) }}" alt="{{ $imageVal }}" width="100%">

                            </div>

                        @endif

                    @endif

                    <div class="@if(Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'users.edit') @if(Auth::user()->image || isset($user->image)) col-md-10 @else col-md-12 @endif @else col-md-12 @endif">
                        <div class="custom-file">
                            <input
                                type="file"
                                class="custom-file-input rounded-0"
                                id="image"
                                name="image"
                                @if($route == route('users.store'))
                                value="{{ $imageVal }}"
                                @endif
                            >
                            <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                            <small class="form-text text-muted">
                                Accepted filetypes are jpg, jpeg, png, gif, and svg. Max upload size allowed is 1024MB
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('users.index')"></x-SubmitButton>

        </div>

    </div>

</form>
