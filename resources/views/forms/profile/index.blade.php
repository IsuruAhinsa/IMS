<form class="form-horizontal" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="first_name"
                placeholder="Enter First Name"
                name="first_name"
                value="{{ Auth::user()->first_name }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="last_name"
                placeholder="Enter Last Name"
                name="last_name"
                value="{{ Auth::user()->last_name }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input
                type="email"
                class="form-control rounded-0"
                id="email"
                placeholder="Enter Email"
                name="email"
                value="{{ Auth::user()->email }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="phone"
                placeholder="Enter Phone Number"
                name="phone"
                value="{{ Auth::user()->phone }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="website"
                placeholder="Enter Website"
                name="website"
                value="{{ Auth::user()->website }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="address"
                placeholder="Enter Address"
                name="address"
                value="{{ Auth::user()->address }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="city"
                placeholder="Enter City"
                name="city"
                value="{{ Auth::user()->city }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="state" class="col-sm-2 col-form-label">State</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="state"
                placeholder="Enter State"
                name="state"
                value="{{ Auth::user()->state }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="zip" class="col-sm-2 col-form-label">Zip</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="zip"
                placeholder="Enter Zip"
                name="zip"
                value="{{ Auth::user()->zip }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="country" class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="country"
                placeholder="Enter Country"
                name="country"
                value="{{ Auth::user()->country }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="notes" class="col-sm-2 col-form-label">Notes</label>
        <div class="col-sm-10">
            <textarea
                class="form-control rounded-0"
                id="notes"
                placeholder="Notes"
                name="notes"
                rows="5"
            >{{ Auth::user()->notes }}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>

        @if(!empty(Auth::user()->avatar))

            <div class="col-sm-2">

                <img class="img-thumbnail img-fluid rounded-0" src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" width="100%">

                <input
                    type="hidden"
                    name="current_avatar"
                    value="{{ Auth::user()->avatar }}"
                >

            </div>

        @endif

        <div class="@if(!empty(Auth::user()->avatar)) col-sm-8 @else col-sm-10 @endif">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input rounded-0"
                    id="avatar"
                    name="avatar"
                >
                <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                <small class="form-text text-muted">
                    Accepted filetypes are jpg, jpeg, png, gif, and svg. Max upload size allowed is 1024MB
                </small>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-right">
            <a href="{{ url('/') }}" class="btn btn-link">Cancel</a>
            <button
                type="submit"
                class="btn bg-gradient-indigo btn-flat"
            >
                <i class="fa fa-save mr-2"></i>
                Save Profile
            </button>
        </div>
    </div>

</form>

@push('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
