<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">


            <!-- /.box-header -->

            <!-- <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Jabatan</th>
                                <th style="text-align: center;">Dosen</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pejabat_fakultas as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['jabatan'] ?>
                                </td>
                                <td>
                                    <?= $x['nama'] ?> (NIP.<?= $x['nip'] ?> )
                                </td>
                                <td style="text-align: center;">

                                    <a href="<?= base_url('pejabat_fakultas/edit/' . $x['id_dekanat']); ?>"
                                        class="btn btn-social-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('pejabat_fakultas/hapus/' . $x['id_dekanat']); ?>"
                                        class="btn btn-social-icon btn-danger tombol-hapus"><i
                                            class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table> -->
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('pejabat_fakultas/tambah') ?>" class="btn btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <div class="col-md-12">

                </div>
                <div class="col-md-12">

                </div>

                <?php $no = 1;
                foreach ($pejabat_fakultas as $x) : ?>
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="box box">
                        <div class="box-body box-profile">
                            <img class="img-responsive img" src="<?= base_url('assets/foto/dosen/' . $x['foto']) ?>"
                                alt="User profile picture">

                            <h5 class="text-center"><b><?= $x['jabatan']; ?></b></h5>

                            <p class="text text-center"><b><?= $x['nama']; ?></b></p>
                            <p class="text-muted text-center"><b>NIP.<?= $x['nip']; ?></b></p>

                            <ul class="list-group list-group-unbordered">

                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right"><?= $x['email']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kontak</b> <a class="pull-right"><?= $x['kontak']; ?></a>
                                </li>

                            </ul>

                            <a href="<?= base_url('pejabat_fakultas/edit/' . $x['id_dekanat']); ?>" class="col-md-4"><i
                                    class="fa fa-edit"></i> Edit</a>
                            <a href="<?= base_url('pejabat_fakultas/hapus/' . $x['id_dekanat']); ?>"
                                class="col-md-5 pull-right tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- /.box-body -->

            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->