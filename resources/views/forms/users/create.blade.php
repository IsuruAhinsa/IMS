<form class="form-horizontal" action="{{ $route }}" method="POST" enctype="multipart/form-data">

    @csrf
    @if(Route::currentRouteName() == 'users.edit')
        @method('PUT')
    @endif

    <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="first_name"
                placeholder="Enter First Name"
                name="first_name"
                value="{{ $firstnameVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="last_name"
                placeholder="Enter Last Name"
                name="last_name"
                value="{{ $lastnameVal }}"
            >
        </div>
    </div>

    @if(Request::is('users/*'))

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input
                    type="password"
                    class="form-control rounded-0"
                    id="password"
                    placeholder="Enter Password"
                    name="password"
                >
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
            <div class="col-sm-9">
                <input
                    type="password"
                    class="form-control rounded-0"
                    id="password_confirmation"
                    placeholder="Re-enter Password"
                    name="password_confirmation"
                >
            </div>
        </div>

    @endif

    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input
                type="email"
                class="form-control rounded-0"
                id="email"
                placeholder="Enter Email"
                name="email"
                value="{{ $emailVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="phone"
                placeholder="Enter Phone Number"
                name="phone"
                value="{{ $phoneVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="website" class="col-sm-3 col-form-label">Website</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="website"
                placeholder="Enter Website"
                name="website"
                value="{{ $websiteVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="address"
                placeholder="Enter Address"
                name="address"
                value="{{ $addressVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-3 col-form-label">City</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="city"
                placeholder="Enter City"
                name="city"
                value="{{ $cityVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="state" class="col-sm-3 col-form-label">State</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="state"
                placeholder="Enter State"
                name="state"
                value="{{ $stateVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="zip" class="col-sm-3 col-form-label">Zip</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="zip"
                placeholder="Enter Zip"
                name="zip"
                value="{{ $zipVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="country" class="col-sm-3 col-form-label">Country</label>
        <div class="col-sm-9">
            <input
                type="text"
                class="form-control rounded-0"
                id="country"
                placeholder="Enter Country"
                name="country"
                value="{{ $countryVal }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="notes" class="col-sm-3 col-form-label">Notes</label>
        <div class="col-sm-9">
            <textarea
                class="form-control rounded-0"
                id="notes"
                placeholder="Notes"
                name="notes"
                rows="5"
            >{{ $notesVal }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-sm-3 col-form-label">Image</label>

        @if(Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'users.edit')

            @if(Auth::user()->image || isset($user->image))

                <div class="col-sm-2">

                    <img class="img-thumbnail img-fluid rounded-0" src="{{ asset('uploads/user/image/'. $imageVal) }}" alt="{{ $imageVal }}" width="100%">

                </div>

            @endif

        @endif

        <div class="@if(Route::currentRouteName() == 'profile' || Route::currentRouteName() == 'users.edit') @if(Auth::user()->image || isset($user->image)) col-sm-7 @else col-sm-9 @endif @else col-sm-9 @endif">
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

    <x-SubmitButton :btnText="$btnText"></x-SubmitButton>

</form>

@push('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
