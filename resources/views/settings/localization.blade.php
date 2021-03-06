<form class="form-horizontal" action="{{ route('settings.localization.update') }}" method="POST">

    @csrf

    <div class="form-group row">
        <label for="date_format" class="col-sm-2 col-form-label">Date Format</label>
        <div class="col-sm-10">
            <select class="custom-select" id="date_format" name="date_format">
                @foreach(\App\Setting::dateformats() as $format)
                    <option
                        value="{{ $format }}"
                        @if(isset($setting->date_format) && $setting->date_format == $format) selected @endif
                    >
                        {{ \Carbon\Carbon::parse(date('Y').'-'.date('m').'-'.date('d'))->format($format) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="time_format" class="col-sm-2 col-form-label">Time Format</label>
        <div class="col-sm-10">
            <select class="custom-select" id="time_format" name="time_format">
                @foreach(\App\Setting::timeFormats() as $format)
                    <option
                        value="{{ $format }}"
                        @if(isset($setting->time_format) && $setting->time_format == $format) selected @endif
                    >
                        {{ \Carbon\Carbon::now()->format($format) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="currency" class="col-sm-2 col-form-label">Currency Code</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control form-control-sm rounded-0 w-25"
                id="currency"
                placeholder="{{ $setting ? $setting->currency : null }}"
                name="currency"
                value="{{ $setting ? $setting->currency : null }}"
            >
        </div>
    </div>

    <x-SubmitButton :btnText="'Save Localization Settings'" :cancelBtnRoute="url('/')"></x-SubmitButton>

</form>
