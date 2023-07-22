<div id="layoutSidenav_content"
    class=" position-relative d-flex flex-column min-vh-100 justify-content-between flex-grow-1 " style="min-width: 0;">
    <main>
        <nav class="sb-topnav navbar navbar-expand bg-white justify-content-between py-3 px-3 px-md-5">
            <div class="order-1 order-lg-0">
                <a class=" me-lg-0 text-dark bg-transparent d-lg-none" id="sidebarToggle" href="#!"><i
                        class="bi bi-justify-right font-20px"></i></a>
            </div>

            <div class="logo-sm d-block d-lg-none">
                <img src="assets/images/logo.png" alt="" class="width-30 width-md-80">
            </div>
            <ul class="navbar-nav ms-auto me-lg-0 me-2 align-items-center gap-3">
                <li class="nav-item dropdown tableDropdown profile">
                    <a class="nav-link d-flex dropdown-toggle caret-none align-items-center gap-2 p-0"
                        id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside"> <img src="assets/images/user.png"
                            alt="">
                        <div class="d-none d-lg-block" data-bs-toggle="tooltip" data-bs-title="Login Info">
                            <h6 class="text-capitalize m-0  font-15px font-weight-500">{{ Auth::user()->getName() }}</h6>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 mt-2" style="     width: max-content;"
                        aria-labelledby="navbarDropdown">
                        <li class=" bg-primary-01 border-bottom">
                            <a class="dropdown-item pe-none user-select-none px-3" href="javascript:void(0)">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="assets/images/user.png" alt="student-img">
                                    <div>
                                        <h6 class="font-weight-700 font-18px m-0 text-primary"> {{ Auth::user()->getName() }}
                                        </h6>
                                        <p class=" font-14px m-0">Admin</p>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="dropdown position-relative">
                            <a href="{{ route('user.logout') }}" class="dropdown-item dropdown-toggle caret-none">
                                <div class="d-flex align-items-center gap-2 text-danger">
                                    <i class="bi bi-power font-22px"></i>
                                    <p class="m-0 d-flex align-items-center justify-content-between flex-1"
                                        style="color: inherit;">Signout</p>
                                </div>
                            </a>

                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
