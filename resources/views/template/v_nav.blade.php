        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                        <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('img/logo1.png')}}" style="width: 80%;">
                </div>
                <!-- <div class="sidebar-brand-text mx-3">PT. ARPS</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->is('operator') ? 'active' : ''}} ">
                <a class="nav-link" href="/operator">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Master Operator</span></a>
            </li>

            <li class="nav-item nav-item {{ request()->is('machine') ? 'active' : ''}} ">
                <a class="nav-link" href="/machine">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Master Machine</span></a>
            </li>

                        <li class="nav-item {{ request()->is('workorder') ? 'active' : ''}}">
                <a class="nav-link" href="/workorder">
                    <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Master Work Order</span></a>
            </li>

                        <li class="nav-item {{ request()->is('status') ? 'active' : ''}}">
                <a class="nav-link" href="/status">
                    <i class="fas fa-fw fa-spinner"></i>
                    <span>Master Status</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>