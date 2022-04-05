<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">KHS Mahasiswa/Tahun Akademik (Semester)</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Tahun</th>
                                <th style="text-align: center;">Semester</th>
                                <th style="text-align: center;">IPS</th>
                                <th style="text-align: center;">IPK</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($khs as $x) : ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no++ ?>
                                </td>

                                <td style="text-align: center;"><?= $x['tahun_akademik'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $x['semester'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $x['ips'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= $x['ipk'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('khs_mhs/cetak/' . $x['id_khs']); ?>"
                                        class="btn btn-social btn-sm btn-info"><i class="fa fa-print"></i> Cetak</a>
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