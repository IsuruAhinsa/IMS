@push('css')

    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush

<form action="{{ route('assets.store') }}">

    @csrf

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="hospital">Hospital</label>
        <div class="col-md-9">
            <select
                class="form-control select2bs4 rounded-0"
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
        <div class="col-md-1 text-right">
            <a href="#" class="btn bg-gradient-primary btn-flat">New</a>
        </div>
    </div>

    <div class="form-group row">
        <label for="brand" class="col-md-2 col-form-label">Brand</label>
        <div class="col-md-10">
            <input
                type="text"
                id="brand"
                class="form-control rounded-0"
                placeholder="Brand"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="model" class="col-md-2 col-form-label">Model</label>
        <div class="col-md-10">
            <input
                type="text"
                id="model"
                class="form-control rounded-0"
                placeholder="Model"
            >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="serial">Serial Number</label>
        <div class="col-md-10">
            <input
                type="text"
                id="serial"
                class="form-control rounded-0"
                placeholder="Serial Number"
            >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="purchase_date">Purchase Date</label>
        <div class="col-md-10">
            <div class="input-group date" id="purchase_date" data-target-input="nearest">
                <input
                    type="text"
                    class="form-control rounded-0 datetimepicker-input"
                    data-target="#purchase_date"
                    id="purchase_date"
                    name="purchase_date"
                />
                <div class="input-group-append" data-target="#purchase_date" data-toggle="datetimepicker">
                    <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="warranty_period">Warranty Period</label>
        <div class="col-md-10">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control rounded-0"
                    name="warranty_period"
                    id="warranty_period"
                >
                <div class="input-group-append">
                    <span class="input-group-text rounded-0">months</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="warranty_end_date">Warranty End Date</label>
        <div class="col-md-10">
            <div class="input-group date" id="warranty_end_date" data-target-input="nearest">
                <input
                    type="text"
                    class="form-control rounded-0 datetimepicker-input"
                    data-target="#warranty_end_date"
                    id="warranty_end_date"
                />
                <div class="input-group-append" data-target="#warranty_end_date" data-toggle="datetimepicker">
                    <div class="input-group-text rounded-0"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="warranty_status">Warranty Status</label>
        <div class="col-md-10">
            <select
                class="form-control rounded-0 select2bs4"
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
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="cost">Cost</label>
        <div class="col-md-10">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control rounded-0"
                    name="cost"
                    id="cost"
                >
                <div class="input-group-append">
                    <span class="input-group-text rounded-0">$</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="variation">Variation</label>
        <div class="col-md-10">
            <input
                type="text"
                id="variation"
                name="variation"
                class="form-control rounded-0"
                placeholder="Variation"
            >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="location">Location</label>
        <div class="col-md-9">
            <select
                class="form-control select2bs4 rounded-0"
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
        <div class="col-md-1 text-right">
            <a href="#" class="btn bg-gradient-primary btn-flat">New</a>
        </div>
    </div>

    <div class="text-right">
        <a href="{{ url('/') }}" class="btn btn-link">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Asset</button>
    </div>

</form>

@push('js')

    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

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
