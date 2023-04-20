<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg mb-lg-0 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-">
                    <div class="d-lg-flex mb-3">
                        <div>
                            <?php
                            $date1 = date_create($this->session->flashdata('tglawal'));
                            $date2 = date_create($this->session->flashdata('tglakhir'));

                            ?>
                            <h5 class="mb-0"><?= $title ?> : <?= date_format($date1, "d-m-Y") ?> / <?= date_format($date2, "d-m-Y") ?> </h5>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="<?= base_url('laporan/cetak?p=') ?>excel&tglawal=<?= $this->session->flashdata('tglawal') ?>&tglakhir=<?= $this->session->flashdata('tglakhir') ?>" class=" btn bg-gradient-success mb-4"><i class="fas fa-file-excel"></i> Download Excel</a>
                            </div>
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
                                $_saldo = 0;
                                foreach ($saldo_awal as $s) :

                                    if ($s['debit'] == 0) {
                                        $nominal = $s['kredit'];

                                        $_saldo = $_saldo - $nominal;
                                    } else {
                                        $nominal = $s['debit'];
                                        $_saldo = $_saldo + $nominal;
                                    }
                                endforeach;
                                ?>
                                <tr>
                                    <th class="text-center">-</th>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>

                                    <td>Saldo Kas Akhir</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">Rp <?= number_format($_saldo, 0, ',', '.') ?>
                                    </td>
                                </tr>

                                <?php
                                if ($_saldo != 0) {
                                    $saldo = $_saldo;
                                } else {
                                    $saldo = 0;
                                }
                                $i = 1;
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
                                            <td class="text-center"><?= $d['keterangan'] ?></td>
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