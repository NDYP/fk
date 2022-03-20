<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('nilai_mhs/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Prodi</th>
                                <th style="text-align: center;">Kode MK</th>
                                <th style="text-align: center;">Mata Kuliah</th>
                                <th style="text-align: center;">SKS</th>
                                <th style="text-align: center;">Semester</th>
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
                                <td><?= $x['program_studi'] ?></td>
                                <td><?= $x['kode'] ?></td>
                                <td><?= $x['mata_kuliah'] ?>
                                <td><?= $x['sks'] ?>
                                <td><?= $x['smt'] ?>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('nilai_mhs/detail/' . $x['id_modul']); ?>"
                                        class="btn btn-social btn-sm btn-info"><i class="fa fa-eye"> </i>Input Nilai
                                        KRS</a>
                                    <a href="<?= base_url('nilai_mhs/cetak/' . $x['id_modul']) ?>"
                                        class="btn btn-social btn-sm btn-danger"><span class="fa fa-print"></span>
                                        Cetak list nilai</a>
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