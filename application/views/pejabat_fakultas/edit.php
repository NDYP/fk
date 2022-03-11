<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!-- Main content -->


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
                                        <option value="" name="jabatan">--Pilih--</option>
                                        <?php foreach ($jabatan as $x) : ?>
                                        <?php if ($pejabat_fakultas['jabatan'] == $x['id_jabatan']) : ?>
                                        <option name="jabatan" value="<?= $x['id_jabatan']; ?>" selected>
                                            <?= $x['jabatan']; ?></option>
                                        <?php else : ?>
                                        <option name="jabatan" value="<?= $x['id_jabatan']; ?>">
                                            <?= $x['jabatan']; ?>
                                        </option>
                                        <?php endif; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input name="id_dekanat" value="<?= $pejabat_fakultas['id_dekanat']; ?>"
                                        type="hidden" class="form-control" id="exampleInputEmail1"
                                        placeholder="isi ...">
                                    <?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dosen</label>
                                    <select name="id_dosen" class="form-control select2" style="width: 100%;">
                                        <option value="" name="id_dosen">--Pilih--</option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <?php if ($pejabat_fakultas['id_dosen'] == $x['id_dosen']) : ?>
                                        <option name="id_dosen" value="<?= $x['id_dosen']; ?>" selected>
                                            <?= $x['nama']; ?></option>
                                        <?php else : ?>
                                        <option name="id_dosen" value="<?= $x['id_dosen']; ?>"><?= $x['nama']; ?>
                                        </option>
                                        <?php endif; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_dosen', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-social btn-sm bg-red btn" type="submit"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                </form>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

</section>
<!-- /.content -->