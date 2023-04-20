<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link p-0 text-white">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </a>
        </div>
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <?php if ($id = 1) : ?>
                            <a class="opacity-5 text-white" href="<?php echo site_url('admin') ?>">Dashboard</a>
                        <?php else : ?>
                            <a class="opacity-5 text-white" href="<?php echo site_url('user') ?>">My Profile</a>
                        <?php endif ?>
                    </li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0"><?= $title; ?></h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="<?= site_url('user') ?>" class="nav-link text-white font-weight-bold px-0">
                            <img class="avatar avatar-sm rounded-circle me-2" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="">
                            <span class="d-sm-inline d-none"><?= $user['name']; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>