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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kode MK</label>
                                    <input name="kode" value="<?= $modul['kode']; ?>" type="text" class="form-control"
                                        id="" placeholder="isi ...">
                                    <input name="id_modul" value="<?= $modul['id_modul']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('kode', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mata Kuliah</label>
                                    <input name="mata_kuliah" value="<?= $modul['mata_kuliah']; ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('mata_kuliah', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">SKS</label>
                                <input name="sks" value="<?= $modul['sks']; ?>" type="text" class="form-control" id=""
                                    placeholder="isi ...">
                                <?= form_error('sks', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <?php if (!($modul['program_studi'] == 'Profesi Dokter')) : ?>

                            <div class="col-md-2">
                                <label for="">Semester</label>
                                <select name="semester" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="">--Pilih--
                                    </option>
                                    <option value="I" <?= set_select('semester', 'I'); ?>
                                        <?php if ($modul['semester'] === 'I') echo 'selected'; ?>>
                                        I
                                    </option>
                                    <option value="II" <?= set_select('semester', 'II'); ?>
                                        <?php if ($modul['semester'] === 'II') echo 'selected'; ?>>
                                        II
                                    <option value="III" <?= set_select('semester', 'III'); ?>
                                        <?php if ($modul['semester'] === 'III') echo 'selected'; ?>>
                                        III
                                    </option>
                                    <option value="IV" <?= set_select('semester', 'IV'); ?>
                                        <?php if ($modul['semester'] === 'IV') echo 'selected'; ?>>
                                        IV
                                    <option value="V" <?= set_select('semester', 'V'); ?>
                                        <?php if ($modul['semester'] === 'V') echo 'selected'; ?>>
                                        V
                                    </option>
                                    <option value="VI" <?= set_select('semester', 'VI'); ?>
                                        <?php if ($modul['semester'] === 'VI') echo 'selected'; ?>>
                                        VI
                                    <option value="VII" <?= set_select('semester', 'VII'); ?>
                                        <?php if ($modul['semester'] === 'VII') echo 'selected'; ?>>
                                        VII
                                    </option>
                                    <option value="VIII" <?= set_select('semester', 'VIII'); ?>
                                        <?php if ($modul['semester'] === 'VIII') echo 'selected'; ?>>
                                        VIII
                                    </option>
                                </select>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Prodi</label>
                                <select name="prodi" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="<?= set_value('prodi'); ?>">--Pilih--
                                    </option>
                                    <?php foreach ($prodi as $x) : ?>
                                    <?php if ($modul['prodi'] == $prodi['id_prodi']) : ?>
                                    <option value=<?= $x['id_prodi']; ?><?= set_select('prodi', $x['id_prodi']); ?>
                                        selected>
                                        <?= $x['program_studi']; ?></option>
                                    <?php else : ?>
                                    <option value=<?= $x['id_prodi']; ?><?= set_select('prodi', $x['id_prodi']); ?>
                                        selected>
                                        <?= $x['program_studi']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('prodi', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <?php if ($modul['program_studi'] == 'Profesi Dokter') : ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <select name="tahun" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="">--Pilih--
                                        </option>
                                        <option value="I" <?= set_select('tahun', 'I'); ?>
                                            <?php if ($modul['tahun'] === 'I') echo 'selected'; ?>>
                                            I
                                        </option>
                                        <option value="II" <?= set_select('tahun', 'II'); ?>
                                            <?php if ($modul['tahun'] === 'II') echo 'selected'; ?>>
                                            II
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Durasi (minggu)</label>
                                    <input name="durasi" value="<?= $modul['durasi']; ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <?php endif; ?>

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