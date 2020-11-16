<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    @include('forms.navbar-search')

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{-- User Content Dropdown Menu --}}
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if(Auth::check())
                    @if(Auth::user()->avatar)
                        <img class="user-image img-circle elevation-2"
                             src="{{ asset(Auth::user()->avatar) }}"
                             alt="User profile picture">
                    @else
                        <img class="user-image img-circle elevation-2"
                             src="{{ asset('img/profile/avatar/default.png') }}"
                             alt="User profile picture">
                    @endif
                @endif
                <span class="d-none d-md-inline">
                    @if(Auth::check())
                        @if(Auth::user()->first_name && Auth::user()->last_name)
                            {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                        @else
                            {{ Auth::user()->email }}
                        @endif
                    @endif
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
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
                    <p>
                        @if(Auth::check())
                            @if(Auth::user()->first_name && Auth::user()->last_name)
                                {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                            @else
                                {{ Auth::user()->email }}
                            @endif
                        @endif
                        <small>
                            Member since
                            {{ Auth::user()->created_at->toFormattedDateString() }}
                        </small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body border-bottom-0">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('profile') }}" class="btn btn-default btn-flat">
                        <i class="fas fa-user-circle mr-2"></i>
                        Profile
                    </a>
                    <a
                        class="btn btn-default btn-flat float-right"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Sign out
                    </a>
                </li>
                @include('forms.logout')
            </ul>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ asset('img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer text-primary">See All Notifications</a>
            </div>
        </li>
        {{-- Sidebar --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-plus-circle"></i>
            </a>
        </li>
    </ul>
</nav>
