<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="<?= base_url('krs_list/tambah') ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kode MK</label>
                                    <input name="kode" value="<?= set_value('kode'); ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('kode', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mata Kuliah</label>
                                    <input name="mata_kuliah" value="<?= set_value('mata_kuliah'); ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('mata_kuliah', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">SKS</label>
                                <input name="sks" value="<?= set_value('sks'); ?>" type="text" class="form-control"
                                    id="" placeholder="isi ...">
                                <?= form_error('sks', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <label for="">Semester</label>
                                <select name="semester" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="">--Pilih--
                                    </option>
                                    <option value="I" <?= set_select('semester', 'I'); ?>>
                                        I
                                    </option>
                                    <option value="II" <?= set_select('semester', 'II'); ?>>
                                        II
                                    <option value="III" <?= set_select('semester', 'III'); ?>>
                                        III
                                    </option>
                                    <option value="IV" <?= set_select('semester', 'IV'); ?>>
                                        IV
                                    <option value="V" <?= set_select('semester', 'V'); ?>>
                                        V
                                    </option>
                                    <option value="VI" <?= set_select('semester', 'VI'); ?>>
                                        VI
                                    <option value="VII" <?= set_select('semester', 'VII'); ?>>
                                        VII
                                    </option>
                                    <option value="VIII" <?= set_select('semester', 'VIII'); ?>>
                                        VIII
                                    </option>
                                </select>
                                <?= form_error('semester', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Prodi</label>
                                <select name="prodi" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="<?= set_value('prodi'); ?>">--Pilih--
                                    </option>
                                    <?php foreach ($prodi as $x) : ?>
                                    <option value=<?= $x['id_prodi']; ?><?= set_select('prodi', $x['id_prodi']); ?>>
                                        <?= $x['program_studi']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('prodi', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <select name="tahun" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">--Pilih--
                                        </option>
                                        <option value="I" <?= set_select('tahun', 'I'); ?>>
                                            I
                                        </option>
                                        <option value="II" <?= set_select('tahun', 'II'); ?>>
                                            II
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Durasi (minggu)</label>
                                    <input name="durasi" value="<?= set_value('durasi'); ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Kurikulum</label>
                                <input name="kurikulum" value="<?= set_value('kurikulum'); ?>" type="text"
                                    class="form-control" id="" placeholder="isi ...">
                                <?= form_error('kurikulum', '<small class="text-danger pl-1">', '</small>'); ?>
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