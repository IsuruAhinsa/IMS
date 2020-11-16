@push('css')

    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush

<form action="{{ route('assets.store') }}">

    @csrf

    <div class="form-group row">
        <label for="brand" class="col-md-2 col-form-label">Brand</label>
        <div class="col-md-10">
            <input
                type="text"
                id="brand"
                class="form-control"
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
                class="form-control"
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
                class="form-control"
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
                    class="form-control datetimepicker-input"
                    data-target="#purchase_date"
                    id="purchase_date"
                    name="purchase_date"
                />
                <div class="input-group-append" data-target="#purchase_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
                    class="form-control"
                    name="warranty_period"
                    id="warranty_period"
                >
                <div class="input-group-append">
                    <span class="input-group-text">months</span>
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
                    class="form-control datetimepicker-input"
                    data-target="#warranty_end_date"
                    id="warranty_end_date"
                />
                <div class="input-group-append" data-target="#warranty_end_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="warranty_status">Warranty Status</label>
        <div class="col-md-10">
            <select
                class="form-control select2bs4"
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
                    class="form-control"
                    name="cost"
                    id="cost"
                >
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
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
                class="form-control"
                placeholder="Variation"
            >
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="warranty_status">Warranty Status</label>
        <div class="col-md-9">
            <select
                class="form-control select2bs4"
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
        <div class="col-md-1 text-right">
            <a href="#" class="btn bg-primary">New</a>
        </div>
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
