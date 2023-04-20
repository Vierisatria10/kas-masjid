<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0"><?php echo $title; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
                     </div>') ?>
                    <?= $this->session->flashdata('message') ?>

                    <div class="table-responsive">
                        <form action="<?= base_url('transaksi/kaskeluar') ?>" method="post">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <input class="form-control mb-2" type="text" id="keterangan" name="keterangan" placeholder="ex: pembayaran .....">
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', ' </small>') ?>

                                <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nominal</label>
                                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="ex: 100000">
                                <?= form_error('nominal', '<small class="text-danger pl-3">', ' </small>') ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">+&nbsp; Kas keluar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Tabel Kas Keluar</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kaskeluar as $k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $k['keterangan']; ?></td>
                                        <td class="text-center">Rp. <?= number_format($k['nominal'], 0, ',', '.'); ?></td>
                                        <td class="text-center"><?= $k['tgl_transaksi']; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>