<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('krs_mhs/tambah') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="<?= base_url('Krs_list/tambah_list') ?>" method="POST" enctype="multipart/form-data">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Pilih</th>

                                        <th style="text-align: center;">No.</th>
                                        <th style="text-align: center;">Kurikulum</th>
                                        <th style="text-align: center;">Kode MK</th>
                                        <th style="text-align: center;">Mata Kuliah</th>
                                        <th style="text-align: center;">SKS</th>

                                        <th style="text-align: center;">Tahun</th>
                                        <th style="text-align: center;">Durasi</th>

                                        <!-- <th style="text-align: center;">Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($modul as $x) : ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <input type='checkbox' name='id_modul[]' value='<?= $x['id_modul']; ?>'>
                                            <input type='hidden' name='id_mahasiswa[]'
                                                value='<?= $this->session->userdata('id_mahasiswa'); ?>'>
                                        </td>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $x['kurikulum'] ?></td>
                                        <td><?= $x['kode'] ?></td>
                                        <td><?= $x['mata_kuliah'] ?>
                                        <td><?= $x['sks'] ?>
                                        <td><?= $x['tahun'] ?>
                                        <td><?= $x['durasi'] ?> minggu
                                            <!-- <td style="text-align: center;">
                                        <button class="btn btn-social btn-sm btn-primary" type="submit" name="id_modul"
                                            value="<?= $x['id_modul']; ?>"><i class="fa fa-check"></i> Pilih</button>
                                    </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button class="btn btn-social btn-sm btn-primary" type="submit"><span
                                    class="fa fa-save"></span>
                                Simpan</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->