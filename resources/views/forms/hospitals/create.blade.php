<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'hospitals.edit')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-6">

            <div class="form-group">
                <label for="hospital_id" class="col-form-label">Hospital ID</label>
                <input
                    type="text"
                    id="hospital_id"
                    name="hospital_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Hospital ID"
                    value="{{ old('hospital_id', $hospital->hospital_id) }}"
                >
            </div>

            <div class="form-group">
                <label for="hospital_code" class="col-form-label">Hospital Code</label>
                <input
                    type="text"
                    id="hospital_code"
                    name="hospital_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Hospital Code"
                    value="{{ old('hospital_code', $hospital->hospital_code) }}"
                >
            </div>

            <div class="form-group">
                <label for="hospital_name" class="col-form-label">Hospital Name</label>
                <input
                    type="text"
                    id="hospital_name"
                    name="hospital_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Hospital Name"
                    value="{{ old('hospital_name', $hospital->hospital_name) }}"
                >
            </div>

            <div class="form-group">
                <label for="region" class="col-form-label">Region</label>
                <input
                    type="text"
                    id="region"
                    name="region"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Region"
                    value="{{ old('region', $hospital->region) }}"
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
                    value="{{ old('address', $hospital->address) }}"
                >
            </div>

            <div class="form-group">
                <label for="telephone" class="col-form-label">Telephone</label>
                <input
                    type="text"
                    id="telephone"
                    name="telephone"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Telephone"
                    value="{{ old('telephone', $hospital->telephone) }}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="fax" class="col-form-label">Fax</label>
                <input
                    type="text"
                    id="fax"
                    name="fax"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Fax"
                    value="{{ old('fax', $hospital->fax) }}"
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
                    value="{{ old('email', $hospital->email) }}"
                >
            </div>

            <div class="form-group">
                <label for="wo_prefix" class="col-form-label">WO Prefix</label>
                <input
                    type="text"
                    id="wo_prefix"
                    name="wo_prefix"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter WO Prefix"
                    value="{{ old('region', $hospital->wo_prefix) }}"
                >
            </div>

            <div class="form-group">
                <label for="wocm_slno" class="col-form-label">WOCM SL No</label>
                <input
                    type="text"
                    id="wocm_slno"
                    name="wocm_slno"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter WOCM SL No"
                    value="{{ old('region', $hospital->wocm_slno) }}"
                >
            </div>

            <div class="form-group">
                <label for="wopm_slno" class="col-form-label">WOPM SL No</label>
                <input
                    type="text"
                    id="wopm_slno"
                    name="wopm_slno"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter WOPM SL No"
                    value="{{ old('region', $hospital->wopm_slno) }}"
                >
            </div>

            <div class="form-group">
                <label for="hospital_code_prefix" class="col-form-label">Hospital Code Prefix</label>
                <input
                    type="text"
                    id="hospital_code_prefix"
                    name="hospital_code_prefix"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Hospital Code Prefix"
                    value="{{ old('hospital_code_prefix', $hospital->hospital_code_prefix) }}"
                >
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('hospitals.index')"></x-SubmitButton>

        </div>

    </div>

</form>
