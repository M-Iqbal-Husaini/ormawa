<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Admin Ormawa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="{{ request()->is('ormawa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ request()->is('divisi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.divisi') }}"><i class="fas fa-box"></i> <span>Divisi</span></a>
            </li>
            <li class="{{ request()->is('anggota*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.anggota') }}"><i class="fas fa-user"></i> <span>Anggota</span></a>
            </li>
            <li class="{{ request()->is('berita*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.berita') }}"><i class="fas fa-book-open"></i> <span>Berita</span></a>
            </li>
            <li class="{{ request()->is('pendaftaran*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.pendaftaran') }}"><i class="fas fa-address-book"></i> <span>Pendaftaran</span></a>
            </li>
            <li class="{{ request()->is('whatsapp*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ormawa.whatsapp') }}"><i class="fas fa-users"></i> <span>Link WA</span></a>
            </li>
        </ul>
    </aside>
</div>
