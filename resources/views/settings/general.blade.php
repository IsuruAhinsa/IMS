<form
    class="form-horizontal"
    action="{{ route('settings.general.update') }}"
    method="POST"
>

    @csrf

    <div class="form-group row">
        <label for="navbar_color" class="col-sm-2 col-form-label">Navbar Color</label>
        <div class="col-sm-10">
            <select
                class="custom-select"
                id="navbar_color"
                name="navbar_color"
            >
                @foreach(\App\Setting::navbarColors() as $index => $color)
                    <option
                        value="{{ $index }}"
                        @if(isset($setting->navbar_color) && $setting->navbar_color == $index) selected @endif
                    >{{ ucfirst($color) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="sidebar_color" class="col-sm-2 col-form-label">Sidebar Color</label>
        <div class="col-sm-10">
            <select
                class="custom-select"
                id="sidebar_color"
                name="sidebar_color"
            >
                @foreach(\App\Setting::sidebarColors() as $index => $color)
                    <option
                        value="{{ $index }}"
                        @if(isset($setting->sidebar_color) && $setting->sidebar_color == $index) selected @endif
                    >{{ $color }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="skin" class="col-sm-2 col-form-label">Skin</label>
        <div class="col-sm-10">
            <select
                class="custom-select"
                id="skin"
                name="skin"
            >
                @foreach(\App\Setting::skins() as $index => $skin)
                    <option
                        value="{{ $index }}"
                        @if(isset($setting->skin) && $setting->skin == $index) selected @endif
                    >{{ ucfirst($skin) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <x-SubmitButton :btnText="'Save General Settings'"></x-SubmitButton>

</form>
