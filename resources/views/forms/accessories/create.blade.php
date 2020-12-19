<form action="{{ route('accessories.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="asset_tag_id" class="col-form-label">Asset Tag ID</label>
                <input
                    type="text"
                    id="asset_tag_id"
                    name="asset_tag_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Tag ID"
                >
            </div>

            <div class="form-group">
                <label for="asset_tag" class="col-form-label">Asset Tag</label>
                <input
                    type="text"
                    id="asset_tag"
                    name="asset_tag"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Tag"
                >
            </div>

            <div class="form-group">
                <label for="asset_name" class="col-form-label">Asset Name</label>
                <input
                    type="text"
                    id="asset_name"
                    name="asset_name"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Name"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="asset_disacription">Asset Disacription</label>
                <input
                    type="text"
                    id="asset_disacription"
                    name="asset_disacription"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Disacription"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-form-label" for="asset_model">Asset Model</label>
                <input
                    type="text"
                    id="asset_model"
                    name="asset_model"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Model"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="asset_serial">Asset Serial</label>
                <input
                    type="text"
                    id="asset_serial"
                    name="asset_serial"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Serial"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="asset_manufacture">Asset Manufacture</label>
                <input
                    type="text"
                    id="asset_manufacture"
                    name="asset_manufacture"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Manufacture"
                >
            </div>

            <x-SubmitButton :btnText="'Create Accessory'" :cancelBtnRoute="route('accessories.index')"></x-SubmitButton>

        </div>

    </div>

</form>
