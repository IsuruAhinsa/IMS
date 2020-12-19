<form action="{{ route('spare-parts.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="spare_id" class="col-form-label">Spare ID</label>
                <input
                    type="text"
                    id="spare_id"
                    name="spare_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Spare ID"
                >
            </div>

            <div class="form-group">
                <label for="spare_code" class="col-form-label">Spare Code</label>
                <input
                    type="text"
                    id="spare_code"
                    name="spare_code"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Spare Code"
                >
            </div>

            <div class="form-group">
                <label for="part_number" class="col-form-label">Part Number</label>
                <input
                    type="text"
                    id="part_number"
                    name="part_number"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Part Number"
                >
            </div>

            <div class="form-group">
                <label for="unit_price" class="col-form-label">Unit Price</label>
                <input
                    type="text"
                    id="unit_price"
                    name="unit_price"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Unit Price"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="part_description" class="col-form-label">Description</label>
                <textarea
                    name="part_description"
                    id="part_description"
                    cols="10"
                    rows="5"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Description"
                ></textarea>
            </div>

            <div class="form-group">
                <label for="qty" class="col-form-label">Quantity</label>
                <input
                    type="text"
                    id="qty"
                    name="qty"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Quantity"
                >
            </div>

            <x-SubmitButton :btnText="'Create Spare Part'" :cancelBtnRoute="route('spare-parts.index')"></x-SubmitButton>

        </div>

    </div>

</form>
