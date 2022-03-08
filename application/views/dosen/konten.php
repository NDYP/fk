<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('dosen/tambah') ?>" class="btn btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th align="center">No.</th>
                                <th align="center">Foto</th>
                                <th align="center">NIP</th>
                                <th align="center">Nama</th>
                                <th align="center">Email</th>
                                <th align="center">Kontak</th>
                                <th align="center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dosen as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <div class="product-img">
                                        <img class="img center-block img-responsive img-thumnail"
                                            style="max-width: 200px;"
                                            src="<?= base_url('assets/foto/dosen/' . $x['foto']) ?>" alt="">
                                    </div>
                                </td>
                                <td><?= $x['nip'] ?>
                                </td>
                                <td>
                                    <?= $x['nama'] ?>
                                </td>
                                <td>
                                    <?= $x['email'] ?>
                                </td>
                                <td>
                                    <?= $x['kontak'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('dosen/edit/' . $x['id_dosen']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('dosen/hapus/' . $x['id_dosen']); ?>"
                                        class="btn btn-social-icon btn-warning tombol-hapus"><i
                                            class="fa fa-trash"></i></a>

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