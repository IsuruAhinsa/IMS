<div class="form-group row">
    <div class="offset-sm-2 col-sm-10 text-right">
        <a href="{{ $cancelBtnRoute }}" class="btn btn-link">Cancel</a>
        <button
            type="submit"
            class="btn bg-gradient-{{ $commonSetting ? $commonSetting->skin : 'primary' }} btn-flat"
        >
            <i class="fa fa-save mr-2"></i>
            {{ $btnText }}
        </button>
    </div>
</div>
