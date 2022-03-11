<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('tahun_ajaran/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Ajaran</label>
                                    <input name="tahun_akademik" value="<?= $tahun_ajaran['tahun_akademik']; ?>"
                                        type="text" class="form-control" id="" placeholder="isi ...">
                                    <input name="id_tahun_ajaran" value="<?= $tahun_ajaran['id_tahun_ajaran']; ?>"
                                        type="hidden" class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('tahun_akademik', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Semester</label>
                                <select name="semester" class="form-control select2" style="width: 100%;">
                                    <option value="Ganjil" <?= set_select('semester', 'Ganjil'); ?>
                                        <?php if ($tahun_ajaran['semester'] === 'Ganjil') echo 'selected'; ?>>
                                        Ganjil
                                    </option>
                                    <option value="Genap" <?= set_select('semester', 'Genap'); ?>
                                        <?php if ($tahun_ajaran['semester'] === 'Genap') echo 'selected'; ?>>
                                        Genap
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Status</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="1" <?= set_select('status', 'Aktif'); ?>
                                        <?php if ($tahun_ajaran['status'] === '1') echo 'selected'; ?>>
                                        Aktif
                                    </option>
                                    <option value="0" <?= set_select('status', 'Nonaktif'); ?>
                                        <?php if ($tahun_ajaran['status'] === '0') echo 'selected'; ?>>
                                        Nonaktif
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-social btn-sm bg-red btn"><span class="fa fa-save"></span>
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