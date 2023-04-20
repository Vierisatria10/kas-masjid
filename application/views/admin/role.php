<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Role Management</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newrolemodal">+&nbsp; New Role</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger text-white" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $r['role']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-gear"></i>
                                                </span>
                                                <span class="text">Access</span>
                                            </a>
                                            <a href="" class="btn btn-warning btn-icon-split" data-bs-toggle="modal" data-bs-target="#editrolemodal<?= $r['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $r['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Modal Add -->
        <div class="modal fade" id="newrolemodal" tabindex="-1" role="dialog" aria-labelledby="newrolemodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newrolemodal">Edit Name Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('admin/role') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text" id="role" name="role" placeholder="Role Name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal edit -->
        <?php foreach ($role as $r) : ?>
            <div class="modal fade" id="editrolemodal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editrolemodal<?= $r['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editrolemodal<?= $r['id'] ?>">Edit Role Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('admin/edit') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $r['id']; ?>">
                                    <input class="form-control" type="text" id="role" name="role" value="<?= $r['role']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-info">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <!-- modal hapus -->
        <?php foreach ($role as $r) : ?>
            <div class="modal fade" id="hapusmodal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusmodal<?= $r['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusmodal<?= $r['id'] ?>">Sure on Delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Menghapus Data Role : <b><?= $r['role']; ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn bg-gradient-danger" href="<?= base_url('admin/delete/') . $r['id']; ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>