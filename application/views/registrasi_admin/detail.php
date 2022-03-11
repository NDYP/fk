<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('registrasi/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <!-- <a href="<?= base_url('registrasi/tambah/' . $id_registrasi) ?>" class="btn btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Mahasiswa</th>
                                <th style="text-align: center;">VA</th>
                                <th style="text-align: center;">Slip</th>
                                <th style="text-align: center;">Bukti</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($registrasi as $x) : ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no++ ?>
                                </td>
                                <td style="text-align: center;"><?= $x['nama'] ?> <br> NIM.<?= $x['nim'] ?>
                                </td>
                                <td style="text-align: center;"><?= $x['va'] ?>
                                </td>
                                </td>
                                <td style="text-align: center;">
                                    <a src="<?= base_url('assets/'); ?>foto/file.png"
                                        href="<?= base_url('registrasi/slip/' . $x['id_registrasi']) ?>">
                                        <img width="30px" src="<?= base_url('assets/'); ?>foto/file.png" alt="">
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a src="<?= base_url('assets/'); ?>foto/file.png"
                                        href="<?= base_url('registrasi/bukti/' . $x['id_registrasi']) ?>">
                                        <img width="30px" src="<?= base_url('assets/'); ?>foto/file.png" alt="">
                                    </a>
                                </td>
                                <td style="text-align: center;"><?= $x['status'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if ($x['status'] == 'Pengajuan') : ?>
                                    <a href="<?= base_url('registrasi/terima/' . $x['id_registrasi']); ?>"
                                        class="btn btn-social btn-sm btn-success"><i class="fa fa-eye"></i>
                                        Terima</a>
                                    <a href="<?= base_url('registrasi/tolak/' . $x['id_registrasi']); ?>"
                                        class="btn btn-social btn-sm btn-warning"><i class="fa fa-eye"></i>
                                        Tolak</a>
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