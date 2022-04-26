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
                TRANSKRIP NILAI SEMEMNTARA</b>
            <br>
            <font face="Arial Rounded MT Bold" font size="3">
                Mahasiswa S-1 Program Studi Pendidikan Dokter
    </p>
    <br>
    <table width=100%>
        <tr>
            <td width=100>
                NAMA
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= strtoupper($transkrip['nama']) ?>
            <td></td>
        </tr>
        <tr>
            <td width=100>
                NIM
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                <?= $transkrip['nim'] ?>

            <td></td>
        </tr>
        <tr>
            <td width=70>
                FAKULTAS
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130>
                KEDOKTERAN
            </td>
        </tr>
        <tr>
            <td width=70>
                PROGRAM STUDI
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td><?= strtoupper($transkrip['prodi']) ?></td>
            <td width=130> </td>
        </tr>
        <tr>
            <td width=70>
                JENJANG
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td><?= strtoupper($transkrip['jenjang']) ?></td>
            <td width=130> </td>
        </tr>
        <tr>
            <td width=70>
                SELESAI PADA
            </td>
            <td width=5 style="padding: 1px; margin: 1px">: </td>
            <td width=130> - </td>
        </tr>
    </table>
    <br>
    <div class="row container-fluid">
        <table class="table-responsive" style="width: 100%; page-break-after: never;" border="2" cellspacing="">
            <tr border="2">
                <th style="padding-left: 5px; padding-right:5px;text-align: center;" width=15>
                    No.</th>
                <th style="text-align: center;">
                    MK</th>
                <th style="text-align: center;">
                    KM
                </th>
                <th style="text-align: center;">
                    SKS</th>
                <th style="text-align: center;">
                    N</th>
                <th style="text-align: center;">
                    SKSN</th>
                <th style="text-align: center;">
                    HM </th>
            </tr>
            <?php $no = 1;
            foreach ($list as $x) : ?>
            <tr border="2">
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $no++ ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['mata_kuliah'] ?>
                </td>
                <td style="text-align: center;padding-left: 3px; padding-right:3px;">
                    <?= $x['kode'] ?>
                </td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['sks'] ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['angka'] ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <?= number_format($x['sks'] * $x['angka']) ?></td>
                <td style="text-align: center;padding-left: 5px; padding-right:5px;"><?= $x['mutu'] ?></td>
            </tr>
            <?php endforeach; ?>
            <tr border="2">
                <td colspan="3" style="text-align: center;padding-left: 5px; padding-right:5px;"><b>JUMLAH</b></td>
                <td colspan="" style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <b><?= $list_sum['jumlah_sks'] ?></b>
                </td>
                <td colspan="" style="text-align: center;padding-left: 5px; padding-right:5px;"></td>
                <td colspan="" style="text-align: center;padding-left: 5px; padding-right:5px;">
                    <b><?= $list_sum['jumlah_angka'] ?></b>
                </td>
                <td colspan="" style="text-align: center;padding-left: 5px; padding-right:5px;"><b></b></td>
            </tr>
            <tr border="2">
                <td colspan="2" style="border-bottom: 1;border-top:0;border-left:0;border-right:0;text-align: center;">
                    Jumlah Kredit yang
                    dicapai (SKS)</td>
                <td colspan="" style="border-bottom: 1;border-top:0;border-left:0;border-right:0;text-align: left;">=
                    <?= $transkrip['sks'] ?></td>
                <td colspan="2" style="border-bottom: 1;border-top:0;border-left:0;border-right:0;text-align: center;">
                    Jumlah Kredit Kali
                    Nilai (ΣSKS.N)</td>
                <td colspan="2" style="border-bottom: 1;border-top:0;border-left:0;border-right:0;text-align: left;">=
                    <?= $transkrip['sksn'] ?></td>
            </tr>
            <tr border="2">
                <td colspan="7" style="border: 0;text-align: center;">IPK = <?= number_format($transkrip['ipk'], 2) ?>
                </td>
                <!-- <td colspan="4" style="border: 0;text-align: left;">= <?= $transkrip['ipk'] ?></td> -->
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <table style="page-break-after: always;" width=100%>
        <tr>
            <td width=300>
            </td>
            <td width=30>
            </td>
            <td style=" text-align: left;" width=>Palangkaraya,
                <br>
                Wakil Dekan Bidang Akademik,
                <br>
                <br>
                <br>
                <br>
                <br>
                <?= $transkrip['ttd_nama'] ?>
                <br>
                NIP.<?= $transkrip['ttd_nip'] ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table width=100%>
        <tr>
            <td width=300> <b>KETERANGAN</b>
            </td>
        </tr>
    </table>
    <table class="table-responsive" cellspacing="0" border="">
        <tr>
            <th rowspan="2"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=70>
                Nilai Persentil
            </th>
            <th colspan="2"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                SKS
            </th>
        </tr>
        <tr>
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
                80 - 100
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                4,00
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                A
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                75 - 79.99
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                3,50
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                B+
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                70 -74.99
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                3,00
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                B
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                65 - 69.99
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                2,50
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                C+
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                60 - 64.99
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                2,00
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                C
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;">
                <?= '49.99'; ?> </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;">
                -
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;">
                E
            </td>
        </tr>
        <tr>
            <td colspan="3"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=30>
            </td>
        </tr>
    </table>
    <br>
    <table class="table-responsive" cellspacing="0" border="">
        <tr>
            <th colspan="2"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=70>
                Predikat Lulus
            </th>
        </tr>
        <tr>
            <th style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=70>
                IPK
            </th>
            <th style="text-align: center; border-top:0;border-bottom:1;border-left:0; border-right:0;border-style: dashed;"
                width=30>
                Sebutan
            </th>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                2.76 - 3.00
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                Memuaskan
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                3.01 - 3.50
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                Sangat Memuaskan
            </td>
        </tr>
        <tr>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                3.51 - 4.00
            </td>
            <td style="text-align: center;border-bottom:0;border-left:0; border-right:0;border-style: dashed;" width=>
                Dengan Pujian <br> (Cum Laude )
            </td>
        </tr>
        <tr>
            <td colspan="3"
                style="text-align: center; border-top:1;border-bottom:0;border-left:0; border-right:0;border-style: dashed;"
                width=30>
            </td>
        </tr>
    </table>
</body>

</html>