<aside class="main-sidebar {{ $commonSetting ? $commonSetting->sidebar_color : 'sidebar-dark' }}-{{ $commonSetting ?  $commonSetting->skin : 'primary' }} elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        @if (isset($commonSetting))
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
                    @if(Auth::user()->image)
                        <img class="img-circle elevation-2"
                             src="{{ asset('uploads/user/image/' . Auth::user()->image) }}"
                             alt="{{ Auth::user()->image }}">
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
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ Request::is('users/*') || Request::is('users') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('users/*') || Request::is('users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                                <i class="fas fa-user-friends nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link {{ Request::is('users/create') ? 'active' : '' }}">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ Request::is('settings') ? 'active' : '' }}">
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
