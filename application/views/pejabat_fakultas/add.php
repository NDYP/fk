<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('pejabat_fakultas/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jabatan</label>
                                    <select name="jabatan" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($jabatan as $x) : ?>
                                        <option
                                            value=<?= $x['id_jabatan']; ?><?= set_select('jabatan', $x['id_jabatan']); ?>
                                            name="id_dosen">
                                            <?= $x['jabatan']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dosen</label>
                                    <select name="id_dosen" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <option
                                            value=<?= $x['id_dosen']; ?><?= set_select('id_dosen', $x['id_dosen']); ?>
                                            name="id_dosen">
                                            <?= $x['nama']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_dosen', '<small class="text-danger pl-1">', '</small>'); ?>
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