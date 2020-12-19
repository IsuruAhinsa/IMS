<form action="{{ route('contractors.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="reference_id" class="col-form-label">Reference ID</label>
                <input
                    type="text"
                    id="reference_id"
                    name="reference_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Reference ID"
                >
            </div>

            <div class="form-group">
                <label for="reference_code" class="col-form-label">Reference Code</label>
                <input
                    type="text"
                    id="reference_code"
                    name="reference_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Reference Code"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="contract_status">Contract Status</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="contract_status"
                    id="contract_status"
                >
                    <option selected disabled>Select Contract Status</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contractor_no" class="col-form-label">Contractor No</label>
                <input
                    type="text"
                    id="contractor_no"
                    name="contractor_no"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Contractor No"
                >
            </div>

            <div class="form-group">
                <label for="contractor_name" class="col-form-label">Contractor Name</label>
                <input
                    type="text"
                    id="contractor_name"
                    name="contractor_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Contractor Name"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-form-label" for="start_date">Start Date</label>
                <div class="input-group input-group-sm date" id="start_date" data-target-input="nearest">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0 datetimepicker-input"
                        data-target="#start_date"
                        id="start_date"
                        name="start_date"
                    />
                    <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                        <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="end_date">End Date</label>
                <div class="input-group input-group-sm date" id="end_date" data-target-input="nearest">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0 datetimepicker-input"
                        data-target="#end_date"
                        id="end_date"
                        name="end_date"
                    />
                    <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                        <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="type">Type</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="type"
                    id="type"
                >
                    <option selected disabled>Select Type</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contractor_value" class="col-form-label">Contractor Value</label>
                <input
                    type="text"
                    id="contractor_value"
                    name="contractor_value"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Contractor Value"
                >
            </div>

            <x-SubmitButton :btnText="'Create Contractor'" :cancelBtnRoute="route('contractors.index')"></x-SubmitButton>

        </div>

    </div>

</form>

@push('js')
    <script>
        $(function () {
            /* Date Picker */
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>

@endpush
