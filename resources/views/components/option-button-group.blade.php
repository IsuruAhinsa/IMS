@if(request('status') == 'deleted')

    <a href="{{ route('users.index') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> {{ $btnText1 }}</a>

@else

    <a href="{{ route('users.index', ['status' => 'deleted']) }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> {{ $btnText2 }}</a>

@endif

<a href="{{ route('users.create') }}" class="btn btn-flat bg-{{ $commonSetting ? $commonSetting->skin : 'primary' }}"> {{ $btnText3 }}</a>
