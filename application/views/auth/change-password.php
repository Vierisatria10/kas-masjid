<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Change Password</h4>
                                <h5 class="mb-0"><?php echo $this->session->userdata('reset_email'); ?></h5>
                            </div>
                            <div class="card-body">
                                <?php echo $this->session->flashdata('message') ?>
                                <form role="form" method="POST" action="<?php echo site_url('auth/changepassword') ?>">
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg" placeholder="Enter New Password" id="password1" name="password1">
                                        <?= form_error('password1', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg" placeholder="Konfirm Password" id="password2" name="password2">
                                        <?= form_error('password2', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('<?= base_url('assets') ?>/img/masjid.jpg');
                            background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <!-- <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                            <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>