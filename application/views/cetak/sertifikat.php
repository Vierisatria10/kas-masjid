<html>

<head>
    <style>
        @font-face {
            font-family: 'Raster';
            src: url('<?= base_url('assets/'); ?>font/Raster Slice.ttf');
        }

        @font-face {
            font-family: 'utsmanic';
            src: url('<?= base_url('assets/'); ?>font/UthmanicHafs1 Ver09.otf');
        }

        @font-face {
            font-family: 'kacst';
            src: url('<?= base_url('assets/'); ?>font/KacstFarsi.ttf');
        }

        @font-face {
            font-family: 'Galyon';
            src: url('<?= base_url('assets/'); ?>font/Galyon-Regular.otf');
        }
    </style>
</head>

<body>

    <center>
        <style>
            .signature,
            .title {
                float: left;
                border-top: 1px solid #000;
                width: 200px;
                text-align: center;
            }
        </style>

        <?php
        $id = $this->input->get('id');
        $query = $this->db->query("select a.id as no,nama_transaksi,nominal,date_trx,nama,alamat from tbl_transaksi a left join tbl_donatur b on a.id_anggota = b.id
where a.id= $id")->result_array();
        foreach ($query as $q) :
            $date1 = date_create();
            $array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
            $bln = $array_bln[date_format($date1, "m")];
        ?>

            <div style=" background-image:url('<?= base_url('assets/img/') ?>certificate-bg.jpg');-webkit-print-color-adjust: exact; background-size: cover; width:800px; height:600px; padding:20px; text-align:center;">
                <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #fff">
                    <div style="font-size: 12px;color: #191919;text-align: left;font-weight: 700;">Nomor: <i style="text-decoration: underline;"><?= str_pad($q['no'], 4, '0', STR_PAD_LEFT) ?>/Donasi/<?= $bln ?>/<?= date_format($date1, "y") ?></i></div>
                    <div style="font-size: 30px; color: #dc9a41;font-family: 'Raster';">Sertifikat</div>
                    <br>
                    <span style="font-size:27px;font-family: 'kacst';"> بسم الله الرحمن الرحيم</span><br>
                    <br>
                    <div style="padding-right:50px;display: flex;font-size:14px;padding-left:50px;text-align:center;"><i>Perumpamaan (nafkah yang dikeluarkan oleh) orang-orang yang menafkahkan hartanya di jalan Allah adalah serupa dengan sebutir benih yang menumbuhkan tujuh bulir, pada tiap-tiap bulir seratus biji.
                            Allah melipat gandakan (ganjaran) bagi siapa yang Dia kehendaki. Dan Allah Maha Luas (karunia-Nya) lagi Maha Mengetahui. (Qs.Al-baqarah:261)</i></div>
                    <div style="font-size:16px;color: #191919;margin-top: 10px;
    margin-bottom: 10px;">Segenap Panitia Mengucapkan <i>"Jazaakumullahu Khoiron Katsiiro" </i> kepada : </div>

                    <div style="font-size: 32px;color: #3380bf; margin-bottom: 10px;font-family:'Galyon'"><b> <?= $q['nama'] ?></b></div>
                    <div style="font-size:25px;color: #191919;margin-bottom:10px;"><i>Atas donasinya sebesar :</i></div>
                    <div style="font-size:40px; font-weight:600 ;margin-bottom:10px;font-family:'Galyon';"> Rp <?= number_format($q['nominal'], 0, ',', '.') ?>,-</div>
                    <span style="font-size:16px;color: #191919;text-align:center;padding-left:50px;padding-right:50px;display: flex;">Untuk Pembangunan Masjid AL - Nabawi Kec. Plaju, Kota Palembang, semoga amalnya diterima dan mendapatkan balasan yang lebih baik dari Allah SWT, aamiin
</body></span>

<table style="margin-top:0px;width:30%;margin-top:15px;margin-left: 288px;float:left">
    <tr>
        <td style="width:200px;text-align:center;color: #191919;font-size:16px;"><span><b>Ketua Panitia</b></td>
    </tr>
    <tr>
        <td style="width:200px;text-align:center;color: #191919;padding-top: 70px;"></td>
    </tr>
    <tr>
        <td style="text-align:center;color: #191919;font-size:16px;"><span><b>Bpk. Munandar</b></td>
    </tr>

</table>
<table style="margin-top:0px;width:30%;margin-top:15px;float:right;">
    <tr>
        <td style="width:200px;text-align:center;color: #191919;font-size:16px;"><span><b>Sekretaris</b></td>
    </tr>
    <tr>
        <td style="width:200px;text-align:center;color: #191919;padding-top: 70px;"></td>
    </tr>
    <tr>
        <td style="text-align:center;color: #191919;font-size:16px;"><span><b>Romlan Zainudin</b></td>
    </tr>
</table>

</div>
</div>

<?php endforeach ?>
</center>
<script>
    document.title = '<?= $q['nama_transaksi'] ?>';
    window.print();
    // return false;
</script>
</body>

</html>