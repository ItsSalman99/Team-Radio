<div id="layoutSidenav_nav" class=" height-100vh position-fixed top-0 start-0" style="width: var(--sidebarwidth);">
    <!-- logo -->
    <div class="logo bg-white w-100 text-center p-4 d-none d-md-block position-relative"
        style="border-bottom: 1px solid var(--bs-gray-200);">
        <div class="d-flex align-items-cener justify-content-center h-100">
            <a href="index.php" class="d-inline-flex"><img src="https://cdn-icons-png.flaticon.com/512/705/705668.png"
                    alt="" class="mx-auto"></a>
        </div>
    </div>
    <!-- sidemenu links -->
    <nav class="sb-sidenav accordion bg-white d-flex flex-column overflow-hidden min-vh-100 flex-nowrap"
        id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="cover-nav height-100vh">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading pb-3 ps-6">
                        <h4 class="font-14px m-0 opacity-07 font-weight-500 text-uppercase">Main Menu</h4>
                    </div>
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2-fill font-20px"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link " href="{{ route('users.supported') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-user font-20px"></i></div>
                        Support Users
                    </a>

                    <a class="nav-link " href="{{ route('users') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-users font-20px"></i></div>
                        Users
                    </a>
                    <a class="nav-link " href="{{ route('users.reports') }}">
                        <div class="sb-nav-link-icon"><img src="https://cdn-icons-png.flaticon.com/512/6319/6319605.png"
                                alt="">
                        </div>
                        Reports
                    </a>
                    <a class="nav-link " href="{{ route('usersname') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-history font-20px"></i></div>
                        Usernames
                    </a>
                    <a class="nav-link " href="{{ route('reports.options') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-history font-20px"></i></div>
                        Report Options
                    </a>
                </div>

            </div>
        </div>

    </nav>
</div>
