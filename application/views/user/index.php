<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-4  mb-lg-0 mb-4">
                <div class="card card-profile">
                    <img src="<?= base_url('assets') ?>/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-0">
                        <div class="d-flex justify-content-center mt-3">
                            <a href="<?= site_url('user/changepassword'); ?>" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Change Password</a>
                            <a href="<?= site_url('user/changepassword'); ?>" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                <?= $user['name']; ?>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i><?= $user['email']; ?>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Member Since <?= date('d F Y', $user['date_created']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8  mb-lg-0 mb-5">
                <div class="card">

                    <?php echo form_open_multipart('user'); ?>
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Save Changes</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">User Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Full Name</label>
                                    <input class="form-control" name="name" id="name" type="text" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Email address</label>
                                    <input class="form-control" name="email" id="email" type="text" value="<?= $user['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="custom-file-label col-sm-2">Picture</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" id="image" name="image" class="form-control" id="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>