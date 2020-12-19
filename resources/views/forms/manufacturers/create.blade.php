<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'manufacturers.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="manufacturer_id" class="col-form-label">Manufacturer ID</label>
                <input
                    type="text"
                    id="manufacturer_id"
                    name="manufacturer_id"
                    class="form-control form-control-sm rounded-0 @error('manufacturer_id') is-invalid @enderror"
                    placeholder="Enter Manufacturer ID"
                    value="{{ $manufacturer_id }}"
                >
            </div>

            <div class="form-group">
                <label for="manufacturer_code" class="col-form-label">Manufacturer Code</label>
                <input
                    type="text"
                    id="manufacturer_code"
                    name="manufacturer_code"
                    class="form-control form-control-sm rounded-0 @error('manufacturer_code') is-invalid @enderror"
                    placeholder="Enter Manufacturer Code"
                    value="{{ $manufacturer_code }}"
                >
            </div>

            <div class="form-group">
                <label for="manufacturer_name" class="col-form-label">Manufacturer Name</label>
                <input
                    type="text"
                    id="manufacturer_name"
                    name="manufacturer_name"
                    class="form-control form-control-sm rounded-0 @error('manufacturer_name') is-invalid @enderror"
                    placeholder="Enter Manufacturer Name"
                    value="{{ $manufacturer_name }}"
                >
            </div>

            <div class="form-group">
                <label for="contact_person" class="col-form-label">Contact Person</label>
                <input
                    type="text"
                    id="contact_person"
                    name="contact_person"
                    class="form-control form-control-sm rounded-0 @error('contact_person') is-invalid @enderror"
                    placeholder="Enter Contact Person"
                    value="{{ $contact_person }}"
                >
            </div>

            <div class="form-group">
                <label for="address" class="col-form-label">Address</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    class="form-control form-control-sm rounded-0 @error('address') is-invalid @enderror"
                    placeholder="Enter Address"
                    value="{{ $address }}"
                >
            </div>

            <div class="form-group">
                <label for="city" class="col-form-label">City</label>
                <input
                    type="text"
                    id="city"
                    name="city"
                    class="form-control form-control-sm rounded-0 @error('city') is-invalid @enderror"
                    placeholder="Enter City"
                    value="{{ $city }}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="state" class="col-form-label">State / Province</label>
                <input
                    type="text"
                    id="state"
                    name="state_or_province"
                    class="form-control form-control-sm rounded-0 @error('state_or_province') is-invalid @enderror"
                    placeholder="Enter State or Province"
                    value="{{ $state_or_province }}"
                >
            </div>

            <div class="form-group">
                <label for="country" class="col-form-label">Country</label>
                <input
                    type="text"
                    id="country"
                    name="postal_code"
                    class="form-control form-control-sm rounded-0 @error('postal_code') is-invalid @enderror"
                    placeholder="Enter Country"
                    value="{{ $postal_code }}"
                >
            </div>

            <div class="form-group">
                <label for="postal_code" class="col-form-label">Postal Code</label>
                <input
                    type="text"
                    id="postal_code"
                    name="country"
                    class="form-control form-control-sm rounded-0 @error('country') is-invalid @enderror"
                    placeholder="Enter Postal Code"
                    value="{{ $country }}"
                >
            </div>

            <div class="form-group">
                <label for="phone" class="col-form-label">Phone</label>
                <input
                    type="text"
                    id="phone"
                    name="phone_number"
                    class="form-control form-control-sm rounded-0 @error('phone_number') is-invalid @enderror"
                    placeholder="Enter Phone"
                    value="{{ $phone_number }}"
                >
            </div>

            <div class="form-group">
                <label for="fax" class="col-form-label">Fax</label>
                <input
                    type="text"
                    id="fax"
                    name="fax_number"
                    class="form-control form-control-sm rounded-0 @error('fax_number') is-invalid @enderror"
                    placeholder="Enter Fax"
                    value="{{ $fax_number }}"
                >
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control form-control-sm rounded-0 @error('email') is-invalid @enderror"
                    placeholder="Enter Email"
                    value="{{ $email }}"
                >
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('manufacturers.index')"></x-SubmitButton>

        </div>

    </div>

</form>
