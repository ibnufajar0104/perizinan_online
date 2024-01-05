<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <!-- <div class="navbar-brand-box">
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="24">
                    </span>
                    <span class="logo-sm">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="24"> <span class="logo-txt">DPMPTSP</span>
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="40"> <span class="logo-txt">DPMPTSP</span>
                    </span>
                    <span class="logo-lg">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="40"> <span class="logo-txt">DPMPTSP</span>
                    </span>
                </a>
            </div> -->

            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="24">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/ptsp.PNG" alt=""
                            height="24">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>


        </div>

        <div class="d-flex">



            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>


            <!-- 
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline">
                                    Unread(3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="<?= base_url() ?>tmp/assets/images/users/avatar-3.jpg"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James_Lemire </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">
                                            It_will_seem_like_simplified_English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                hour_ago </span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your_order_is_placed </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">
                                            If_several_languages_coalesce_the_grammar
                                        </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                min_ago </span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your_item_is_shipped </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">
                                            If_several_languages_coalesce_the_gramma
                                        </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                min_ago </span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="<?= base_url() ?>tmp/assets/images/users/avatar-6.jpg"
                                        class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena_Layfield </h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">
                                            As_a_skeptical_Cambridge_friend_of_mine_occidental.
                                        </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                hours_ago> </span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i>
                            <span>View_More... </span>
                        </a>
                    </div>
                </div>
            </div> -->



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user user-profile-image"
                        src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/logo%20tala.png"
                        alt="Header Avatar" id="user_image">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium setting_user_name"
                        id="setting_user_name"><?= $this->session->nama; ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= site_url('profil') ?>"><i
                            class="mdi mdi-account font-size-16 align-middle me-1"></i> Profil</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('profil/logout') ?>"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>