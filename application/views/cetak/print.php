<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<?php
$id = $this->input->get('id');
$query = $this->db->query("select a.id as no,nama_transaksi,nominal,date_trx,nama,alamat from tbl_transaksi a left join tbl_donatur b on a.id_anggota = b.id
where a.id= $id")->result_array();
foreach ($query as $q) :
?>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="<?= base_url('assets'); ?>/img/moon.png" style="width:20%; max-width:300px;">
                                </td>

                                <td>
                                    Invoice #: <?= $q['no'] ?> <br>
                                    Dibuat: <?= $q['date_trx'] ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <?= $q['nama_transaksi'] ?><br>
                                    <?= $q['alamat'] ?>
                                </td>

                                <td>

                                    Panitia Pembangunan Masjid AL - Nabawi<br>
                                    Jl. D.I. Panjaitan No.48, Plaju Ilir,<br>
                                    Kec. Plaju, Kota Palembang
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>
                        Deskripsi
                    </td>

                    <td>
                        Nominal
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        <?= $q['nama_transaksi'] ?>
                    </td>

                    <td>
                        <?= number_format($q['nominal'])  ?>
                    </td>
                </tr>



                <tr class="total">
                    <td></td>

                    <td>
                        Total: Rp. <?= number_format($q['nominal']) ?>
                    </td>
                </tr>

                <tr class="total">
                    <td align="center" style="font-family: cursive;
">Terima Kasih Untuk Donasi yg telah Bapak/Ibu Berikan  Semoga donasi dan kebaikan hati Bapak-Ibu akan mendapatkan  imbalan dan keberkahan dari Allah SWT di Dunia Maupun di Akhirat . Amin YRA</td>

                </tr>
            </table>
        </div>
    <?php endforeach ?>
    <script>
        document.title = '<?= $q['nama_transaksi'] ?>';
        window.print();
    </script>
    </body>

</html>