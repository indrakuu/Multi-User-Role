<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MultiUser <sup>DuniaDev</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">

    @can('view', App\Models\Post::class)
    <div class="sidebar-heading">
        Postingan
    </div>
    @endcan
    @can('create', App\Models\Post::class)
    <li class="nav-item {{ (\Request::route()->getName() == 'create.post') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('create.post') }}">
            <i class="fas fa-fw fa-folder-plus"></i>
            <span>Buat Postingan baru</span></a>
    </li>
    @endcan
    @can('view', App\Models\Post::class)
    <li class="nav-item {{ (\Request::route()->getName() == 'show.post') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('show.post') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Lihat Postingan</span></a>
    </li>
    <hr class="sidebar-divider">
    @endcan
    @can('view', App\Models\User::class)
    <div class="sidebar-heading">
        Akun
    </div>
    <li class="nav-item {{ (\Request::route()->getName() == 'profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Profile</span></a>
    </li>
    @endcan
    @can('viewAny', App\Models\User::class)
    <li class="nav-item {{ (\Request::route()->getName() == 'accounts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('accounts') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Pengguna</span></a>
    </li>
    @endcan
    @can('view', App\Models\Role::class)
    <li class="nav-item {{ (\Request::route()->getName() == 'level.account') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('level.account') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Level Akun</span></a>
    </li>
    @endcan
    @can('view', App\Models\Permission::class)
    <li class="nav-item {{ (\Request::route()->getName() == 'permission') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('permission') }}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Perizinan</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    @endcan

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>