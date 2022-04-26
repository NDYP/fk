<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('mahasiswa/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <br>
                    <h3 style="text-align : center"> Keterangan * : Tidak boleh kosong</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="callout callout-success">
                            <center><b>BIODATA</b></center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NIM *</label>
                                    <input name="nim" value="<?= set_value('nim'); ?>" type="text" class="form-control"
                                        id="" placeholder="">
                                    <?= form_error('nim', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input name="nik" value="<?= set_value('nik'); ?>" type=" text" class="form-control"
                                        id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">KTP</label>
                                    <input name="ktp" value="<?= set_value('ktp'); ?>" type="file" class="form-control"
                                        id="" placeholder="isi ...">
                                    <?= form_error('ktp', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap *</label>
                                    <input name="nama" value="<?= set_value('nama'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="<?= set_value('email'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak" value="<?= set_value('kontak'); ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat, tanggal lahir</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>"
                                                type=" text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" name="tanggal_lahir"
                                                    value="<?= set_value('tanggal_lahir'); ?>" id="datepicker">
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin *</label>
                                    <select name="jenis_kelamin" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('jenis_kelamin'); ?>">--Pilih--
                                        </option>
                                        <option value="L" <?= set_select('jenis_kelamin', 'L'); ?>>Laki-Laki
                                        </option>
                                        <option value="P" <?= set_select('jenis_kelamin', 'P'); ?>>Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input name="foto" value="<?= set_value('foto'); ?>" type="file"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('foto', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Agama *</label>
                                    <select name="agama" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('agama'); ?>">--Pilih--
                                        </option>
                                        <option value="Hindu" <?= set_select('agama', 'Hindu'); ?>>Hindu</option>
                                        <option value="Buddha" <?= set_select('agama', 'Buddha'); ?>>Buddha</option>
                                        <option value="Kristen" <?= set_select('agama', 'Krsiten'); ?>>Kristen</option>
                                        <option value="Katolik" <?= set_select('agama', 'Katolik'); ?>>Katolik</option>
                                        <option value="Islam" <?= set_select('agama', 'Islam'); ?>>Islam</option>
                                        <option value="Khonghucu" <?= set_select('agama', 'Khonghucu'); ?>>Khonghucu
                                        </option>
                                    </select>
                                    <?= form_error('agama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="btn btn-default col-md-12"><u><b>DATA ORANG TUA</b></u></div> -->
                        <div class="callout callout-success">
                            <center><b>DATA ORANG TUA</b></center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Ayah</label>
                                    <input name="nama_ayah" value="<?= set_value('nama_ayah'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <input name="nama_ibu" value="<?= set_value('nama_ibu'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak_ortu" value="<?= set_value('kontak_ortu'); ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ayah *</label>

                                    <select name="pekerjaan_ayah" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('pekerjaan_ayah'); ?>">
                                            --Pilih--
                                        </option>
                                        <option value="Swasta" <?= set_select('pekerjaan_ayah', 'Swasta'); ?>>Swasta
                                        </option>
                                        <option value="Wiraswasta" <?= set_select('pekerjaan_ayah', 'Wiraswasta'); ?>>
                                            Wiraswasta</option>
                                        <option value="PNS" <?= set_select('pekerjaan_ayah', 'PNS'); ?>>PNS
                                        </option>
                                        <option value="TNI/Polri" <?= set_select('pekerjaan_ayah', 'TNI/Polri'); ?>>
                                            TNI/Polri
                                        </option>
                                        <option value="Pekerja Lepas"
                                            <?= set_select('pekerjaan_ayah', 'Pekerja Lepas'); ?>>Pekerja Lepas</option>
                                        <option value="Petani" <?= set_select('pekerjaan_ayah', 'Petani'); ?>>Petani
                                        </option>
                                        <option value="Pedagang" <?= set_select('pekerjaan_ayah', 'Pedagang'); ?>>
                                            Pedagang
                                        </option>
                                    </select>
                                    <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ibu</label>
                                    <select name="pekerjaan_ibu" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('pekerjaan_ibu'); ?>">
                                            --Pilih--
                                        </option>
                                        <option value="Swasta" <?= set_select('pekerjaan_ibu', 'Swasta'); ?>>Swasta
                                        </option>
                                        <option value="Wiraswasta" <?= set_select('pekerjaan_ibu', 'Wiraswasta'); ?>>
                                            Wiraswasta</option>
                                        <option value="PNS" <?= set_select('pekerjaan_ibu', 'PNS'); ?>>PNS
                                        </option>
                                        <option value="TNI/Polri" <?= set_select('pekerjaan_ibu', 'TNI/Polri'); ?>>
                                            TNI/Polri
                                        </option>
                                        <option value="Pekerja Lepas"
                                            <?= set_select('pekerjaan_ibu', 'Pekerja Lepas'); ?>>Pekerja Lepas</option>
                                        <option value="Petani" <?= set_select('pekerjaan_ibu', 'Petani'); ?>>Petani
                                        </option>
                                        <option value="Pedagang" <?= set_select('pekerjaan_ibu', 'Pedagang'); ?>>
                                            Pedagang
                                        </option>
                                    </select>
                                    <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ayah</label>
                                    <input name="alamat_kantor_ayah" value="<?= set_value('alamat_kantor_ayah'); ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ayah</label>
                                    <input name="penghasilan_ayah" value="<?= set_value('penghasilan_ayah'); ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ibu</label>
                                    <input name="penghasilan_ibu" value="<?= set_value('penghasilan_ibu'); ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ibu</label>
                                    <input name="alamat_kantor_ibu" value="<?= set_value('alamat_kantor_ibu'); ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat tinggal orang tua</label>
                                    <textarea type="text" class="form-control" name="alamat_ortu" id="alamat">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="btn btn-default col-md-12"><u><b>DATA AKADEMIK</b></u></div> -->
                        <div class="callout callout-success">
                            <center><b>DATA AKADEMIK</b></center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Prodi *</label>
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Jalur Masuk</label>
                                            <select name="jalur_masuk" class="form-control select2"
                                                style="width: 100%;">
                                                <option selected="selected" value="<?= set_value('jalur_masuk'); ?>">
                                                    --Pilih--
                                                </option>
                                                <option value="SNMPTN" <?= set_select('jalur_masuk', 'SNMPTN'); ?>>
                                                    SNMPTN
                                                </option>
                                                <option value="SBMPTN" <?= set_select('jalur_masuk', 'SBMPTN'); ?>>
                                                    SBMPTN
                                                </option>
                                                <option value="MANDIRI" <?= set_select('jalur_masuk', 'MANDIRI'); ?>>
                                                    MANDIRI
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tahun Masuk</label>
                                            <input name="tahun_masuk" value="<?= set_value('tahun_masuk'); ?>"
                                                type=" text" class="form-control" id="" placeholder="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nominal UKT</label>
                                    <input name="ukt" value="<?= set_value('ukt'); ?>" type=" text" class="form-control"
                                        id="" placeholder="Tanpa tanda baca">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dosen PA *</label>
                                    <select name="dosen_pa" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('dosen_pa'); ?>">--Pilih--
                                        </option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <option
                                            value=<?= $x['id_dosen']; ?><?= set_select('dosen_pa', $x['id_dosen']); ?>>
                                            <?= $x['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('dosen_pa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Asal Sekolah *</label>
                                    <input name="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('asal_sekolah', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tahun Lulus *</label>
                                    <input name="tahun_lulus" value="<?= set_value('tahun_lulus'); ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('tahun_lulus', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Ijazah</label>
                                    <input name="ijazah_sma" value="<?= set_value('ijazah_sma'); ?>" type="file"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('ijazah_sma', '<small class="text-danger pl-1">', '</small>'); ?>

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