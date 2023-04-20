<div class="main-content position-relative max-height-vh-100 h-100">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8  mb-lg-0 mb-5">
                <div class="card">
                    <?php echo form_open_multipart('user/changepassword'); ?>
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Change Password</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Save Changes</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('user/changepassword'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="current_password" class="form-control-label">Current Password</label>
                                        <input class="form-control" id="current_password" name="current_password" type="password" placeholder="Current Password">
                                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_password1" class="form-control-label">Password</label>
                                        <input class="form-control" id="new_password1" name="new_password1" type="password" placeholder="New Password">
                                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_password2" class="form-control-label">Konfirmasi Password</label>
                                        <input class="form-control" name="new_password2" name="new_password2" type="password" placeholder="Konfirmasi Password">
                                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>