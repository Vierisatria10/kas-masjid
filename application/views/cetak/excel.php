<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Buku Kas Umum Pembangunan Masjid AL - Nabawi.xls");

$date1 = date_create($this->session->flashdata('tglawal'));
$date2 = date_create($this->session->flashdata('tglakhir'));

?>
<table class="table table-hover">
    <thead>
        <tr>
            <th colspan=6 height="20px">BUKU KAS UMUM</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Pembangunan Masjid AL - Nabawi</th>
        </tr>
        <tr>
            <th colspan=6 height="20px">Periode Bulan : <?= date_format($date1, " F Y") ?> - <?= date_format($date2, "F Y")  ?></th>
        </tr>


        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">No.Bukti</th>
            <th scope="col">Uraian</th>
            <th scope="col">Debet</th>
            <th scope="col">Kredit</th>
            <th scope="col">Saldo(Rp)</th>
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
            <th scope="row"></th>
            <td>-</td>
            <td>-</td>

            <td>Saldo Kas Akhir</td>
            <td style="text-align:right;">-</td>
            <td style="text-align:right;">-</td>
            <td style="text-align:right;"> <?= $_saldo ?>
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
                <th scope="row"><?= $i ?></th>
                <td><?= date_format($date, "d F Y") ?></td>
                <td><?= $d['id_transaksi'] ?></td>
                <?php if ($user['role_id'] == 3 &&  substr($d['keterangan'], 0, 10) == 'Donasi A/n') { ?>
                    <td><?= substr($d['keterangan'], 0, 10) ?> ****************</td>
                <?php } else { ?>
                    <td><?= $d['keterangan'] ?></td>
                <?php } ?>
                <td style="text-align:right;"><?= $d['debit'] ?></td>
                <td style="text-align:right;"><?= $d['kredit'] ?></td>
                <td style="text-align:right;"><?= $saldo ?>
                </td>
            </tr>
        <?php $i++;
        endforeach ?>
    </tbody>
</table>