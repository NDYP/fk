<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">NIM</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Tahun Ajaran</th>
                                <th style="text-align: center;">Semester</th>
                                <th style="text-align: center;">Status</th>
                                <!-- <th style="text-align: center;">Pembimbing Akademik</th> -->
                                <th style="text-align: center;">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($surat_aktif as $x) : ?>
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
                                <td align="left">
                                    <?= $x['nim'] ?>
                                </td>
                                <td align="left">
                                    <?= $x['nama'] ?>
                                </td>
                                <td align="center">
                                    <?= $x['tahun_akademik'] ?> - <?= $x['semester'] ?>
                                </td>
                                <td align="center">
                                    <?= $x['smt'] ?>
                                </td>
                                <td align="center">
                                    <?= $x['status'] > 1 ? 'Disetujui' : 'Pengajuan' ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($x['status'] == 0) : ?>
                                    <a href="<?= base_url('surat_aktif/terima/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-check"></i></a>
                                    <a href="<?= base_url('surat_aktif/tolak/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-close"></i></a>
                                    <?php elseif ($x['status'] == 2) : ?>
                                    <a href="<?= base_url('surat_aktif/cetak/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-print"></i></a>
                                    <?php endif; ?>
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