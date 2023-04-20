<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-5 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Donasi</p>
                                <h3 class="font-weight-bolder">
                                    Rp <?= number_format($total_donasi['nominal']) ?>
                                </h3>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    since yesterday
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0"><?php echo $title; ?></h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#newdonasimodal">+&nbsp; New Donasi</a>
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
                                    <th class="text-center">Nama Transaksi</th>
                                    <th class="text-center">Tanggal Transaksi</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center" style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($donasi as $d) :
                                    $date = date_create($d['date_trx']);
                                ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        <?php if ($user['role_id'] == 3) { ?>
                                            <td><?= substr($d['nama_transaksi'], 0, 9) ?> ****************</td>
                                        <?php } else { ?>
                                            <td><?= $d['nama_transaksi'] ?></td>

                                        <?php } ?>
                                        <td class="text-center"><?= date_format($date, "d F Y") ?></td>
                                        <td class="text-center"><?= number_format($d['nominal'], 0, ',', '.') ?></td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger btn-icon-split" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $d['id_transaksi'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Delete</span>
                                            </a>
                                            <a href="<?= base_url('transaksi/cetak?id=') . $d['id'] ?>" class="btn btn-warning btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-print"></i>
                                                </span>
                                                <span class="text">Print</span>
                                            </a>
                                            <a href="<?= base_url('transaksi/invoice?id=') . $d['id'] ?>" class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-print"></i>
                                                </span>
                                                <span class="text">Invoice</span>
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
        <div class="modal fade" id="newdonasimodal" tabindex="-1" role="dialog" aria-labelledby="newdonasimodal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newdonasimodal">Tambah Donasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('transaksi/donasi') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <select name="nama" id="nama" class="form-control">
                                    <option value="">- Silahkan masukkan nama donatur -</option>
                                    <?php foreach ($donatur as $a) : ?>
                                        <option value="<?= $a['id'] ?>"><?= $a['nama'] ?> - <?= $a['alamat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp. </span>
                                    <input type="text" class="form-control" id="nominal" name="nominal" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Nominal" aria-label="Nominal">
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

        <!-- modal hapus -->
        <?php foreach ($donasi as $d) : ?>
            <div class="modal fade" id="hapusmodal<?= $d['id_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusmodal<?= $d['id_transaksi'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusmodal<?= $d['id_transaksi'] ?>">Sure on Delete?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">Anda yakin ingin menghapus Donatur A/n <?= $d['nama_transaksi'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn bg-gradient-danger" href="<?= base_url('transaksi/deletedonasi?id=') . $d['id_transaksi']; ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>