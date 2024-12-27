<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | KSI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ Route::is('ormawa.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('divisi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.informasi') }}"><i class="fas fa-box"></i> <span>Informasi Organisasi</span></a>
            </li>
            <li class="{{ Request::is('divisi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.divisi') }}"><i class="fas fa-box"></i> <span>Divisi</span></a>
            </li>
            <li class="{{ Request::is('anggota*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.anggota') }}"><i class="fas fa-box"></i> <span>Anggota</span></a>
            </li>
            <li class="{{ Request::is('berita*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.berita') }}"><i class="fas fa-box"></i> <span>Berita</span></a>
            </li>
        </ul>
    </aside>
</div>
