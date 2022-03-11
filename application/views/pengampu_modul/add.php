<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= $_SERVER['HTTP_REFERER']; ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Modul</label>
                                    <select name="id_modul" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($modul as $x) : ?>
                                        <option
                                            value=<?= $x['id_modul']; ?><?= set_select('id_modul', $x['id_modul']); ?>
                                            name="id_modul">
                                            <?= $x['kode'] . ' - ' . $x['mata_kuliah']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_modul', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pengampu</label>
                                    <select name="id_dosen" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <option
                                            value=<?= $x['id_dosen']; ?><?= set_select('id_dosen', $x['id_dosen']); ?>
                                            name="id_dosen">
                                            <?= $x['nama'] . ' - ' . 'NIP : ' . $x['nip']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_dosen', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Akademik</label>
                                    <select name="id_tahun_ajaran" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($tahun_ajaran as $x) : ?>
                                        <?php if ($id_tahun_ajaran == $x['id_tahun_ajaran']) : ?>
                                        <option
                                            value=<?= $x['id_tahun_ajaran']; ?><?= set_select('id_tahun_ajaran', $x['id_tahun_ajaran']); ?>
                                            name="id_tahun_ajaran" selected>
                                            <?= $x['tahun_akademik'] . ' - ' . $x['semester']; ?>
                                        </option>
                                        <?php else : ?>
                                        <option
                                            value=<?= $x['id_tahun_ajaran']; ?><?= set_select('id_tahun_ajaran', $x['id_tahun_ajaran']); ?>
                                            name="id_tahun_ajaran">
                                            <?= $x['tahun_akademik'] . ' - ' . $x['semester']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_tahun_ajaran', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="box-footer">
                        <button class="btn btn-social btn-sm bg-red btn" type="submit"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->