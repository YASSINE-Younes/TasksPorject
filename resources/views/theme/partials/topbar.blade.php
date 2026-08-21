<nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
    <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm ">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    <!-- MOBILE -->
    <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>



    <div>
        <!-- Navbar nav -->
        <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
            <!-- Pages link -->


            <!-- Dropdown -->
            <li class="ms-3 dropdown">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets') }}/images/avatar/avatar-1.jpg" alt=""
                        class="avatar avatar-sm rounded-circle" />
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 200px;">
                    <div>
                        <div class="d-flex gap-3 align-items-center border-dashed border-bottom px-3 py-3">
                            <img src="{{ asset('assets') }}/images/avatar/avatar-1.jpg" alt=""
                                class="avatar avatar-md rounded-circle" />
                            <div>
                                <h4 class="mb-0 small">Shrina Tesla</h4>
                                <p class="mb-0  small">@imshrina</p>
                            </div>
                        </div>
                        <div class="p-3 d-flex flex-column gap-1 small lh-lg">
                            <a href="#!" class="">

                                <span>Home</span>
                            </a>
                            <a href="#!" class="">

                                <span> Inbox</span>
                            </a>
                            <a href="#!" class="">

                                <span> Chat</span>
                            </a>
                            <a href="#!" class="">

                                <span> Activity</span>
                            </a>
                            <a href="#!" class="">

                                <span> Account Settings</span>
                            </a>
                        </div>

                    </div>
                </div>
            </li>


        </ul>
    </div>

</nav>
