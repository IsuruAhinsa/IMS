<form action="{{ $route }}" method="POST" enctype="multipart/form-data">

    @csrf

    @if(Route::currentRouteName() == 'assets.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="text-center">
                <h3><span class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">eFEMS</span></h3>
            </div>

            <div class="form-group">
                <label for="asset_id" class="col-form-label">Asset ID</label>
                <input
                    type="text"
                    id="asset_id"
                    name="asset_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset ID"
                    value="{{ old('asset_id', $asset->asset_id)}}"
                >
            </div>

            <div class="form-group">
                <label for="brand" class="col-form-label">Brand</label>
                <input
                    type="text"
                    id="brand"
                    name="brand"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Brand"
                    value="{{ old('brand', $asset->brand) }}"
                >
            </div>

            <div class="form-group">
                <label for="model" class="col-form-label">Model</label>
                <input
                    type="text"
                    id="model"
                    name="model"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Model"
                    value="{{ old('model', $asset->model) }}"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="serial_no">Serial Number</label>
                <input
                    type="text"
                    id="serial_no"
                    name="serial_no"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Serial Number"
                    value="{{ old('serial_no', $asset->serial_no) }}"
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
                        placeholder="Enter Purchase Date"
                        value="{{ old('purchase_date', $asset->purchase_date) }}"
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
                        placeholder="Enter Warranty Period"
                        value="{{ old('warranty_period', $asset->warranty_period) }}"
                    >
                    <div class="input-group-append">
                        <span class="input-group-text rounded-0">months</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="warranty_end_date">Warranty End Date</label>
                <div class="input-group input-group-sm date" id="warranty_end" data-target-input="nearest">
                    <input
                        type="text"
                        class="form-control form-control-sm rounded-0 datetimepicker-input"
                        data-target="#warranty_end"
                        id="warranty_end"
                        name="warranty_end"
                        placeholder="Enter Warranty End Date"
                        value="{{ old('warranty_end', $asset->warranty_end) }}"
                    />
                    <div class="input-group-append" data-target="#warranty_end" data-toggle="datetimepicker">
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
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Status 1' ? 'selected' : '' }} value="Status 1">Status 1</option>
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Status 2' ? 'selected' : '' }} value="Status 2">Status 2</option>
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Status 3' ? 'selected' : '' }} value="Status 3">Status 3</option>
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Status 4' ? 'selected' : '' }} value="Status 4">Status 4</option>
                    <option {{ old('warranty_status', $asset->warranty_status) == 'Status 5' ? 'selected' : '' }} value="Status 5">Status 5</option>
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
                        placeholder="Enter Cost"
                        value="{{ old('cost', $asset->cost) }}"
                    >
                    <div class="input-group-append">
                        <span class="input-group-text rounded-0">$</span>
                    </div>
                </div>
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
                    <option {{ old('asset_condition', $asset->asset_condition) == 'Asset Condition 1' ? 'selected' : '' }} value="Asset Condition 1">Asset Condition 1</option>
                    <option {{ old('asset_condition', $asset->asset_condition) == 'Asset Condition 2' ? 'selected' : '' }} value="Asset Condition 2">Asset Condition 2</option>
                    <option {{ old('asset_condition', $asset->asset_condition) == 'Asset Condition 3' ? 'selected' : '' }} value="Asset Condition 3">Asset Condition 3</option>
                    <option {{ old('asset_condition', $asset->asset_condition) == 'Asset Condition 4' ? 'selected' : '' }} value="Asset Condition 4">Asset Condition 4</option>
                    <option {{ old('asset_condition', $asset->asset_condition) == 'Asset Condition 5' ? 'selected' : '' }} value="Asset Condition 5">Asset Condition 5</option>
                </select>
            </div>

        </div>

        <div class="col-md-6">

            <div class="text-center">
                <h3><span class="badge bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}">BEMS</span></h3>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="hospital_id">Hospital</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="hospital_id"
                            id="hospital_id"
                        >
                            <option selected disabled>Select Hospital</option>
                            @foreach($hospitals as $hospital)
                                <option
                                    {{ old('hospital_id', $asset->hospital_id) == $hospital->hospital_id ? 'selected' : '' }}
                                    value="{{ $hospital->hospital_id }}"
                                >{{ $hospital->hospital_code . " - " . $hospital->hospital_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="#" class="btn btn-sm bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="department_id">Department</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="department_id"
                            id="department_id"
                        >
                            <option selected disabled>Select Department</option>
                            @foreach($departments as $department)
                                <option
                                    {{ old('department_id', $asset->department_id) == $department->department_id ? 'selected' : '' }}
                                    value="{{ $department->department_id }}"
                                >{{ $department->department_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="#" class="btn btn-sm bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="manufacturer_id">Manufacturer</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="manufacturer_id"
                            id="manufacturer_id"
                        >
                            <option selected disabled>Select Manufacturer</option>
                            @foreach($manufacturers as $manufacturer)
                                <option
                                    {{ old('manufacturer_id', $asset->manufacturer_id) == $manufacturer->manufacturer_id ? 'selected' : '' }}
                                    value="{{ $manufacturer->manufacturer_id }}"
                                >{{ $manufacturer->manufacturer_code . " - " . $manufacturer->manufacturer_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="#" class="btn btn-sm bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="vendor_id">Vendor</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="vendor_id"
                            id="vendor_id"
                        >
                            <option selected disabled>Select Vendor</option>
                            @foreach($vendors as $vendor)
                                <option
                                    {{ old('vendor_id', $asset->vendor_id) == $vendor->vendor_id ? 'selected' : '' }}
                                    value="{{ $vendor->vendor_id }}"
                                >{{ $vendor->vendor_code . " - " . $vendor->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="#" class="btn btn-sm bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="variation">Variation</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="variation"
                    id="variation"
                >
                    <option selected disabled>Select Variation</option>
                    <option {{ old('variation', $asset->variation) == 'Variation 1' ? 'selected' : '' }} value="Variation 1">Variation 1</option>
                    <option {{ old('variation', $asset->variation) == 'Variation 2' ? 'selected' : '' }} value="Variation 2">Variation 2</option>
                    <option {{ old('variation', $asset->variation) == 'Variation 3' ? 'selected' : '' }} value="Variation 3">Variation 3</option>
                    <option {{ old('variation', $asset->variation) == 'Variation 4' ? 'selected' : '' }} value="Variation 4">Variation 4</option>
                    <option {{ old('variation', $asset->variation) == 'Variation 5' ? 'selected' : '' }} value="Variation 5">Variation 5</option>
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
                    @foreach($contractors as $contractor)
                        <option
                            {{ old('contract', $asset->contract) == $contractor->contractor_name ? 'selected' : '' }}
                            value="{{ $contractor->contractor_name }}"
                        >{{ $contractor->reference_code . " - " . $contractor->contractor_name }}</option>
                    @endforeach
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
                    value="{{ old('remarks', $asset->remarks) }}"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    class="form-control form-control-sm rounded-0"
                >{{ old('description', $asset->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="location_id">Location</label>
                <div class="row">
                    <div class="col-md-10">
                        <select
                            class="form-control form-control-sm select2bs4 rounded-0"
                            style="width: 100%;"
                            name="location_id"
                            id="location_id"
                        >
                            <option selected disabled>Select Location</option>
                            @foreach($locations as $location)
                                <option
                                    {{ old('location_id', $asset->location_id) == $location->location_id ? 'selected' : '' }}
                                    value="{{ $location->location_id }}"
                                >{{ $location->location_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <a href="#" class="btn btn-sm bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat">New</a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Images</label>
                <div class="custom-file">
                    <input
                        type="file"
                        class="form-control form-control-sm rounded-0"
                        id="file-input"
                        name="image[]"
                        onchange="return loadPreview(this)"
                        multiple
                    >
                    <small class="form-text text-muted">
                        Accepted filetypes are jpg, jpeg, png, gif, and svg. Max upload size allowed is 1024MB
                    </small>
                </div>
                <div id="thumb-output"></div>

                @if(Route::currentRouteName() == 'assets.edit')

                    <div class="row text-center">

                        @foreach ($asset->images as $image)

                            <div class="col-3">

                                <img class="img-fluid mx-auto m-1" width="100" src="{{ asset('uploads/assets/image/'.$image->image) }}" alt="{{ $image->image }}">

                                <a class="btn btn-sm btn-danger" href="{{ route('assets.deleteImage', $image->id) }}">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </a>

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('assets.index')"></x-SubmitButton>

        </div>

    </div>

</form>

@push('js')

    <script>

        function loadPreview(input){
            var data = $(input)[0].files; //this file data
            $.each(data, function(index, file){
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
                    var fRead = new FileReader();
                    fRead.onload = (function(file){
                        return function(e) {
                            var img = $('<img width="100" class="img-fluid m-2"/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                            $('#thumb-output').append(img);
                        };
                    })(file);
                    fRead.readAsDataURL(file);
                }
            });
        }

        $(function () {
            /* Date Picker */
            $('#purchase_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#warranty_end').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>

@endpush
