<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Data Donatur</h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newdonaturmodal">+&nbsp; New Donatur</a>
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
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($donatur as $d) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $d['nama']; ?></td>
                                        <td class="text-center"><?= $d['alamat']; ?></td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-warning btn-icon-split" data-bs-toggle="modal" data-bs-target="#editmodal<?= $d['id'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $d['id'] ?>">
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
        <div class="modal fade" id="newdonaturmodal" tabindex="-1" role="dialog" aria-labelledby="newdonaturmodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdonaturmodal">Tambah Donatur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('admin/donatur') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
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
        <?php foreach ($donatur as $d) : ?>
            <div class="modal fade" id="editmodal<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editmodal<?= $d['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editmodal<?= $d['id'] ?>">Edit Role Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('admin/updatedonatur') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama'] ?>" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $d['alamat'] ?></textarea>
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
        <?php foreach ($donatur as $d) : ?>
            <div class="modal fade" id="hapusmodal<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusmodal<?= $d['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusmodal<?= $d['id'] ?>">Sure on Delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Menghapus Data Donatur : <b><?= $d['nama']; ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn bg-gradient-danger" href="<?= base_url('admin/deletedonatur?id=') . $d['id']; ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>