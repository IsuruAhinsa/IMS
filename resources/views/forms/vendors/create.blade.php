<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'vendors.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="vendor_id" class="col-form-label">Vendor ID</label>
                <input
                    type="text"
                    id="vendor_id"
                    name="vendor_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Vendor ID"
                    value="{{ old('vendor_id', $vendor->vendor_id) }}"
                >
            </div>

            <div class="form-group">
                <label for="vendor_code" class="col-form-label">Vendor Code</label>
                <input
                    type="text"
                    id="vendor_code"
                    name="vendor_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Vendor Code"
                    value="{{ old('vendor_code', $vendor->vendor_code) }}"
                >
            </div>

            <div class="form-group">
                <label for="supplier_name" class="col-form-label">Supplier Name</label>
                <input
                    type="text"
                    id="supplier_name"
                    name="supplier_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Vendor Name"
                    value="{{ old('supplier_name', $vendor->supplier_name) }}"
                >
            </div>

            <div class="form-group">
                <label for="contact_person" class="col-form-label">Contact Person</label>
                <input
                    type="text"
                    id="contact_person"
                    name="contact_person"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Contact Person"
                    value="{{ old('contact_person', $vendor->contact_person) }}"
                >
            </div>

            <div class="form-group">
                <label for="address" class="col-form-label">Address</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Address"
                    value="{{ old('address', $vendor->address) }}"
                >
            </div>

            <div class="form-group">
                <label for="city" class="col-form-label">City</label>
                <input
                    type="text"
                    id="city"
                    name="city"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter City"
                    value="{{ old('city', $vendor->city) }}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="state_or_province" class="col-form-label">State / Province</label>
                <input
                    type="text"
                    id="state_or_province"
                    name="state_or_province"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter State or Province"
                    value="{{ old('state_or_province', $vendor->state_or_province) }}"
                >
            </div>

            <div class="form-group">
                <label for="postal_code" class="col-form-label">Postal Code</label>
                <input
                    type="text"
                    id="postal_code"
                    name="postal_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Postal Code"
                    value="{{ old('postal_code', $vendor->postal_code) }}"
                >
            </div>

            <div class="form-group">
                <label for="country" class="col-form-label">Country</label>
                <input
                    type="text"
                    id="country"
                    name="country"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Country"
                    value="{{ old('country', $vendor->country) }}"
                >
            </div>

            <div class="form-group">
                <label for="phone_number" class="col-form-label">Phone</label>
                <input
                    type="text"
                    id="phone_number"
                    name="phone_number"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Phone"
                    value="{{ old('phone_number', $vendor->phone_number) }}"
                >
            </div>

            <div class="form-group">
                <label for="fax_number" class="col-form-label">Fax</label>
                <input
                    type="text"
                    id="fax_number"
                    name="fax_number"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Fax"
                    value="{{ old('fax_number', $vendor->fax_number) }}"
                >
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Email"
                    value="{{ old('email', $vendor->email) }}"
                >
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('vendors.index')"></x-SubmitButton>

        </div>

    </div>

</form>
