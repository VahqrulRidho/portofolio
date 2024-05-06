<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        {{-- <div class="sidebar-brand-icon">
            <img src="/assets/admin/img/boy.png">
        </div> --}}
        <div class="sidebar-brand-text mx-3">Portofolio</div>
    </div>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item {{ request()->is('admin/profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile') }}">
            <i class="fas fa-address-card"></i>
            <span>&nbsp;Profile</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/service*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.service') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>&nbsp;Service</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/contact*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.contact') }}">
            <i class="fas fa-phone-square"></i>
            <span>&nbsp; Contact</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/keahlian*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.keahlian') }}">
            <i class="fas fa-sign-language"></i>
            <span>&nbsp; Keahlian</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/portofolio*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.portofolio') }}">
            <i class="fas fa-file-signature"></i>
            <span>&nbsp;Portofolio</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/pesan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pesan') }}">
            <i class="fas fa-comment-dots"></i>
            <span>&nbsp;Pesan Masuk</span>
        </a>
    </li>
    {{-- <hr class="sidebar-divider"> --}}
    <li class="nav-item {{ request()->is('admin/detail-resume*') || request()->is('admin/resume*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>&nbsp;Resume</span>
        </a>
        <div id="collapseBootstrap"
            class="collapse  {{ request()->is('admin/resume*') ? 'show' : '' }} || {{ request()->is('admin/detail-resume*') ? 'show' : '' }} "
            aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/resume*') ? 'active' : '' }}"
                    href="{{ route('admin.resume') }}">Judul Resume</a>
                <a class="collapse-item {{ request()->is('admin/detail-resume*') ? 'active' : '' }}"
                    href="{{ route('admin.detail-resume') }}">Detail Resume</a>
            </div>
        </div>
    </li>

</ul>
