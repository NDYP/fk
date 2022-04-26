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
                                    <?php if ($x['status'] == 0) : ?>
                                    Pengajuan
                                    <?php elseif ($x['status'] == 1) : ?>
                                    Ditolak (<?= $x['catatan_revisi'] ?>)
                                    <?php elseif ($x['status'] == 2) : ?>
                                    Diterima
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($x['status'] == 0) : ?>
                                    <a href="<?= base_url('surat_aktif/terima/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                    <!-- <a href="<?= base_url('surat_aktif/tolak/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social btn-sm btn-success"><i class="fa fa-close"></i> Tolak</a> -->
                                    <a data-no="<?= $x['id_surat_aktif']; ?>" data-toggle="modal"
                                        data-target="#modal-no<?= $x['id_surat_aktif']; ?>"
                                        class="btn btn-social btn-sm btn-success"><i class="fa fa-eye"></i>
                                        Tolak</a>
                                    <?php elseif ($x['status'] == 2) : ?>

                                    <a href="<?= base_url('surat_aktif/cetak/' . $x['id_surat_aktif']); ?>"
                                        class="btn btn-social btn-success"><i class="fa fa-print"></i> Cetak</a>
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
<?php $no = 0;
foreach ($surat_aktif as $z) : ?>
<div class="modal fade" id="modal-no<?= $z['id_surat_aktif']; ?>">
    <div class="modal-dialog">
        <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
            action="<?= base_url('surat_aktif/tolak/' . $z['id_surat_aktif']); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Alasan Penolakan</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $z['id_surat_aktif']; ?>" name="id_surat_aktif" id=""
                            class="form-control input-sm">
                        <div class="col-xs-12">
                            <label for="exampleInputEmail1">Catatan</label>
                            <input type="text" name="catatan_revisi" id="" class="form-control input-sm" required>
                            </select>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<?php endforeach; ?>
<!-- /.content -->