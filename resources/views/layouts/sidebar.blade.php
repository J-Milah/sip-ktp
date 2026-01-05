<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIP-KTP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menuDashboard ?? '' }}">
                <a class="nav-link" href=" {{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

             @if (Auth()->user()->jabatan == 'Admin')
            <!-- Heading -->
            <div class="sidebar-heading">
                MENU ADMIN
            </div>

            <!-- Nav Item - Manajemen Users -->
            <li class="nav-item {{ $menuAdminUser ?? '' }}">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-user"></i>
                    <span>Manajemen User</span></a>
            </li>

            <li class="nav-item {{ $menuOperatorCetak ?? '' }}">
                <a class="nav-link" href="{{ route('cetak') }}">
                    <i class="fas fa-id-card"></i>
                    <span>Pencetakan KTP</span></a>
            </li>

            <!-- Nav Item - Riwayat Pencetakan KTP -->
            <li class="nav-item {{ $menuRiwayatCetak ?? '' }}">
                <a class="nav-link" href="{{ route('cetakRiwayat') }}">
                    <i class="fas fa-id-card"></i>
                    <span>Riwayat Pencetakan KTP</span></a>
            </li>

            <!-- Nav Item - Perekaman KTP -->
            <li class="nav-item {{ $menuOperatorRekam ?? '' }}">
                <a class="nav-link" href="{{ route('rekam') }}">
                    <i class="fas fa-users"></i>
                    <span>Perekaman KTP</span></a>
            </li>

            <!-- Nav Item - Pencatatan IKD KTP -->
            <li class="nav-item {{ $menuIKD ?? '' }}">
                <a class="nav-link" href="{{ route('ikd') }}">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Pencatatan IKD</span></a>
            </li>


            @elseif (Auth()->user()->jabatan == 'Operator-Cetak')
            <!-- Heading -->
            <div class="sidebar-heading">
                MENU OPERATOR-CETAK
            </div>

            <!-- Nav Item - Pencetakan KTP -->
            <li class="nav-item {{ $menuOperatorCetak ?? '' }}">
                <a class="nav-link" href="{{ route('cetak') }}">
                    <i class="fas fa-id-card"></i>
                    <span>Pencetakan KTP</span></a>
            </li>

            <!-- Nav Item - Riwayat Pencetakan KTP -->
            <li class="nav-item {{ $menuRiwayatCetak ?? '' }}">
                <a class="nav-link" href="{{ route('cetakRiwayat') }}">
                    <i class="fas fa-id-card"></i>
                    <span>Riwayat Pencetakan KTP</span></a>
            </li>

            <!-- Nav Item - Pencatatan IKD KTP -->
            <li class="nav-item {{ $menuIKDOperatorCetak ?? '' }}">
                <a class="nav-link" href="{{ route('ikd') }}">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Pencatatan IKD</span></a>
            </li>

            @else 
            <!-- Heading -->
            <div class="sidebar-heading">
                MENU OPERATOR-REKAM
            </div>

            <!-- Nav Item - Perekaman KTP -->
            <li class="nav-item {{ $menuOperatorRekam ?? '' }}">
                <a class="nav-link" href="{{ route('rekam') }}">
                    <i class="fas fa-users"></i>
                    <span>Perekaman KTP</span></a>
            </li>

            <!-- Nav Item - Pencatatan IKD KTP -->
            <li class="nav-item {{ $menuIKD ?? '' }}">
                <a class="nav-link" href="{{ route('ikd') }}">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Pencatatan IKD</span></a>
            </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->