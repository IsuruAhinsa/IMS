@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

<form class="form-horizontal" action="{{ route('settings.branding.update') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group row">
        <label for="site_name" class="col-sm-2 col-form-label">Site Name</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="site_name"
                placeholder="{{ $setting ? $setting->site_name : null }}"
                name="site_name"
                value="{{ $setting ? $setting->site_name : null }}"
            >
        </div>
    </div>

    <div class="form-group row">
        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
        @if($setting->logo)
            <div class="col-sm-2">

                <img class="img-thumbnail img-fluid rounded-0" src="{{ asset('uploads/settings/'.$setting->logo) }}" alt="{{ $setting->logo }}" width="100%">

            </div>
        @endif
        <div class="@if(!empty($setting->logo)) col-sm-8 @else col-sm-10 @endif">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input rounded-0"
                    id="logo"
                    name="logo"
                >
                <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                <small class="form-text text-muted">
                    Square logos look best with Logo + Text. Logo maximum display size is 50px high x 500px wide. Accepted filetypes are jpg, png, gif, and svg. Max upload size allowed is 100M.
                </small>
            </div>
            @if($setting->logo)
                <div class="p-2">
                    <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
                        <input type="checkbox" id="remove_logo" name="remove_logo" value="1">
                        <label class="font-weight-normal" for="remove_logo">Remove current logo</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>

        @if($setting->favicon)

            <div class="col-sm-2 text-center">

                <img class="img-thumbnail img-fluid rounded-0" src="{{ asset('uploads/settings/'.$setting->favicon) }}" alt="{{ $setting->favicon }}" width="50%">

            </div>

        @endif

        <div class="@if(!empty($setting->favicon)) col-sm-8 @else col-sm-10 @endif">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input rounded-0"
                    id="favicon"
                    name="favicon"
                >
                <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                <small class="form-text text-muted">
                    Favicons should be square images, 16x16 pixels. Accepted filetypes are ico, png, and gif. Other image formats may not work in all browsers.
                </small>
            </div>
            @if($setting->favicon)
                <div class="p-2">
                    <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
                        <input type="checkbox" id="remove_favicon" name="remove_favicon" value="1">
                        <label class="font-weight-normal" for="remove_favicon">Remove current favicon</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email_logo" class="col-sm-2 col-form-label">Email Logo</label>

        @if($setting->email_logo)

            <div class="col-sm-2">

                <img class="img-thumbnail img-fluid rounded-0" src="{{ asset('uploads/settings/'.$setting->email_logo) }}" alt="{{ $setting->email_logo }}" width="100%">

            </div>

        @endif

        <div class="@if(!empty($setting->email_logo)) col-sm-8 @else col-sm-10 @endif">
            <div class="custom-file">
                <input
                    type="file"
                    class="custom-file-input rounded-0"
                    id="email_logo"
                    name="email_logo"
                >
                <label class="custom-file-label rounded-0" for="customFile">Choose file</label>
                <small class="form-text text-muted">
                    Square logos in email look best. Accepted filetypes are jpg, png, gif, and svg. Max upload size allowed is 100M.
                </small>
                @if($setting->email_logo)
                    <div class="p-2">
                        <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
                            <input type="checkbox" id="remove_email_logo" name="remove_email_logo" value="1">
                            <label class="font-weight-normal" for="remove_email_logo">Remove current email logo</label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="footer_text" class="col-sm-2 col-form-label">Footer Text</label>
        <div class="col-sm-10">
            <input
                type="text"
                class="form-control rounded-0"
                id="footer_text"
                placeholder="{{ isset($setting) ? $setting->footer_text : null }}"
                name="footer_text"
                value="{{ isset($setting) ? $setting->footer_text : null }}"
            >
            <small class="form-text text-muted">
                This text will appear in the right-side footer. Links are allowed using Github flavored markdown. Line breaks, headers, images, etc may result in unpredictable results.
            </small>
        </div>
    </div>

    <x-SubmitButton :btnText="'Save Branding Settings'"></x-SubmitButton>

</form>

@push('js')
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
            bsCustomFileInput.init();
        });
    </script>
@endpush
