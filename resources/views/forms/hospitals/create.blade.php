<form action="{{ route('hospitals.store') }}" method="POST">

    @csrf

    <div class="form-group row">
        <label for="hospital_id" class="col-md-2 col-form-label">Hospital ID</label>
        <div class="col-md-10">
            <input
                type="text"
                id="hospital_id"
                name="hospital_id"
                class="form-control rounded-0"
                placeholder="Enter Hospital ID"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="hospital_code" class="col-md-2 col-form-label">Hospital Code</label>
        <div class="col-md-10">
            <input
                type="text"
                id="hospital_code"
                name="hospital_code"
                class="form-control rounded-0"
                placeholder="Enter Hospital Code"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="hospital_name" class="col-md-2 col-form-label">Hospital Name</label>
        <div class="col-md-10">
            <input
                type="text"
                id="hospital_name"
                name="hospital_name"
                class="form-control rounded-0"
                placeholder="Enter Hospital Name"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="region" class="col-md-2 col-form-label">Region</label>
        <div class="col-md-10">
            <input
                type="text"
                id="region"
                name="region"
                class="form-control rounded-0"
                placeholder="Enter Region"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-md-2 col-form-label">Address</label>
        <div class="col-md-10">
            <input
                type="text"
                id="address"
                name="address"
                class="form-control rounded-0"
                placeholder="Enter Address"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="telephone" class="col-md-2 col-form-label">Telephone</label>
        <div class="col-md-10">
            <input
                type="text"
                id="telephone"
                name="telephone"
                class="form-control rounded-0"
                placeholder="Enter Telephone"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="fax" class="col-md-2 col-form-label">Fax</label>
        <div class="col-md-10">
            <input
                type="text"
                id="fax"
                name="fax"
                class="form-control rounded-0"
                placeholder="Enter Fax"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label">Email</label>
        <div class="col-md-10">
            <input
                type="email"
                id="email"
                name="email"
                class="form-control rounded-0"
                placeholder="Enter Email"
            >
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10 text-right">
            <a href="{{ url('/') }}" class="btn btn-link">Cancel</a>
            <button
                type="submit"
                class="btn bg-gradient-primary btn-flat"
            >
                <i class="fa fa-save mr-2"></i>
                Create Hospital
            </button>
        </div>
    </div>

</form>
