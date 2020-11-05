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
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-block user-block-sm">
                    @if(Auth::check())
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle border" alt="User Image">
                        @else
                            <i class="fa fa-user-circle text-dark fa-2x"></i>
                        @endif
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    @if(Auth::check())
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle border" alt="User Image" width="72">
                        @else
                            <i class="fa fa-user-circle text-dark fa-3x"></i>
                        @endif
                    @endif
                    <br><br>
                    {{ Auth::user()->email }}
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user-circle mr-2"></i>
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a
                    class="dropdown-item text-danger"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>
                @include('forms.logout')
            </div>
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
                <i class="fas fa-cog"></i>
            </a>
        </li>
    </ul>
</nav>
