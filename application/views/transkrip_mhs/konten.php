<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
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
                                    <?php if ($x['status'] == 2) : ?>
                                    <a href="<?= base_url('transkrip_mhs/cetak/' . $x['id_transkrip']); ?>"
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pengajuan Transkrip</h4>
            </div>
            <form action="<?= base_url('transkrip_mhs/tambah'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input name="nama" value="<?= $list['nama']; ?>" type="text" class="form-control" id=""
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input name="nim" value="<?= $list['nim']; ?>" type=" text" class="form-control" id=""
                                    placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prodi</label>
                                <input name="prodi" value="<?= $list['program_studi']; ?>" type="text"
                                    class="form-control" id="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenjang</label>
                                <input name="jenjang"
                                    value="<?= $list['prodi'] < 4 ? 'Sarjana / S1' : 'Dokter Umum'; ?>" type=" text"
                                    class="form-control" id="" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total SKS Lulus</label>
                                <input name="sks" value="<?= $list['sks']; ?>" type="text" class="form-control" id=""
                                    placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">IPK</label>
                                <input name="ipk" value="<?= $ipk; ?>" type="text" class="form-control" id=""
                                    placeholder="" readonly>
                                <input name="sksn" value="<?= $sksn; ?>" type="hidden" class="form-control" id=""
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Selesai pada</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="selesai_pada"
                                        value="<?= set_value('selesai_pada'); ?>" id="datepicker" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>