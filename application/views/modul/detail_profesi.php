<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('modul/index') ?>" class="btn-social btn btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <a href="<?= base_url('modul/tambah/' . $prodi) ?>" class="btn btn-social btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Kode MK</th>
                                <th style="text-align: center;">Mata Kuliah</th>
                                <th style="text-align: center;">SKS</th>

                                <th style="text-align: center;">Tahun</th>
                                <th style="text-align: center;">Durasi</th>

                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($modul as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['kode'] ?></td>
                                <td><?= $x['mata_kuliah'] ?>
                                <td><?= $x['sks'] ?>
                                <td><?= $x['tahun'] ?>
                                <td><?= $x['durasi'] ?> minggu
                                <td style="text-align: center;">
                                    <a href="<?= base_url('modul/edit/' . $x['id_modul']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('modul/hapus/' . $x['id_modul']); ?>"
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