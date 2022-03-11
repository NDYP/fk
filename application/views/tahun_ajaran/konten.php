<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('tahun_ajaran/tambah') ?>" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Tahun</th>
                                <th style="text-align: center;">Semester</th>
                                <th style="text-align: center;">Status</th>

                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($tahun_ajaran as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td><?= $x['tahun_akademik'] ?>
                                </td>
                                <td>
                                    <?= $x['semester'] ?>
                                </td>
                                <td>
                                    <?php if ($x['status'] == 1) : ?>
                                    Aktif
                                    <?php else : ?>
                                    Nonaktif
                                    <?php endif; ?>
                                </td>

                                <td style="text-align: center;">
                                    <a href="<?= base_url('tahun_ajaran/edit/' . $x['id_tahun_ajaran']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('tahun_ajaran/hapus/' . $x['id_tahun_ajaran']); ?>"
                                        class="btn btn-social-icon btn-danger tombol-hapus"><i
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