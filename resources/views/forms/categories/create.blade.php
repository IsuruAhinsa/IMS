<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'categories.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="asset_category_id" class="col-form-label">Category ID</label>
                <input
                    type="text"
                    id="asset_category_id"
                    name="asset_category_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Category ID"
                    value="{{ old('asset_category_id', $category->asset_category_id)}}"
                >
            </div>

            <div class="form-group">
                <label for="ecri_code" class="col-form-label">ECRI Code</label>
                <input
                    type="text"
                    id="ecri_code"
                    name="ecri_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter ECRI Code"
                    value="{{ old('ecri_code', $category->ecri_code)}}"
                >
            </div>

            <div class="form-group">
                <label for="asset_category" class="col-form-label">Category Name</label>
                <input
                    type="text"
                    id="asset_category"
                    name="asset_category"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Category Name"
                    value="{{ old('asset_category', $category->asset_category)}}"
                >
            </div>

            <div class="form-group">
                <label for="asset_definition" class="col-form-label">Asset Definition</label>
                <textarea
                    name="asset_definition"
                    id="asset_definition"
                    cols="10"
                    rows="5"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Definition"
                >{{ old('asset_definition', $category->asset_definition) }}</textarea>
            </div>

            <div class="form-group">
                <label for="asset_type" class="col-form-label">Asset Type</label>
                <input
                    type="text"
                    id="asset_type"
                    name="asset_type"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Type"
                    value="{{ old('asset_type', $category->asset_type)}}"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="classification">Classification</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="classification"
                    id="classification"
                >
                    <option selected disabled>Select Classification</option>
                    <option {{ old('classification', $category->classification) == 'General' ? 'selected' : '' }} value="General">General</option>
                    <option {{ old('classification', $category->classification) == 'Therapeutic' ? 'selected' : '' }} value="Therapeutic">Therapeutic</option>
                    <option {{ old('classification', $category->classification) == 'Diagnostic' ? 'selected' : '' }} value="Diagnostic">Diagnostic</option>
                    <option {{ old('classification', $category->classification) == 'Laboratory' ? 'selected' : '' }} value="Laboratory">Laboratory</option>
                    <option {{ old('classification', $category->classification) == 'Life Support' ? 'selected' : '' }} value="Life Support">Life Support</option>
                    <option {{ old('classification', $category->classification) == 'Washington' ? 'selected' : '' }} value="Washington">Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pm_hours" class="col-form-label">PM Hours</label>
                <input
                    type="text"
                    id="pm_hours"
                    name="pm_hours"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter PM Hours"
                    value="{{ old('pm_hours', $category->pm_hours)}}"
                >
            </div>

            <div class="form-group">
                <label for="task_no" class="col-form-label">Task No</label>
                <input
                    type="text"
                    id="task_no"
                    name="task_no"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Task No"
                    value="{{ old('task_no', $category->task_no)}}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="pm_frequency" class="col-form-label">PM Frequency</label>
                <input
                    type="text"
                    id="pm_frequency"
                    name="pm_frequency"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter PM Frequency"
                    value="{{ old('pm_frequency', $category->pm_frequency)}}"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="fda_risk">FDA Risk</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="fda_risk"
                    id="fda_risk"
                >
                    <option selected disabled>Select FDA Risk</option>
                    <option {{ old('fda_risk', $category->fda_risk) == 'NO RISK' ? 'selected' : '' }} value="NO RISK">NO RISK</option>
                    <option {{ old('fda_risk', $category->fda_risk) == 'Low Risk' ? 'selected' : '' }} value="Low Risk">Low Risk</option>
                    <option {{ old('fda_risk', $category->fda_risk) == 'Medium Risk' ? 'selected' : '' }} value="Medium Risk">Medium Risk</option>
                    <option {{ old('fda_risk', $category->fda_risk) == 'High Risk' ? 'selected' : '' }} value="High Risk">High Risk</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="proficiency_level">Proficiency Level</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="proficiency_level"
                    id="proficiency_level"
                >
                    <option selected disabled>Select Proficiency Level</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 0 ? 'selected' : '' }} value="0">Level 0</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 1 ? 'selected' : '' }} value="1">Level 01</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 2 ? 'selected' : '' }} value="2">Level 02</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 3 ? 'selected' : '' }} value="3">Level 03</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 4 ? 'selected' : '' }} value="4">Level 04</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 5 ? 'selected' : '' }} value="5">Level 05</option>
                    <option {{ old('proficiency_level', $category->proficiency_level) == 6 ? 'selected' : '' }} value="6">Level 06</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tools_required" class="col-form-label">Required Tools</label>
                <textarea
                    name="tools_required"
                    id="tools_required"
                    cols="10"
                    rows="5"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Required Tools"
                >{{ old('tools_required', $category->tools_required) }}</textarea>
            </div>

            <div class="form-group">
                <label for="safety_instructions" class="col-form-label">Safety Instructions</label>
                <textarea
                    name="safety_instructions"
                    id="safety_instructions"
                    cols="10"
                    rows="5"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Safety Instructions"
                >{{ old('safety_instructions', $category->safety_instructions) }}</textarea>
            </div>

            <div class="form-group">
                <label for="est_service_life" class="col-form-label">EST Service Life</label>
                <input
                    type="text"
                    id="est_service_life"
                    name="est_service_life"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter EST Service Life"
                    value="{{ old('est_service_life', $category->est_service_life)}}"
                >
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('categories.index')"></x-SubmitButton>

        </div>

    </div>

</form>
