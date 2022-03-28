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
                                <th style="text-align: center;">IPK</th>
                                <th style="text-align: center;">Selesai pada</th>
                                <th style="text-align: center;">Status</th>
                                <!-- <th style="text-align: center;">Pembimbing Akademik</th> -->
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($transkrip as $x) : ?>
                            <tr>
                                <td align="center">
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
                                    <?= $x['ipk'] ?>
                                </td>
                                <td align="center">
                                    <?= date('M Y', strtotime($x['selesai_pada'])); ?>
                                </td>
                                <td align="center">
                                    <?= $x['status'] > 1 ? 'Disetujui' : 'Pengajuan' ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('transkrip/terima/' . $x['id_transkrip']); ?>"
                                        class="btn btn-social btn-success"><i class="fa fa-check"></i>Terima</a>
                                    <a href="<?= base_url('transkrip/tolak/' . $x['id_transkrip']); ?>"
                                        class="btn btn-social btn-success"><i class="fa fa-close"></i>Tolak</a>
                                    <a href="<?= base_url('transkrip/cetak/' . $x['id_transkrip']); ?>"
                                        class="btn btn-social btn-success"><i class="fa fa-eye"></i>Cetak</a>
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