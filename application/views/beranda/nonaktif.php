<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <style>
    .line-title {
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
        margin: 10px;
    }

    p {
        margin: 2px;
    }
    </style>
</head>

<body>
    <img src="<?= base_url('assets'); ?>/foto/logo_upr.jpg"
        style="padding:0%;position: absolute; width: 60px; height: auto; color: orange" class="img">
    <table class="x" style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1; font-weight: bold;">
                    <font style="line-height: 0.5;" face="Arial Rounded MT Bold" font size="4">
                        KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN</font>
                    <font face="Arial Rounded MT Bold" font size="4">
                        <br>UNIVERSITAS PALANGKA RAYA
                    </font>
                    <br>
                    <font face="Arial Rounded MT Bold" font size="4">
                        FAKULTAS KEDOKTERAN
                    </font>
                </span>
            </td>
        </tr>
        <hr class="line-title">
        <hr class="line-title">
    </table>
    <br>
    <h3 style="text-align: center ;"> <u>Mahasiswa <?= $prodi['program_studi'] ?> Tidak Aktif
            Registrasi<?= $tahun_ajaran['tahun_akademik'] ?>
            (<?= $tahun_ajaran['semester'] ?>)</u> </h3>
    <table class="table-responsive" style="width: 100%; page-break-after: never;" border="1" cellspacing="">
        <thead>
            <tr>
                <th style="text-align: center;padding: 10px;">No.</th>

                <th style="text-align: center;">NIM</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nonaktif as $x) : ?>
            <tr>
                <td style="text-align: center;">
                    <?= $no++ ?>
                </td>

                <td style="padding: 10px;"><?= $x['nim'] ?>
                </td>
                <td style="padding: 10px;">
                    <?= $x['nama'] ?>
                </td style="padding: 10px;">
                <td style="padding: 10px;">
                    <?= $x['email'] ?>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>