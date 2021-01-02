<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'accessories.edit')
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-form-label" for="asset_id">Asset</label>
                <select
                    class="form-control form-control-sm rounded-0 select2bs4"
                    style="width: 100%;"
                    name="asset_id"
                    id="asset_id"
                >
                    <option selected disabled>Select Asset</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>

            <div class="form-group">
                <label for="asset_tag_id" class="col-form-label">Asset Tag ID</label>
                <input
                    type="text"
                    id="asset_tag_id"
                    name="asset_tag_id"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Tag ID"
                    value="{{ old('asset_tag_id', $accessory->asset_tag_id)}}"
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
                    value="{{ old('asset_tag', $accessory->asset_tag) }}"
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
                    value="{{ old('asset_name', $accessory->asset_name) }}"
                >
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label class="col-form-label" for="asset_disacription">Asset Disacription</label>
                <input
                    type="text"
                    id="asset_disacription"
                    name="asset_disacription"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Disacription"
                    value="{{ old('asset_disacription', $accessory->asset_disacription) }}"
                >
            </div>

            <div class="form-group">
                <label class="col-form-label" for="asset_model">Asset Model</label>
                <input
                    type="text"
                    id="asset_model"
                    name="asset_model"
                    class="form-control form-control-sm rounded-0"
                    placeholder="Enter Asset Model"
                    value="{{ old('asset_model', $accessory->asset_model) }}"
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
                    value="{{ old('asset_serial', $accessory->asset_serial) }}"
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
                    value="{{ old('asset_manufacture', $accessory->asset_manufacture) }}"
                >
            </div>

            <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('accessories.index')"></x-SubmitButton>

        </div>

    </div>

</form>
