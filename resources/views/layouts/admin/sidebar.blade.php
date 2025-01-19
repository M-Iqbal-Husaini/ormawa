<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('organisasi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.organisasi') }}"><i class="fas fa-box"></i> <span>Organisasi</span></a>
            </li>
            <li class="{{ Request::is('admin/ormawa*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.ormawa') }}"><i class="fas fa-user"></i> <span>Admin Ormawa</span></a>
            </li>
        </ul>
    </aside>
</div>
