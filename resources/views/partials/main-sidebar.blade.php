<aside class="main-sidebar {{ $commonSetting ? $commonSetting->sidebar_color : 'sidebar-dark' }}-{{ $commonSetting ?  $commonSetting->skin : 'primary' }} elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        @if (isset($commonSetting))
            <img
                src="{{ $commonSetting->logo ? asset('uploads/settings/'.$commonSetting->logo) : asset('img/logo.png') }}"
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

                <li class="nav-item has-treeview {{ Request::is('assets/*') || Request::is('assets') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('assets/*') || Request::is('assets') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            Assets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('assets.index') }}" class="nav-link {{ Request::is('assets') ? 'active' : '' }}">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>All Assets</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('assets.create') }}" class="nav-link {{ Request::is('assets/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Asset</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('accessories/*') || Request::is('accessories') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('accessories/*') || Request::is('accessories') ? 'active' : '' }}">
                        <i class="nav-icon far fa-keyboard"></i>
                        <p>
                            Accessories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('accessories.index') }}" class="nav-link {{ Request::is('accessories') ? 'active' : '' }}">
                                <i class="far fa-keyboard nav-icon"></i>
                                <p>All Accessories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('accessories.create') }}" class="nav-link {{ Request::is('accessories/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Accessory</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('hospitals/*') || Request::is('hospitals') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('hospitals/*') || Request::is('hospitals') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hospital-symbol"></i>
                        <p>
                            Hospitals
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('hospitals.index') }}" class="nav-link {{ Request::is('hospitals') ? 'active' : '' }}">
                                <i class="fas fa-hospital-symbol nav-icon"></i>
                                <p>All Hospitals</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('hospitals.create') }}" class="nav-link {{ Request::is('hospitals/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Hospital</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('locations/*') || Request::is('locations') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('locations/*') || Request::is('locations') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-location-arrow"></i>
                        <p>
                            Locations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('locations.index') }}" class="nav-link {{ Request::is('locations') ? 'active' : '' }}">
                                <i class="fas fa-location-arrow nav-icon"></i>
                                <p>All Locations</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('locations.create') }}" class="nav-link {{ Request::is('locations/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Location</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('categories/*') || Request::is('categories') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('categories/*') || Request::is('categories') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
                                <i class="fas fa-sitemap nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link {{ Request::is('categories/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('manufacturers/*') || Request::is('manufacturers') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('manufacturers/*') || Request::is('manufacturers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Manufacturers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('manufacturers.index') }}" class="nav-link {{ Request::is('manufacturers') ? 'active' : '' }}">
                                <i class="fas fa-industry nav-icon"></i>
                                <p>All Manufacturers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('manufacturers.create') }}" class="nav-link {{ Request::is('manufacturers/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Manufacture</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('departments/*') || Request::is('departments') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('departments/*') || Request::is('departments') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Departments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments') ? 'active' : '' }}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>All Departments</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('departments.create') }}" class="nav-link {{ Request::is('departments/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Department</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('vendors/*') || Request::is('vendors') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('vendors/*') || Request::is('vendors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Vendors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('vendors.index') }}" class="nav-link {{ Request::is('vendors') ? 'active' : '' }}">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>All Vendors</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('vendors.create') }}" class="nav-link {{ Request::is('vendors/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Vendor</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('contractors/*') || Request::is('contractors') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('contractors/*') || Request::is('contractors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hard-hat"></i>
                        <p>
                            Contractors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('contractors.index') }}" class="nav-link {{ Request::is('contractors') ? 'active' : '' }}">
                                <i class="fas fa-hard-hat nav-icon"></i>
                                <p>All Contractors</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contractors.create') }}" class="nav-link {{ Request::is('contractors/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Contractor</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('spare-parts/*') || Request::is('spare-parts') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('spare-parts/*') || Request::is('spare-parts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-retweet"></i>
                        <p>
                            Spares Used
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('spare-parts.index') }}" class="nav-link {{ Request::is('spare-parts') ? 'active' : '' }}">
                                <i class="fas fa-retweet nav-icon"></i>
                                <p>All Spares Used</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('spare-parts.create') }}" class="nav-link {{ Request::is('spare-parts/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Create Spare Used</p>
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item has-treeview {{ Request::is('users/*') || Request::is('users') || Request::is('roles') || Request::is('roles/*') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('users/*') || Request::is('users') || Request::is('roles') || Request::is('roles/*') ? 'active' : '' }}">
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

                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
                                <i class="fas fa-user-shield nav-icon"></i>
                                <p>Roles & Permissions</p>
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
