<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'departments.edit')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="department_id" class="col-form-label">Department ID</label>
        <input
            type="text"
            id="department_id"
            name="department_id"
            class="form-control form-control-sm rounded-0"
            placeholder="Enter Department ID"
            value="{{ old('department_id', $department->department_id) }}"
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
            value="{{ old('department_code', $department->department_code) }}"
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
        >{{ old('description', $department->description) }}</textarea>
    </div>

    <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('departments.index')"></x-SubmitButton>

</form>
