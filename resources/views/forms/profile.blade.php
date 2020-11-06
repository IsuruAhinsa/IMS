<form class="form-horizontal" action="#" method="POST">

    @csrf

    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input
                type="email"
                class="form-control"
                id="first_name"
                placeholder="Enter First Name"
                name="first_name"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input
                type="email"
                class="form-control"
                id="last_name"
                placeholder="Enter Last Name"
                name="last_name"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter Email"
                name="email"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="phone"
                placeholder="Enter Phone Number"
                name="phone"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="website"
                placeholder="Enter Website"
                name="website"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="address"
                placeholder="Enter Address"
                name="address"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="city"
                placeholder="Enter City"
                name="city"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="state" class="col-sm-2 col-form-label">State</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="state"
                placeholder="Enter State"
                name="state"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="zip" class="col-sm-2 col-form-label">Zip</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="zip"
                placeholder="Enter Zip"
                name="zip"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="country" class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control"
                id="country"
                placeholder="Enter Country"
                name="country"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="notes" class="col-sm-2 col-form-label">Notes</label>
        <div class="col-sm-10">
            <textarea
                class="form-control"
                id="notes"
                placeholder="Notes"
                name="notes"
                rows="5"
            ></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input"
                    id="avatar"
                    name="avatar"
                >
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-right">
            <button
                type="submit"
                class="btn btn-primary"
            >Save Profile</button>
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
