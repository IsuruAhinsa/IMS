<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="category_id" class="col-form-label">Category ID</label>
                <input
                    type="text"
                    id="category_id"
                    name="category_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Category ID"
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
                >
            </div>

            <div class="form-group">
                <label for="category_name" class="col-form-label">Category Name</label>
                <input
                    type="text"
                    id="category_name"
                    name="category_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Category Name"
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
                ></textarea>
            </div>

            <div class="form-group">
                <label for="asset_type" class="col-form-label">Asset Type</label>
                <input
                    type="text"
                    id="asset_type"
                    name="asset_type"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Type"
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
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
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
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
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
                    <option>Level 01</option>
                    <option>Level 02</option>
                    <option>Level 03</option>
                    <option>Level 04</option>
                    <option>Level 05</option>
                    <option>Level 06</option>
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
                ></textarea>
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
                ></textarea>
            </div>

            <div class="form-group">
                <label for="est_service_life" class="col-form-label">EST Service Life</label>
                <input
                    type="text"
                    id="est_service_life"
                    name="est_service_life"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter EST Service Life"
                >
            </div>

            <x-SubmitButton :btnText="'Create Category'" :cancelBtnRoute="route('categories.index')"></x-SubmitButton>

        </div>

    </div>

</form>
