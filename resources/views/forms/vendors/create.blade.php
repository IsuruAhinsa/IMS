<form action="{{ route('vendors.store') }}" method="POST">

    @csrf

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
                >
            </div>

            <div class="form-group">
                <label for="vendor_name" class="col-form-label">Vendor Name</label>
                <input
                    type="text"
                    id="vendor_name"
                    name="vendor_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Vendor Name"
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
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="state" class="col-form-label">State / Province</label>
                <input
                    type="text"
                    id="state"
                    name="state"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter State or Province"
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
                >
            </div>

            <div class="form-group">
                <label for="phone" class="col-form-label">Phone</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Phone"
                >
            </div>

            <div class="form-group">
                <label for="fax" class="col-form-label">Fax</label>
                <input
                    type="text"
                    id="fax"
                    name="fax"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Fax"
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
                >
            </div>

            <x-SubmitButton :btnText="'Create Vendor'" :cancelBtnRoute="route('hospitals.index')"></x-SubmitButton>

        </div>

    </div>

</form>
