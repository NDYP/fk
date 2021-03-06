<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('tahun_ajaran/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <br>
                    <h3 style="text-align : center"> Keterangan * : Tidak boleh kosong</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tahun Ajaran *</label>
                                    <input name="tahun_akademik" value="<?= set_value('tahun_akademik'); ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('tahun_akademik', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Semester</label>
                                <select name="semester" class="form-control select2" style="width: 100%;">

                                    <option value="Ganjil" <?= set_select('semester', 'Ganjil'); ?>>
                                        Ganjil
                                    </option>
                                    <option value="Genap" <?= set_select('semester', 'Genap'); ?>>
                                        Genap
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Status</label>
                                <select name="status" class="form-control select2" style="width: 100%;">

                                    <option value="1" <?= set_select('status', 'Aktif'); ?>>
                                        Aktif
                                    </option>
                                    <option value="0" <?= set_select('status', 'Nonaktif'); ?>>
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