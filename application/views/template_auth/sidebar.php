<div class="min-height-300 bg-success position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps ps--active-y" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?php echo site_url('user') ?>">
            <img src="<?php echo base_url('assets'); ?>/img/moon.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">MASJID <strong>AL - NABAWI</strong></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_menu`.`sort` ASC ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- looping menu -->
            <?php foreach ($menu as $m) : ?>
                <li class="nav-item mt-3">
                    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder opacity-6"><?= $m['menu']; ?></h6>
                </li>

                <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                            FROM `user_sub_menu` JOIN `user_menu` 
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1 ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <li class="nav-item">
                        <?php if ($title == $sm['title']) : ?>
                            <a class="nav-link active" href="<?= base_url($sm['url']); ?>">
                            <?php else : ?>
                                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                                <?php endif; ?>
                                <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-<?= $sm['icon']; ?> text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1"><?= $sm['title']; ?></span>
                                </a>
                    </li>
                <?php endforeach; ?>
                <hr class="horizontal dark mt-3">
            <?php endforeach; ?>
        </ul>
    </div>


    <div class="sidenav-footer mx-3 my-3">
        <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-dark btn-sm w-100 mb-3">Logout</a>
    </div>
</aside>