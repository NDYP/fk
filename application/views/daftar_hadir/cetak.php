<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Hadir</title>
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <style>
    .line-title {
        border-color: black;
        color: black;
        border: 1;
        /* border-style: inset; */
        border-top: 0px;
        margin: 1px;
    }

    .x {
        font-size: 1.5mm;
        margin: 1px;
        margin-bottom: 1px;
    }

    table {
        font-size: 13px;

    }

    .tr {
        font-size: 14px;
    }

    .td {
        font-size: 14px;
        margin: 5px;
    }

    p {
        margin: 2px;
    }
    </style>
</head>

<body>
    <img src="<?= base_url('assets'); ?>/foto/logo_upr.jpg"
        style="padding:0%;position: absolute; width: 75px; height: auto; color: orange" class="img">
    <table class="x" style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1; font-weight: bold;">
                    <font style="line-height: 0.5;" face="Arial Rounded MT Bold" font size="5">
                        KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN</font>
                    <font face="Arial Rounded MT Bold" font size="5">
                        <br>UNIVERSITAS PALANGKA RAYA
                    </font>
                    <br>
                    <font face="Arial Rounded MT Bold" font size="5">
                        FAKULTAS KEDOKTERAN
                    </font>
                </span>
            </td>
        </tr>
        <hr class="line-title">
        <hr class="line-title">
    </table>
    <p align="left">
        <font face="Arial Rounded MT Bold" font size="4"> <b>
                ABSENSI PERKULIAHAN MAHASISWA
                <br>
                SEMESTER <?= $detail_modul['semester']; ?> <?= $detail_modul['tahun_akademik']; ?>
                <br> MODUL <?= $detail_modul['mata_kuliah']; ?>
            </b>
    </p>
    <br>

    <div class="row container-fluid">
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="1" cellspacing="">
            <tr>
                <th rowspan="3" style="padding-left: 5px; padding-right:5px;" width=30>No.</th>
                <th rowspan="3" width=200>Nama</th>
                <th width=100>
                    Materi
                </th>
                <th colspan="2"></th>
                <th colspan="2"></th>
                <th colspan="2"></th>
                <th colspan="2"></th>
                <th colspan="2"></th>

            </tr>
            <tr>


                <th>Hari dan tanggal</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>

                <th>Jam</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php $no = 1;
            foreach ($mahasiswa as $x) : ?>
            <tr>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"> <?= $no++ ?></td>
                <td style="text-align: left;padding-left: 5px; padding-right:5px;"><?= $x['nama']; ?></td>
                <td style="text-align: left;padding-left: 3px; padding-right:3px;">
                    <?= $x['nim']; ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">

                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <br>

    <!-- <br>
    <br> -->
    <!-- <br>
    <br>
    <br> -->
    <div class="">
        <table border="0" cellspacing="0">
            <tr>
                <td>
                </td>
                <td>
                    <!-- <p align="center">
                        <font face="Arial Rounded MT Bold" font size="3">
                            Palangkaraya, <br>
                    </p> -->
                </td>
            </tr>
            <tr>
                <td width="270">
                    <center>
                        <font face="Arial Rounded MT Bold"><br>
                            <br> <br><br><br><br>
                            <p><b><u><br></u></b>
                </td>
                <td width=400></td>
                <td width="190" height="120">
                    <center>
                        <font face="Arial Rounded MT Bold">Mengetahui,<br>Ketua Modul<br><br><br><br><br>
                            <p><b><u> <?= $detail_modul['nama_ketua']; ?></u></b><br>NIP.
                                <?= $detail_modul['nip_ketua']; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>