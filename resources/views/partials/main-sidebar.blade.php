<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-bold">
            {{ config('app.name', 'IMS') }}
        </span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::check())
                    @if(Auth::user()->avatar)

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
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
