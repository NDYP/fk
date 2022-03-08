<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('prodi/index') ?>" class="btn btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Program Studi</label>
                                    <input name="program_studi" value="<?= set_value('program_studi'); ?>" type=" text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('program_studi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kaprodi</label>
                                    <select name="kaprodi" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <option
                                            value=<?= $x['id_dosen']; ?><?= set_select('kaprodi', $x['id_dosen']); ?>
                                            name="kaprodi">
                                            <?= $x['nama']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kaprodi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm bg-red btn" type="submit"><span class="fa fa-save"></span>
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