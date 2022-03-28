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
        margin: 5px;
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
    <p align="center">
        <font face="Arial Rounded MT Bold" font size="4"> <b>
                KARTU HASIL STUDI</b>
    </p>
    <br>
    <table width=100%>
        <tr>
            <td width=100>
                Nama
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=170>
                <?= $khs['nama'] ?>
            <td></td>
            <td width=100>
                Program Studi
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130><?= $khs['program_studi'] ?></td>
        </tr>
        <tr>
            <td width=70>
                NIM
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $khs['nim'] ?>
            <td></td>
            <td width=70>
                Jenjang
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $khs['prodi'] < 4 ? 'Sarjana / S1' : 'Dokter Umum'; ?> </td>
        </tr>
        <tr>
            <td width=70>
                Pembimbing Akademik
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130> <?= $khs['dosen_pa'] ?> </td>
            <td></td>
            <td width=90>
                Semester
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130> <?= $khs['semester'] ?> </td>
        </tr>
    </table>
    <br>
    <div class="row container-fluid">
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="0" cellspacing="">
            <tr>
                <td colspan="7" style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0">
                </td>
            </tr>
            <tr>
                <th
                    style="padding-left: 5px; padding-right:5px;text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    No.</th>
                <th
                    style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    Kode Mata
                    Kuliah</th>
                <th style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style:
                    dashed;">
                    Mata
                    Kuliah</th>
                <th
                    style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    SKS
                </th>
                <th
                    style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    N</th>
                <th
                    style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    SKSN</th>
                <th
                    style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                    HM</th>
            </tr>
            <?php $no = 1;
            foreach ($list as $x) : ?>
            <tr>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $no++ ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['kode']; ?></td>
                <td style="text-align: left;padding-left: 5px; padding-right:5px;"><?= $x['mata_kuliah']; ?>
                </td>
                <td style="text-align: center;padding-left: 3px; padding-right:3px;"><?= $x['sks']; ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['angka']; ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['sks'] * $x['angka']; ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['mutu']; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="7"
                    style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0; border-style: dashed;">
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0">
                </td>
            </tr>
        </table>
    </div>
    <br>
    <table class="table-responsive" cellspacing="0" border="">
        <tr>
            <td style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=30>
            </td>
            <td style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=10>
            </td>
            <th colspan="2"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                SKS
            </th>
            <th rowspan="2"
                style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=60>
                Angka Mutu
            </th>
            <th rowspan="2"
                style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                IP
            </th>
        </tr>
        <tr>
            <td style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
            </td>
            <td style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=10>
            </td>
            <th style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                Beban
            </th>
            <th style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                Lulus
            </th>

        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                Semester
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                :
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sks_semester_beban'] ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sks_semester_lulus'] ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sksn_semester'] ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= number_format($khs['ips'], 2) ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                Kumultatif
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                :
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sks_kumultatif_beban'] ?: '-' ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sks_kumultatif_lulus'] ?: '-' ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= $khs['sksn_kumultatif'] ?>
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                <?= number_format($khs['ipk'], 2) ?>
            </td>
        </tr>
    </table>
    <br>
    <table width=100%>
        <tr>
            <td width=300> <b>CATATAN PENGEMBANGAN PRESTASI PER SEMESTER</b>
            </td>
        </tr>
    </table>
    <table class="table-responsive" cellspacing="" border="">
        <tr>
            <td style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=50>
                Semester
            </td>
            <td style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                SKS
            </td>
            <td style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=50>
                IP Smt
            </td>
            <td
                style="text-align: center; border-top:1;border-bottom:1;border-left:0; border-right:0;border-style: dashed;">
                IPK
            </td>
        </tr>
        <?php foreach ($khs_list as $x) : ?>
        <tr style="text-align: center; border-bottom:0;border-top:0;border-left:0;border-right:0;border-style:dashed;">
            <td style="text-align: center;border-top:0;border-bottom:0;border-left:0; border-right:0" width=>
                <?= $x['semester'] ?>
            </td>
            <td style="text-align: center;border-top:0;border-bottom:0;border-left:0; border-right:0" width=>
                <?= $x['sks_semester_beban'] ?>
            </td>
            <td style="text-align: center;border-top:0;border-bottom:0;border-left:0; border-right:0" width=>
                <?= number_format($x['ips'], 2) ?>
            </td>
            <td style="text-align: center;border-top:0; border-bottom:0;border-left:0; border-right:0;" width=>
                <?= number_format($x['ipk'], 2) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <table width=100%>
        <tr>
            <td width=300>
            </td>
            <td width=30>
            </td>
            <td style="text-align: left;" width=>Palangkaraya,
                <br>
                Wakil Dekan Bidang Akademik,
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $khs['ttd_nama'] ?>
                <br>
                <?= $khs['ttd_nip'] ?>
            </td>
        </tr>
    </table>
</body>

</html>