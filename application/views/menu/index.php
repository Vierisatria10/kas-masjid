<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Menu Management</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newmenumodal">+&nbsp; New Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo form_error('menu', '<div class="alert alert-danger text-white" role="alert">', '</div>') ?>

                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $m['menu']; ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-warning btn-icon-split" data-bs-toggle="modal" data-bs-target="#editmmodal<?= $m['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split">
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

        <!-- Modal -->
        <div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newmenumodal">Add New Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('menu') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text" id="menu" name="menu" placeholder="Menu Name">
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
        <?php foreach ($menu as $m) : ?>
            <div class="modal fade" id="editmmodal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editmmodal<?= $m['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editmmodal<?= $m['id'] ?>">Edit Menu Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('menu/edit') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $m['id']; ?>">
                                    <input class="form-control" type="text" id="menu" name="menu" value="<?= $m['menu']; ?>">
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