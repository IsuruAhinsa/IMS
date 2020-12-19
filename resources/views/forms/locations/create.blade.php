<form class="form-horizontal" action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'locations.edit')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="location_code" class="col-form-label">Location Code</label>
        <input
            type="text"
            class="form-control form-control-sm rounded-0"
            id="location_code"
            placeholder="Enter Location Code"
            name="location_code"
            value="{{ $locationCodeVal }}"
        >
    </div>

    <div class="form-group">
        <label for="description" class="col-form-label">Description</label>
        <textarea
            name="description"
            id="description"
            class="form-control form-control-sm rounded-0"
            cols="10"
            rows="5"
            placeholder="Enter Description"
        >{{ $descriptionVal }}</textarea>
    </div>

    <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('locations.index')"></x-SubmitButton>

</form>
