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
                KARTU RENCANA STUDI (KRS)</b>
    </p>
    <br>
    <table width=100%>

        <tr>
            <td width=70>
                NIM
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['nim']; ?>
            <td></td>
            <td width=70>
                Program Studi
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['program_studi']; ?>
        </tr>
        <tr>
            <td width=70>
                No. Reg
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                -
            <td></td>
            <td width=70>
                Jenjang
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['prodi'] < 4 ? 'Sarjana / S1' : 'Dokter Umum'; ?>
        </tr>

        <tr>
            <td width=70>
                NAMA
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['nama']; ?>
            <td></td>
            <td width=90>
                Tahun Akademik
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['tahun_akademik']; ?> (<?= $detail_krs['semester']; ?>)
        </tr>

        <tr>
            <td width=70>
                Alamat
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=150>
                <?= $detail_krs['alamat']; ?>
            <td></td>
            <td width=70>
                Semester
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= number_format($detail_krs['smt']); ?>
        </tr>

        <tr>
            <td width=70>
                Fakultas
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                Kedokteran
            <td></td>
            <td width=70>
                Dosen P.A
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=160>
                <?= $detail_krs['dosen_pa']; ?>
        </tr>
        <tr>
            <td width=70>
                Prodi
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $detail_krs['program_studi']; ?>
            <td></td>
            <td width=70>
                No. Sandi Dosen
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130 style="padding-right: 1px;">
                <?= $detail_krs['nip']; ?>
        </tr>
    </table>
    <br>
    <div class="row container-fluid">
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="1" cellspacing="">
            <tr>
                <th style="padding-left: 5px; padding-right:5px;">No. <br> Urut</th>
                <th>Kode <br> Mata <br> Kuliah</th>
                <th>
                    Mata Kuliah
                </th>
                <th>Kelompok <br>M.K</th>
                <th>Kredit</th>
                <th>Nama Dosen</th>
                <th>NIP <br> Dosen</th>
            </tr>
            <?php $no = 1;
            foreach ($krs as $x) : ?>
            <tr>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"> <?= $no++ ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['kode']; ?></td>
                <td style="text-align: center;padding-left: 3px; padding-right:3px;">
                    <?= $x['mata_kuliah']; ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">-</td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['sks']; ?></td>
                <td style="text-align: left;padding-left: 5px; padding-right:5px;">
                    1. <?= $x['nama_ketua'] ?>
                    <br>
                    2. <?= $x['nama'] ?>
                </td>
                <td style="text-align: left;padding-left: 5px; padding-right:5px;"><?= $x['nip_ketua'] ?> <br>
                    <?= $x['nip'] ?></td>
            </tr>
            <?php endforeach; ?>
            <tr font size="2">
                <th colspan="6" style="border: 0;text-align: center;">Jumlah kredit yang dipogramkan semester ini</th>
                <th width=10 colspan="1" style="border: 0;text-align: left;"> : <?= $detail_krs['sks_yad']; ?></th>
            </tr>
            <tr font size="2">
                <th colspan="6" style="border: 0;text-align: center;">Jumlah kredit yang dikumpulkan s/d semester lalu
                </th>
                <th colspan="1" style="border: 0; text-align: left;"> : <?= $detail_krs['sks_kumultatif'] ?: 0; ?></th>
            </tr>
        </table>
    </div>
    <br>
    <table width=100%>

        <tr>
            <td width=80>
                IP. Semester lalu
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=180>
                <?= $detail_krs['ips'] ?: 0; ?>
            <td width="190" style="text-align: center;">
                Palangkaraya, <?= tanggal() ?>
            </td>
        </tr>
        <tr>
            <td width=70>
            </td>
            <td width=5 style="padding: 1px; margin: 1px"></td>
            <td width=130>
            </td>


            <td width=70>

            </td>
            <td width=5 style="padding: 1px; margin: 1px"></td>
            <td width=130>

        </tr>

        <tr>
            <td width=70>
                Jumlah kredit yang diijinkan
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                - </td>

            <td width="190" style="text-align: center;">
                Mahasiswa yang bersangkutan,
            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=>
        </tr>
        <tr>
            <td width=70 height="40">
            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=130>
            </td>

            <td width="100" style="text-align: center;">
            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=>
        </tr>
        <tr>
            <td width=70>
            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=100>
            </td>

            <td width="100" style="text-align: center;">
                <b><u> <?= $detail_krs['nama']; ?></u></b>
            </td>
            <td width=5 style="padding: 1px; margin: 1px"></td>
        </tr>
        <tr>
            <td width=150> <b><u>KRS dibuat 4 (empat) rangkap.</u></b>
            </td>
            <td width=5 style="padding: 1px; margin: 1px"> </td>
            <td width=>
            </td>
            <td width="100" style="text-align: center;">
                NIM.<?= $detail_krs['nim']; ?>
            </td>
            <td width=5 style="padding: 1px; margin: 1px"></td>
        </tr>

    </table>
    <table>
        <tr>
            <td width=30>
                1. Putih
            </td>
            <td width=5>
                -
            </td>
            <td width=70>
                Mahasiswa ybs
            </td>
        </tr>
        <tr>
            <td>
                2. Hijau
            </td>
            <td>
                -
            </td>
        </tr>
        <tr>
            <td>
                3. Merah
            </td>
            <td>
                -
            </td>
        </tr>
        <tr>
            <td>
                4. Biru
            </td>
            <td>
                - </td>
        </tr>
    </table>
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
                        <font face="Arial Rounded MT Bold">Membenarkan,<br>Ketua Jurusan / Prodi
                            <br> <br><br><br><br>
                            <p><b><u> <?= $detail_krs['kaprodi']; ?><br></u></b>NIP. <?= $detail_krs['nip_kaprodi']; ?>
                </td>
                <td width=30></td>
                <td width="190" height="120">
                    <center>
                        <font face="Arial Rounded MT Bold">Mengetahui,<br>Dosen Pembimbing
                            Akademik<br><br><br><br><br>
                            <p><b><u> <?= $detail_krs['dosen_pa']; ?></u></b><br>NIP. <?= $detail_krs['nip']; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>