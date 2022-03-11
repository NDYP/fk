<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header">
                    <a href="<?= base_url('modul/tambah') ?>" class="btn btn btn-sm bg-red"><i class="fa fa-plus"></i>
                        Tambah Modul</a>
                </div> -->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Program Studi</th>
                                <!-- <th style="text-align: center;">Kepala Prodi</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($modul as $x) : ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no++ ?>
                                </td>
                                <td style="text-align: center;"><?= $x['program_studi'] ?>
                                </td>
                                <!-- <td>
                                    <?= $x['nama'] ?> (NIP.<?= $x['nip'] ?> )
                                </td> -->
                                <td style="text-align: center;">


                                    <a href="<?= base_url('modul/lihat/' . $x['id_prodi']); ?>"
                                        class="btn btn-social btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Modul
                                        Mata
                                        Kuliah</a>
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