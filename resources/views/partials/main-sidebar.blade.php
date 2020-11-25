<aside class="main-sidebar {{ $commonSetting ? $commonSetting->sidebar_color : 'sidebar-dark' }}-{{ $commonSetting ?  $commonSetting->skin : 'primary' }} elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        @if (isset($commonSetting->logo))
            <img
                src="{{ asset('uploads/settings/'.$commonSetting->logo) }}"
                alt="{{ $commonSetting->site_name }} logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
        @endif
        <span class="brand-text font-weight-bold">
            {{ $commonSetting ? $commonSetting->site_name : 'IMS' }}
        </span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::check())
                    @if(Auth::user()->avatar)
                        <img class="img-circle elevation-2"
                             src="{{ asset(Auth::user()->avatar) }}"
                             alt="User profile picture">
                    @else
                        <img class="img-circle elevation-2"
                             src="{{ asset('img/profile/avatar/default.png') }}"
                             alt="User profile picture">
                    @endif
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if(Auth::check())
                        @if(Auth::user()->first_name && Auth::user()->last_name)
                            {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                        @else
                            {{ Auth::user()->email }}
                        @endif
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
