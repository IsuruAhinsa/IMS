<form action="{{ route('hospitals.store') }}" method="POST">

    @csrf

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
                >
            </div>

        </div>

        <div class="col-md-6">

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
                <label for="telephone" class="col-form-label">Telephone</label>
                <input
                    type="text"
                    id="telephone"
                    name="telephone"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Telephone"
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

            <x-SubmitButton :btnText="'Create Hospital'" :cancelBtnRoute="route('hospitals.index')"></x-SubmitButton>

        </div>

    </div>

</form>
