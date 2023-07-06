<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <p class="mt-3 mb-0">WEB UJIAN</p>
                <p style="margin-top: -8px;">SISTEM INFORMASI</p>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SI</a>
        </div>
        @if (auth()->user()->roles == 'admin')
            <ul class="sidebar-menu mt-3">
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/dashboard') }}"><i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span></a></li>

                <li class="menu-header">Soal</li>
                <li class="{{ request()->is('soal*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/soal') }}"><i class="bi bi-book-half"></i>
                        <span>Soal</span></a></li>

                <li class="menu-header">User</li>
                <li class="{{ request()->is('mahasiswa*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/mahasiswa') }}"><i class="bi bi-person-fill"></i>
                        <span>Mahasiswa</span></a></li>
            </ul>
        @elseif (auth()->user()->roles == 'user')
            <ul class="sidebar-menu mt-3">
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->is('home*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/home') }}"><i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span></a></li>

                <li class="menu-header">Ujian</li>
                <li class="{{ request()->is('ujian*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/ujian') }}"><i class="bi bi-book-half"></i>
                        <span>Ujian</span></a></li>

                <li class="menu-header">Pengumuman</li>
                <li class="{{ request()->is('nilai*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('/nilai') }}"><i class="bi bi-check-square-fill"></i>
                        <span>Nilai</span></a></li>
            </ul>
        @endif
    </aside>
</div>
