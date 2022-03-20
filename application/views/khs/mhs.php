<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!-- <a href="<?= base_url('k/tambah') ?>" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a> -->
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">NIM</th>
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
                                <td>
                                    <?= $x['nama'] ?>
                                </td>
                                <td>
                                    NIM.<?= $x['nim'] ?>
                                </td>

                                <td><?= $x['tahun_akademik'] ?>-<?= $x['semester'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $x['smt'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('khs/cetak/' . $x['id_krs']); ?>"
                                        class="btn btn-social  btn-sm btn-info"><i class="fa fa-print"></i> Lihat</a>
                                    <a href="<?= base_url('khs/validasi/' . $x['id_krs']); ?>"
                                        class="btn btn-social  btn-sm btn-info"><i class="fa fa-check"></i> Validasi</a>
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