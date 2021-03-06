<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('koordinator_modul/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <a href="<?= base_url('koordinator_modul/tambah/' . $id_tahun_ajaran) ?>"
                        class="btn btn-social btn btn-sm bg-red"><i class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">NIP</th>
                                <th style="text-align: center;">Sekretaris</th>
                                <th style="text-align: center;">Modul</th>
                                <th style="text-align: center;">Jurusan</th>
                                <th style="text-align: center;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($koordinator as $x) : ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no++ ?>
                                </td>
                                <td style="text-align: center;"><?= $x['nama'] ?>
                                    <br>NIP.<?= $x['nip'] ?>
                                </td>
                                <td style="text-align: center;"><?= $x['nama_sekretaris'] ?>
                                    <br>NIP.<?= $x['nip_sekretaris'] ?>
                                </td>
                                </td>
                                <td style="text-align: center;"><?= $x['mata_kuliah'] ?>
                                </td>
                                <td style="text-align: center;"><?= $x['program_studi'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('koordinator_modul/edit/' . $x['id_koordinator_modul']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('koordinator_modul/hapus/' . $x['id_koordinator_modul']); ?>"
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