<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Submenu Management</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newsubmenumodal">+&nbsp; New Submenu</a>
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
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Url</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $sm['title']; ?></td>
                                        <td class="text-center"><?= $sm['menu']; ?></td>
                                        <td class="text-center"><?= $sm['url']; ?></td>
                                        <td class="text-center"><?= $sm['icon']; ?></td>
                                        <th class="text-center">
                                            <?php if ($sm['is_active']) : ?>
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Inactive</span>
                                            <?php endif ?>
                                        </th>
                                        <td class="text-center">
                                            <a href="" class="btn btn-warning btn-icon-split" data-bs-toggle="modal" data-bs-target="#editsmmodal<?= $sm['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#hapussmmodal<?= $sm['id'] ?>">
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
        <div class="modal fade" id="newsubmenumodal" tabindex="-1" role="dialog" aria-labelledby="newsubmenumodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsubmenumodal">Add New Submenu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('menu/submenu') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Sub Menu Title">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="url" name="url" placeholder="Sub Menu Url">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="icon" name="icon" placeholder="Sub Menu Icon">
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" value="1" type="checkbox" name="is_active" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">Active?</label>
                                </div>
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
        <?php foreach ($subMenu as $sm) : ?>
            <div class="modal fade" id="editsmmodal<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editsmmodal<?= $sm['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editsmmodal<?= $sm['id'] ?>">Edit Submenu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('menu/subedit') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="id" name="id" value="<?= $sm['id']; ?>">
                                    <input class="form-control" type="text" id="title" name="title" value="<?= $sm['title']; ?>">
                                </div>
                                <div class="form-group">
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="url" name="url" value="<?= $sm['url']; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" value="1" type="checkbox" name="is_active" id="is_active" checked>
                                        <label class="form-check-label" for="is_active">Active?</label>
                                    </div>
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
        <?php foreach ($subMenu as $sm) : ?>
            <div class="modal fade" id="hapussmmodal<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapussmmodal<?= $sm['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapussmmodal<?= $sm['id'] ?>">Sure on Delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Menghapus Data Submenu</b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn bg-gradient-danger" href="<?= base_url('menu/subdelete/') . $sm['id']; ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>