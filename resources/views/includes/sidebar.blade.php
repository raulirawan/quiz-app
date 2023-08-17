<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="{{ url('img/logo.png') }}" style="max-width: 166px"> --}}

        {{-- <span class="ml-3 brand-text font-weight-light">SISTEM REPOSITORY SK</span> --}}
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ Str::ucfirst(Auth::user()->name) }}</a> --}}
                <a href="#" class="d-block">Quiz App</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- @if (Auth::user()->roles == 'ADMIN') --}}
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('materi.index') }}" class="nav-link {{ request()->is('admin/materi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                            Materi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quiz.index') }}" class="nav-link {{ request()->is('admin/quiz*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quiz
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('ganti-password.admin.index') }}"
                        class="nav-link {{ request()->is('admin/ganti-password*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
