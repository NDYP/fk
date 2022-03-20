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
        border-color: orange;
        color: orange;
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
        style="padding:0%;position: absolute; width: 70px; height: auto; color: orange" class="img">
    <table class="x" style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1; font-weight: bold;">
                    <font style="line-height: 0.5; color : orange" face="Arial Rounded MT Bold" font size="4">
                        KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN</font>
                    <font style="color : orange" face="Arial Rounded MT Bold" font size="6">
                        <br>UNIVERSITAS PALANGKA RAYA
                    </font>
                </span>
            </td>
        </tr>
        <hr class="line-title">
        <hr class="line-title">
    </table>
    <p align="center">
        <font face="Arial Rounded MT Bold" font size="4"> <b>
                DAFTAR NILAI AKHIR</b>
    </p>
    <br>
    <table width=100%>

        <tr>
            <td width=100>
                Kode MK
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=500>
                <?= $detail_modul['kode'] ?>

            <td width=100>
                Fakultas
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=100>
                Kedokteran
        </tr>
        <tr>
            <td width=10>
                Mata Kuliah
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_modul['mata_kuliah']; ?>

            <td width=20>
                Jenjang
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_modul['prodi'] < 4 ? 'Sarjana / S1' : 'Dokter Umum'; ?>
        </tr>

        <tr>
            <td width=10>
                SKS
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_modul['sks']; ?>

            <td width=40>
                Tahun Akademik
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=120>
                <?= $detail_modul['tahun_akademik']; ?> (<?= $detail_modul['semester']; ?>)
        </tr>

        <tr>
            <td width=10>
                Program Studi
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_modul['program_studi']; ?>

            <td width=10>

            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=130>

        </tr>
    </table>
    <br>
    <div class="row container-fluid">
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="1" cellspacing="">
            <tr>
                <th style="padding-left: 5px; padding-right:5px;">No. Urut</th>
                <th>Nama</th>
                <th>
                    NIM
                </th>
                <th>Semester</th>
                <th>Kredit</th>
                <th>Nilai</th>
                <th>Angka</th>
                <th>Mutu</th>
                <th>Keterangan</th>
            </tr>
            <?php $no = 1;
            foreach ($mahasiswa as $x) : ?>
            <tr>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"> <?= $no++ ?></td>
                <td style="text-align: left;padding-left: 5px; padding-right:5px;"><?= $x['nama']; ?></td>
                <td style="text-align: left;padding-left: 3px; padding-right:3px;">
                    <?= $x['nim']; ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['semester'] ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['sks']; ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <?= $x['nilai'] ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <?= $x['angka'] ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <?= $x['mutu'] ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <?= $x['keterangan'] ?></td>
            </tr>
            <?php endforeach; ?>
            <tr font size="2">
                <th colspan="4" style="border: 0;text-align: center;">Jumlah mahasiswa lulus</th>
                <th width=10 colspan="5" style="border: 0;text-align: left;"> : </th>
            </tr>
            <tr font size="2">
                <th colspan="4" style="border: 0;text-align: center;">Jumlah mahasiswa tidak lulus
                </th>
                <th colspan="5" style="border: 0; text-align: left;"> :
                </th>
            </tr>
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
                        <font face="Arial Rounded MT Bold">Membenarkan,<br>Ketua Modul
                            <br> <br><br><br><br>
                            <p><b><u> <?= $detail_modul['nama_ketua']; ?><br></u></b>NIP.
                                <?= $detail_modul['nip_ketua']; ?>
                </td>
                <td width=400></td>
                <td width="190" height="120">
                    <center>
                        <font face="Arial Rounded MT Bold">Mengetahui,<br>Sekretaris Modul<br><br><br><br><br>
                            <p><b><u> <?= $detail_modul['nama_sekretaris']; ?></u></b><br>NIP.
                                <?= $detail_modul['nip_sekretaris']; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>