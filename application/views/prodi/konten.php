<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header">
                    <a href="<?= base_url('prodi/tambah') ?>" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div> -->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Program Studi</th>
                                <th style="text-align: center;">Kepala Prodi</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($prodi as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['program_studi'] ?>
                                </td>
                                <td>
                                    <?= $x['nama'] ?> (NIP.<?= $x['nip'] ?> )
                                </td>
                                <td style="text-align: center;">

                                    <a href="<?= base_url('prodi/edit/' . $x['id_prodi']); ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('prodi/hapus/' . $x['id_prodi']); ?>"
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