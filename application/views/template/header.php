<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD FK</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/skin-red-light.min.css">
    <link href="<?= base_url('assets/foto/3.png'); ?>" rel="icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-red-light fixed sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="<?= base_url('dosen') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/foto/3.png') ?>" class="img">
                    </div>
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/foto/3.png') ?>" class="img">
                    </div> <b>SIAKAD</b> FK
                </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?= base_url('assets/'); ?>foto/user.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?= $this->session->userdata('nama'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?= base_url('assets/'); ?>foto/user.png" class="img-circle"
                                        alt="User Image">

                                    <p>

                                        <?= $this->session->userdata('nama'); ?> <br>
                                        <?php if (!$this->session->userdata('id_admin')) : ?>
                                        <?php if ($this->session->userdata('id_mahasiswa')) : ?>
                                        NIM.<?= $this->session->userdata('nip'); ?>
                                        <?php else : ?>
                                        NIP.<?= $this->session->userdata('nip'); ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url('akun') ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url('login/logout') ?>" class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('assets/'); ?>foto/user.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> <?php if ($this->session->userdata('id_mahasiswa')) : ?>
                            NIM.<?= $this->session->userdata('nip'); ?>
                            <?php elseif ($this->session->userdata('id_dosen')) : ?>
                            NIP.<?= $this->session->userdata('nip'); ?>
                            <?php else : ?>
                            <?= $this->session->userdata('username'); ?>
                            <?php endif; ?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form (Optional) -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Akademik</li>
                    <!-- Optionally, you can add icons to the links -->
                    <?php if ($this->session->userdata('id_admin')) : ?>
                    <li class=""><a href="<?= base_url('beranda') ?>"><i class="fa fa-dashboard"></i>
                            <span>Beranda</span></a></li>
                    <li class=""><a href="<?= base_url('tahun_ajaran') ?>"><i class="fa fa-calendar"></i>
                            <span>Tahun Ajaran</span></a></li>
                    <li class=""><a href="<?= base_url('registrasi') ?>"><i class="fa fa-edit"></i>
                            <span>Registrasi</span></a></li>
                    <li class=""><a href="<?= base_url('krs') ?>"><i class="fa fa-print"></i>
                            <span>KRS </span></a></li>
                    <li class=""><a href="<?= base_url('nilai_mhs') ?>"><i class="fa fa-pencil"></i>
                            <span>Nilai Akhir </span></a></li>
                    <li class=""><a href="<?= base_url('khs') ?>"><i class="fa fa-print"></i>
                            <span>KHS </span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-folder"></i> <span>Pengajuan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('transkrip') ?>"><i class="fa fa-file"></i>
                                    <span>Transkrip Nilai</span></a></li>
                            <li><a href="<?= base_url('surat_aktif') ?>"><i class="fa fa-book"></i>
                                    <span>Surat Aktif</span></a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-book"></i> <span>Modul</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('modul') ?>"><i class="fa fa-list"></i>
                                    <span>Mata Kuliah</span></a></li>
                            <li><a href="<?= base_url('koordinator_modul') ?>"><i class="fa fa-user"></i>
                                    <span>Koordinator</span></a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i> <span>Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-user"></i>
                                    <span>Mahasiswa</span></a></li>
                            <li><a href="<?= base_url('dosen') ?>"><i class="fa fa-user"></i>
                                    <span>Dosen</span></a></li>
                            <li><a href="<?= base_url('pejabat_fakultas') ?>"><i class="fa fa-user"></i>
                                    <span>Pejabat Fakultas</span></a></li>
                            <li><a href="<?= base_url('prodi') ?>"><i class="fa fa-university"></i>
                                    <span>Program Studi</span></a></li>
                        </ul>
                    </li>
                    <?php elseif ($this->session->userdata('id_dosen')) : ?>
                    <li class=""><a href="<?= base_url('konsultasi') ?>"><i class="fa fa-users"></i>
                            <span>Konsultasi</span></a></li>
                    <li class=""><a href="<?= base_url('nilai_akhir') ?>"><i class="fa fa-print"></i>
                            <span>Nilai Akhir SMT</span></a></li>
                    <li class=""><a href="<?= base_url('bimbingan') ?>"><i class="fa fa-users"></i>
                            <span>Mahasiswa</span></a></li>
                    <li class=""><a href="<?= base_url('daftar_hadir') ?>"><i class="fa fa-users"></i>
                            <span>Daftar Hadir</span></a></li>
                    <?php elseif ($this->session->userdata('id_mahasiswa')) : ?>
                    <li class=""><a href="<?= base_url('registrasi_mhs') ?>"><i class="fa fa-print"></i>
                            <span>Registrasi </span></a></li>
                    <li class=""><a href="<?= base_url('krs_mhs') ?>"><i class="fa fa-print"></i>
                            <span>KRS</span></a></li>
                    <li class=""><a href="<?= base_url('khs_mhs') ?>"><i class="fa fa-print"></i>
                            <span>KHS</span></a></li>
                    <li class=""><a href="<?= base_url('surat_aktif_mhs') ?>"><i class="fa fa-print"></i>
                            <span>Surat Aktif</span></a></li>
                    <li class=""><a href="<?= base_url('transkrip_mhs') ?>"><i class="fa fa-print"></i>
                            <span>Transkrip</span></a></li>
                    <?php endif; ?>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $title; ?>
                    <small> <?= $title2; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class=""> <?= $title; ?></li>
                </ol>
            </section>