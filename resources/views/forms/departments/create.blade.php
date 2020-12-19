<form action="{{ route('departments.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <label for="department_id" class="col-form-label">Department ID</label>
        <input
            type="text"
            id="department_id"
            name="department_id"
            class="form-control form-control-sm rounded-0"
            placeholder="Enter Department ID"
        >
    </div>

    <div class="form-group">
        <label for="department_code" class="col-form-label">Department Code</label>
        <input
            type="text"
            id="department_code"
            name="department_code"
            class="form-control form-control-sm rounded-0"
            placeholder="Enter Department Code"
        >
    </div>

    <div class="form-group">
        <label for="description" class="col-form-label">Description</label>
        <textarea
            name="description"
            id="description"
            cols="10"
            rows="5"
            class="form-control form-control-sm rounded-0"
            placeholder="Enter Description"
        ></textarea>
    </div>

    <x-SubmitButton :btnText="'Create Department'" :cancelBtnRoute="route('hospitals.index')"></x-SubmitButton>

</form>
