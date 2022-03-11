<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">NIM</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Email</th>
                                <!-- <th style="text-align: center;">Pembimbing Akademik</th> -->
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mahasiswa as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <div class="product-img">
                                        <img class="img center-block img-responsive img-thumnail"
                                            style="max-width: 200px;"
                                            src="<?= base_url('assets/foto/mahasiswa/' . $x['foto']) ?>" alt="">
                                    </div>
                                </td>
                                <td><?= $x['nim'] ?>
                                </td>
                                <td>
                                    <?= $x['nama'] ?>
                                </td>
                                <td>
                                    <?= $x['email'] ?>
                                </td>
                                <!-- <td>
                                    <?= $x['nama_dosen'] ?>
                                </td> -->
                                <td style="text-align: center;">
                                    <a href="<?= base_url('mahasiswa/detail/' . $x['id_mahasiswa']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('mahasiswa/edit/' . $x['id_mahasiswa']); ?>"
                                        class="btn btn-social-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('mahasiswa/hapus/' . $x['id_mahasiswa']); ?>"
                                        class="btn btn-social-icon btn-danger tombol-hapus"><i class=" fa
                                        fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->