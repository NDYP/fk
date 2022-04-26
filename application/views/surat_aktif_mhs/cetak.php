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
        font-size: 15px;

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
        style="padding:0%;position: absolute; width: 100px; height: auto; color: orange" class="img">
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
                <br>
                <span style="line-height: 2;">
                    <font style="line-height: 1;" face="Times New Roman" font size="2">
                        Alamat : Desa Lawang Kamah RT.02 Kode Pos 73554
                        <br>
                        <font style="line-height: 1;" face="Times New Roman" font size="2">
                            Telepon (0536) 4215402, 4215277, 4215179
                            <br>
                            <font style="line-height: 1;" face="Times New Roman" font size="2">
                                Laman : http://fk-upr.ac.id; Pos-el (E-mail): f.ked.upr@gmail.com
                                <br>
                </span>
            </td>
        </tr>
        <hr class="line-title">
        <hr class="line-title">
    </table>
    <p align="center">
        <font face="Arial Rounded MT Bold" font size="4"> <b>
                <u>SURAT KETERANGAN AKTIF KULIAH</u> </b>
            <br>
            <font face="Arial Rounded MT Bold" font size="4">
                <b>
                    Nomor : <?= ctype_space(date('Y')) ?>/UN24.9/PD/<?= date('Y') ?></b>
    </p>
    <br>
    <p align="left">
        <font face="Arial Rounded MT" font size="3">
            Dekan Fakultas Kedokteran Universitas Palangka Raya dengan ini menerangkan bahwa :
    </p>
    <br>
    <table width=100%>
        <tr>
            <td width=100>
                Nama
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td>
                <?= $surat_aktif['nama'] ?>
        </tr>
        <tr>
            <td width=100>
                NIM
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td>
                <?= $surat_aktif['nim'] ?>
        </tr>

        <tr>
            <td width=70>
                Program Studi
            </td>
            <td style="padding: 1px; margin: 1px">: </td>
            <td>
                <?= $surat_aktif['program_studi'] ?>
            </td>
        </tr>
    </table>
    <br>
    <p align="left">
        <font face="Arial Rounded MT" font size="3">
            Nama tersebut diatas adalah Mahasiswa Fakultas Kedokteran Universitas Palangka Raya terdaftar pada Tahun
            Akademik <?= $surat_aktif['tahun_masuk'] ?> dan Aktif dalam perkuliahan sampai saat ini di Semester Genap
            Tahun Akademik
            <?= $surat_aktif['tahun_akademik'] ?>.
    </p>
    <br>
    <p align="left">
        <font face="Arial Rounded MT" font size="3">
            Demikian Surat Keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.
    </p>
    <br>
    <br>
    <br>
    <table width=100%>
        <tr>
            <td width=300>
            </td>
            <td width=30>
            </td>
            <td style="text-align: left;" width=>Palangkaraya, <?= tanggal() ?>
                <br>
                Wakil Dekan Bidang Akademik,
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $surat_aktif['ttd_nama'] ?>
                <br>
                <?= $surat_aktif['ttd_nip'] ?>
            </td>
        </tr>
    </table>

</body>

</html>