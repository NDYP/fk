<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url() ?>image/kop/Fmipa_logo.png">

    <title>SIAKAD FK UPR</title>


    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .line-title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    .table-bordered {
        font-size: 10px;
        border: 1px solid #000;
    }

    .table td,
    .table th {
        padding: .10rem;
        text-align: center;
    }

    .table tr a,
    .table td a,
    .table th a {
        border: 1px solid black;
    }
    </style>

    <style>
    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 6px;
        border: 0px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: black;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 15%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-26 {
        float: left;
        width: 23%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-30 {
        float: left;
        width: 40%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-75 {
        float: left;
        width: 25%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-20 {
        float: right;
        width: 15%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-10 {
        float: right;
        width: 10%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-50 {
        float: right;
        width: 20%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-55 {
        float: right;
        width: 35%;
        margin-top: 6px;
        font-size: 15px;
    }

    .col-45 {
        float: left;
        width: 35%;
        margin-top: 6px;
        font-size: 15px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    </style>

    <style>
    p.big {
        font-size: x-small;
        line-height: 1;
        vertical-align: middle;
    }
    </style>

</head>

<body>
    <img src="image/kop/logo_upr.jpg" style="position: absolute; width: 90px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1; font-weight: bold;">
                    KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN
                    <br>UNIVERSITAS PALANGKA RAYA
                    <br>FAKULTAS MATEMATIKA DAN ILMU PENGETAHUAN ALAM
                    <br>
                    <small> Kampus UPR Tunjung Nyaho, Jalan Hendrik Timang, Palangka Raya, Kalimantan Tengah
                        <br>
                    </small>
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    <p align="center"><b>
            Kartu Rencana Studi</b><br>
    </p>

    <div class="row container-fluid">
        <div class="col-25">
            <p class="big">Nama
                <br>NIM
                <br>Alamat
                <br>Fakultas
                <br>Jurusan
            </p>
        </div>
        <div class="col-75">
            <p class="big">:<?= $row->nama_mhs ?>
                <br>:<?= $row->nim_mhs ?>
                <br>:<?= $row->alamat_jln ?>
                <br>:<?= $row->fakultas ?>
                <br>:<?= $row->nama_jurusan ?>
            </p>
        </div>
        <div class="col-75">

        </div>
        <div class="col-20">
            <p class="big">:<?= $row->nama_jurusan ?>
                <br>:S1
                <br>:<?= $row->tahun_akademik ?>
                <br>:<?= $row->sm ?>
                <br>:<?= $dosen_pa->nama_dosen ?>
            </p>
        </div>
        <div class="col-50">
            <p class="big">Program Studi
                <br>Jenjang
                <br>Th. Akademik
                <br>Semester
                <br>Dosen P. A.
            </p>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No. Urut</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
            <th>Kel. M.K.</th>
            <th>Kredit</th>
            <th>Nama Dosen</th>
            <th>NIP</th>
        </tr>
        <?php $i = 1;
        $tot_sks = 0;

        foreach ($detail_matkul as $data) {
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?= $data['kd_mk'] ?></td>
            <td><?= $data['nm_mk'] ?></td>
            <td><?= $data['kel_mk'] ?></td>
            <td><?= $data['sks'] ?></td>
            <td><?= $data['nama_dosen'] ?></td>
            <td><?= substr($data['nip'], 0, 8) . ' ' . substr($data['nip'], 8, 6) . ' ' . substr($data['nip'], 14, 1) . ' ' . substr($data['nip'], 15, 3) ?>
            </td>
        </tr>
        <?php $i++;
            $sks_prog = $data['sks_diambil'];
            $sks_prog1 = $data['tot_sks_tempuh'];
        } ?>
        <tr>
            <td colspan=4> Kredit yang diprogramkan semester ini </td>
            <td><?= $sks_prog  ?></td>
            <td colspan=2></td>
        </tr>

        <tr>
            <td colspan=4> Jumlah Kredit yang dikumpulkan s/d semester lalu </td>
            <td><?= $sks_prog1 ?></td>
            <td colspan=2></td>
        </tr>
    </table>
    <?php
    $tot_sks = 0;
    $totKN = 0;
    $ipk = $ipk;
    if ($semester_rs >= 1) {
        if ($ipk < 2) {
            $beban_studi = 12;
        } else if (($ipk >= 2) && ($ipk <= 2.50)) {
            $beban_studi = 15;
        } else if (($ipk >= 2.51) && ($ipk <= 2.74)) {
            $beban_studi = 18;
        } else if (($ipk >= 2.75) && ($ipk <= 2.99)) {
            $beban_studi = 21;
        } else if ($ipk >= 3) {
            $beban_studi = 24;
        }
    } elseif ($semester_rs < 1) {
        $beban_studi = 24;
    }
    ?>

    <div class="row container-fluid">
        <div class="col-26">
            <p class="big">IP. semester lalu
                <br> Jumlah kredit yang
                <br> diijinkan
            </p>
        </div>
        <div class="col-75">
            <p class="big">:<?= number_format($ipk, 2) ?>
                <br><br>:<?= $beban_studi ?>
            </p>
        </div>
        <div class="col-75">
        </div>

        <div class="col-55">
            <p align="center" class="big">Palangka Raya, <?= indo_date($row->tgl_disetujui) ?>
                <br> Mahasiswa Yang Bersangkutan,
                <br>
                <br>
            <p align="center"> <Span style="line-height: 1; font-size: x-small;"><?= $row->nama_mhs ?>
                    <br><?= $row->nim_mhs ?></Span></p>
            </p>
        </div>
    </div>

    <div class="row container-fluid">
        <div class="col-30">
            <p class="big">KRS dibuat 4 (empat) rangkap
                <br>1. Putih - Mahasiswa ybs
                <br>2. Hijau - Dosen P.A
                <br>3. Merah - Fakultas
                <br>4. Biru Tua - BAAK
            </p>
        </div>
    </div>

    <div class="row container-fluid">
        <div class="col-26">
        </div>
        <div class="col-45">
            <p align="center" class="big">Mengetahui :
                <br> Ketua Jurusan / Program Studi,
                <br>
                <br>
                <br>
            <p align="center"> <Span style="line-height: 1; font-size: x-small;"><?= $kajur->nama_kajur ?>
                    <br>NIP.
                    <?= substr($kajur->kajur, 0, 8) . ' ' . substr($kajur->kajur, 8, 6) . ' ' . substr($kajur->kajur, 14, 1) . ' ' . substr($kajur->kajur, 15, 3) ?></Span>
            </p>
            </p>
        </div>
        <div class="col-75">
        </div>
        <div class="col-55">
            <p align="center" class="big">Mengetahui :
                <br> Dosen Pembimbing Akademik,
                <br>
                <br>
                <br>
            <p align="center"> <Span style="line-height: 1;font-size: x-small;"><?= $dosen_pa->nama_dosen ?>
                    <br>NIP.
                    <?= substr($dosen_pa->dsn_pa, 0, 8) . ' ' . substr($dosen_pa->dsn_pa, 8, 6) . ' ' . substr($dosen_pa->dsn_pa, 14, 1) . ' ' . substr($dosen_pa->dsn_pa, 15, 3) ?></Span>
            </p>
            </p>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
</body>

</html>