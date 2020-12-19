<form action="{{ route('assets.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="id" class="col-form-label">Asset ID</label>
                <input
                    type="text"
                    id="id"
                    name="id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Asset ID"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="hospital">Hospital</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="hospital"
                            id="hospital"
                        >
                            <option selected disabled>Select Hospital</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="brand" class="col-form-label">Brand</label>
                <input
                    type="text"
                    id="brand"
                    name="brand"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Brand"
                >
            </div>

            <div class="form-group">
                <label for="model" class="col-form-label">Model</label>
                <input
                    type="text"
                    id="model"
                    name="model"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Model"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="serial">Serial Number</label>
                <input
                    type="text"
                    id="serial"
                    name="serial"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Serial Number"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="purchase_date">Purchase Date</label>
                <div class="input-group input-group-sm date" id="purchase_date" data-target-input="nearest">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0 datetimepicker-input"
                        data-target="#purchase_date"
                        id="purchase_date"
                        name="purchase_date"
                    />
                    <div class="input-group-append" data-target="#purchase_date" data-toggle="datetimepicker">
                        <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="warranty_period">Warranty Period</label>
                <div class="input-group input-group-sm">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0"
                        name="warranty_period"
                        id="warranty_period"
                    >
                    <div class="input-group-append">
                        <span class="input-group-text rounded-0">months</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="warranty_end_date">Warranty End Date</label>
                <div class="input-group input-group-sm date" id="warranty_end_date" data-target-input="nearest">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0 datetimepicker-input"
                        data-target="#warranty_end_date"
                        id="warranty_end_date"
                        name="warranty_end_date"
                    />
                    <div class="input-group-append" data-target="#warranty_end_date" data-toggle="datetimepicker">
                        <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="warranty_status">Warranty Status</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="warranty_status"
                    id="warranty_status"
                >
                    <option selected disabled>Select Status</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="cost">Cost</label>
                <div class="input-group input-group-sm">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0"
                        name="cost"
                        id="cost"
                    >
                    <div class="input-group-append">
                        <span class="input-group-text rounded-0">$</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-form-label" for="variation">Variation</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="variation"
                    id="variation"
                >
                    <option selected disabled>Select Variation</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="contract">Contractor</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="contract"
                    id="contract"
                >
                    <option selected disabled>Select Contractor</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="asset_condition">Asset Condition</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="asset_condition"
                    id="asset_condition"
                >
                    <option selected disabled>Select Asset Condition</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="remarks">Remarks</label>
                <input
                    type="text"
                    id="remarks"
                    name="remarks"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Remarks"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    cols="5"
                    rows="5"
                    class="form-control form-control-sm rounded-0"
                ></textarea>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="location">Location</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="location"
                            id="location"
                        >
                            <option selected disabled>Select Location</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="#" class="btn bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="col-form-label">Images</label>
                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input rounded-0"
                        id="image"
                        name="image"
                        multiple
                    >
                    <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                    <small class="form-text text-muted">
                        Accepted filetypes are jpg, jpeg, png, gif, and svg. Max upload size allowed is 1024MB
                    </small>
                </div>
            </div>

            <x-SubmitButton :btnText="'Save Asset'" :cancelBtnRoute="route('assets.index')"></x-SubmitButton>

        </div>

    </div>

</form>

@push('js')

    <script>
        $(function () {
            /* Date Picker */
            $('#purchase_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#warranty_end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>

@endpush
