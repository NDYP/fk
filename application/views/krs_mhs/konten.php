<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('krs_mhs/tambah') ?>" class="btn btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Tahun Akademik</th>
                                <th style="text-align: center;">Semester</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($krs as $x) : ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no++ ?>
                                </td>

                                <td style="text-align: center;"><?= $x['tahun_akademik'] ?>-<?= $x['semester'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $x['smt'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('registrasi/lihat/' . $x['id_tahun_ajaran']); ?>"
                                        class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Registrasi
                                        Mahasiswa</a>
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