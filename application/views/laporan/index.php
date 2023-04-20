<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Buku Kas Umum</h5>
                        </div>
                        <div class="ms-auto my-auto">
                            <a href="<?= base_url('laporan/cetak?p=') ?>excel&tglawal=<?= $this->session->flashdata('tglawal') ?>&tglakhir=<?= $this->session->flashdata('tglakhir') ?>" class=" btn bg-gradient-success mb-4"><i class="fas fa-file-excel"></i> Download Excel</a>
                        </div>
                    </div>
                    <!-- search date -->
                    <form class="form-inline" action="<?= base_url('laporan/search') ?>" method="post">
                        <div class="form-group mb-2 col-lg-3">
                            <input class="form-control" type="date" id="tanggal_awal" value="<?= $this->session->flashdata('tglawal') ?>" name="tanggal_awal">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="date" id="tanggal_akhir" value="<?= $this->session->flashdata('tglakhir') ?>" name="tanggal_akhir">
                        </div>
                        <button type="submit" class="btn btn-primary mb-0">Search</button>
                    </form>
                    <!-- end search date -->
                </div>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
                </div>') ?>
                <?= $this->session->flashdata('message') ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">No.Bukti</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Debet</th>
                                    <th class="text-center">Kredit</th>
                                    <th class="text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $saldo = 0;
                                foreach ($jurnal as $d) :
                                    $date = date_create($d['tgl_transaksi']);

                                    if ($d['debit'] == 0) {
                                        $nominal = $d['kredit'];

                                        $saldo = $saldo - $nominal;
                                    } else {
                                        $nominal = $d['debit'];
                                        $saldo = $saldo + $nominal;
                                    }
                                ?>

                                    <tr>
                                        <th class="text-center"><?= $i ?></th>
                                        <td class="text-center"><?= date_format($date, "d F Y") ?></td>
                                        <td class="text-center"><?= $d['id_transaksi'] ?></td>
                                        <?php if ($user['role_id'] == 3 &&  substr($d['keterangan'], 0, 10) == 'Donasi A/n') { ?>
                                            <td class="text-center"><?= substr($d['keterangan'], 0, 10) ?> ****************</td>
                                        <?php } else { ?>
                                            <td><?= $d['keterangan'] ?></td>
                                        <?php } ?>
                                        <td class="text-center"><?= number_format($d['debit'], 0, ',', '.') ?></td>
                                        <td class="text-center"><?= number_format($d['kredit'], 0, ',', '.') ?></td>
                                        <td class="text-center">Rp <?= number_format($saldo, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->