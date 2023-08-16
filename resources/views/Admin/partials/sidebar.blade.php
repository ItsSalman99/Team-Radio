<div id="layoutSidenav_nav" class=" height-100vh position-fixed top-0 start-0" style="width: var(--sidebarwidth);">
    <!-- logo -->
    <div class="logo bg-white w-100 text-center p-4 d-none d-md-block position-relative"
        style="border-bottom: 1px solid var(--bs-gray-200);">
        <div class="d-flex align-items-cener justify-content-center h-100">
            <a href="index.php" class="d-inline-flex"><img src="{{ asset('assets/images/logo.png') }}"
                    alt="" class="mx-auto"></a>
        </div>
    </div>
    <!-- sidemenu links -->
    <nav class="sb-sidenav accordion bg-white d-flex flex-column overflow-hidden min-vh-100 flex-nowrap"
        id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="cover-nav height-100vh">
                <div class="nav">
                    <a class="nav-link <?php if(request()->is('dashboard')) { echo 'active';} ?>" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2-fill font-20px"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/users')) { echo 'active';} ?>" href="{{ route('users') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-users font-20px"></i></div>
                        App Users
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/export-data')) { echo 'active';} ?>" href="{{ route('data-export') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-bar-chart-fill font-20px"></i></div>
                        Data Export
                    </a>
                    <a class="nav-link <?php if(request()->is('feedback')) { echo 'active';} ?>" href="{{ route('feedback') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-star-fill font-20px"></i></div>
                        Feedback
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/usernames')) { echo 'active';} ?>" href="{{ route('usersname') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-lock-fill font-20px"></i></div>
                        Reserved Usernames
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/push-notifications')) { echo 'active';} ?>" href="{{ route('push-notifications') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-bell-fill font-20px"></i></div>
                        Push Notifications
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/settings')) { echo 'active';} ?>" href="{{ route('settings') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-gear-fill font-20px"></i></div>
                        Settings
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/legal')) { echo 'active';} ?>" href="{{ route('legal') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-richtext-fill font-20px"></i></div>
                        Legal
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/users/reports')) { echo 'active';} ?>" href="{{ route('users.reports') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-flag-fill font-20px"></i>
                        </div>
                        Reports Management
                    </a>
                    
                    <a class="nav-link <?php if(request()->is('dashboard/reports/options')) { echo 'active';} ?>" href="{{ route('reports.options') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-gear-fill font-20px"></i></div>
                        Report Options
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/support/users')) { echo 'active';} ?>" href="{{ route('users.supported') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-user font-20px"></i></div>
                        Support Users
                    </a>
                    <a class="nav-link <?php if(request()->is('dashboard/contents')) { echo 'active';} ?>" style="margin-bottom: 130px;" href="{{ route('contents.index') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-pencil-square font-20px"></i></div>
                        Contents
                    </a>
                </div>

            </div>
        </div>

    </nav>
</div>
