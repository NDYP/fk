<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('mahasiswa/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body bg-identitas">
                        <?php if ($mahasiswa['foto'] == NULL) : ?>
                        <center>
                            <img src="<?= base_url('assets/foto/user.png'); ?>" alt=""
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                        </center>
                        <?php elseif ($mahasiswa['foto']) : ?>
                        <center>
                            <img class="img-identitas img-responsive"
                                src="<?= base_url('assets/foto/mahasiswa/' . $mahasiswa['foto']) ?>" alt="logo"
                                style="width: auto;max-height: 400px;max-width: 400px; vertical-align: middle;">
                        </center>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">
                        <!-- <div class="btn btn-default col-md-12"><u><b>DATA PRIBADI</b></u></div> -->
                        <div class="callout callout-success">
                            <center><b>BIODATA</b></center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input name="nim" value="<?= $mahasiswa['nim']; ?>" type="text" class="form-control"
                                        id="" placeholder="">
                                    <input name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('nim', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input name="nik" value="<?= $mahasiswa['nik']; ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">KTP</label>
                                    <input name="ktp" value="<?= $mahasiswa['ktp']; ?>" type="file" class="form-control"
                                        id="" placeholder="isi ...">
                                    <input name="ktp" value="<?= $mahasiswa['ktp']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input name="nama" value="<?= $mahasiswa['nama']; ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="<?= $mahasiswa['email']; ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak" value="<?= $mahasiswa['kontak']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat, tanggal lahir</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir']; ?>"
                                                type=" text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" name="tanggal_lahir"
                                                    value="<?= date('d-m-Y', strtotime($mahasiswa['tanggal_lahir'])); ?>"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('transmisi'); ?>">--Pilih--
                                        </option>
                                        <option value="L" <?= set_select('jenis_kelamin', 'L'); ?>
                                            <?php if ($mahasiswa['jenis_kelamin'] === 'L') echo 'selected'; ?>>
                                            Laki-Laki
                                        </option>
                                        <option value="P" <?= set_select('jenis_kelamin', 'P'); ?>
                                            <?php if ($mahasiswa['jenis_kelamin'] === 'P') echo 'selected'; ?>>
                                            Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input name="foto" value="<?= $mahasiswa['foto']; ?>" type="file"
                                        class="form-control" id="" placeholder="isi ...">
                                    <input name="foto" value="<?= $mahasiswa['foto']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat"><?= $mahasiswa['alamat']; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Agama *</label>
                                    <select name="agama" class="form-control select2" style="width: 100%;">

                                        <option value="Hindu" <?= set_select('agama', 'Hindu'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Hindu') echo 'selected'; ?>>Hindu
                                        </option>
                                        <option value="Buddha" <?= set_select('agama', 'Buddha'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Buddha') echo 'selected'; ?>>Buddha
                                        </option>
                                        <option value="Kristen" <?= set_select('agama', 'Kristen'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Kristen') echo 'selected'; ?>>Kristen
                                        </option>
                                        <option value="Katolik" <?= set_select('agama', 'Katolik'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Katolik') echo 'selected'; ?>>Katolik
                                        </option>
                                        <option value="Islam" <?= set_select('agama', 'Islam'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Islam') echo 'selected'; ?>>Islam
                                        </option>
                                        <option value="Khonghucu" <?= set_select('agama', 'Khonghucu'); ?>
                                            <?php if ($mahasiswa['agama'] === 'Khonghucu') echo 'selected'; ?>>Khonghucu
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
                                    <input name="nama_ayah" value="<?= $mahasiswa['nama_ayah']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Sesuai KK">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <input name="nama_ibu" value="<?= $mahasiswa['nama_ibu']; ?>"" type=" text"
                                        class="form-control" id="" placeholder="Sesuai KK">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak_ortu" value="<?= $mahasiswa['kontak_ortu']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ayah</label>

                                    <select name="pekerjaan_ayah" class="form-control select2" style="width: 100%;">

                                        <option value="Swasta" <?= set_select('pekerjaan_ayah', 'Swasta'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'Swasta') echo 'selected'; ?>>
                                            Swasta
                                        </option>
                                        <option value="Wiraswasta" <?= set_select('pekerjaan_ayah', 'Wiraswasta'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'Wiraswasta') echo 'selected'; ?>>
                                            Wiraswasta</option>
                                        <option value="PNS" <?= set_select('pekerjaan_ayah', 'PNS'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'PNS') echo 'selected'; ?>>PNS
                                        </option>
                                        <option value="TNI/Polri" <?= set_select('pekerjaan_ayah', 'TNI/Polri'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'TNI/Polri') echo 'selected'; ?>>
                                            TNI/Polri
                                        </option>
                                        <option value="Pekerja Lepas"
                                            <?= set_select('pekerjaan_ayah', 'Pekerja Lepas'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'Pekerja Lepas') echo 'selected'; ?>>
                                            Pekerja Lepas
                                        </option>
                                        <option value="Petani" <?= set_select('pekerjaan_ayah', 'Petani'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'Petani') echo 'selected'; ?>>
                                            Petani
                                        </option>
                                        <option value="Pedagang" <?= set_select('pekerjaan_ayah', 'Pedagang'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ayah'] === 'Pedagang') echo 'selected'; ?>>
                                            Pedagang
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ibu</label>
                                    <select name="pekerjaan_ibu" class="form-control select2" style="width: 100%;">
                                        <option value="Swasta" <?= set_select('pekerjaan_ibu', 'Swasta'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'Swasta') echo 'selected'; ?>>
                                            Swasta
                                        </option>
                                        <option value="Wiraswasta" <?= set_select('pekerjaan_ibu', 'Wiraswasta'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'Wiraswasta') echo 'selected'; ?>>
                                            Wiraswasta</option>
                                        <option value="PNS" <?= set_select('pekerjaan_ibu', 'PNS'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'PNS') echo 'selected'; ?>>PNS
                                        </option>
                                        <option value="TNI/Polri" <?= set_select('pekerjaan_ibu', 'TNI/Polri'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'TNI/Polri') echo 'selected'; ?>>
                                            TNI/Polri
                                        </option>
                                        <option value="Pekerja Lepas"
                                            <?= set_select('pekerjaan_ibu', 'Pekerja Lepas'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'Pekerja Lepas') echo 'selected'; ?>>
                                            Pekerja Lepas
                                        </option>
                                        <option value="Petani" <?= set_select('pekerjaan_ibu', 'Petani'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'Petani') echo 'selected'; ?>>
                                            Petani
                                        </option>
                                        <option value="Pedagang" <?= set_select('pekerjaan_ibu', 'Pedagang'); ?>
                                            <?php if ($mahasiswa['pekerjaan_ibu'] === 'Pedagang') echo 'selected'; ?>>
                                            Pedagang
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ayah</label>
                                    <input name="alamat_kantor_ayah" value="<?= $mahasiswa['alamat_kantor_ayah']; ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ayah</label>
                                    <input name="penghasilan_ayah" value="<?= $mahasiswa['penghasilan_ayah']; ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ibu</label>
                                    <input name="penghasilan_ibu" value="<?= $mahasiswa['penghasilan_ibu']; ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ibu</label>
                                    <input name="alamat_kantor_ibu" value="<?= $mahasiswa['alamat_kantor_ibu']; ?>"
                                        type=" text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat orang tua</label>
                                    <textarea type="text" class="form-control" name="alamat_ortu"><?= $mahasiswa['alamat_ortu']; ?>
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
                                    <label for="">Prodi</label>
                                    <select name="prodi" class="form-control select2" style="width: 100%;">
                                        <option value="" name="prodi">--Pilih--</option>
                                        <?php foreach ($prodi as $x) : ?>
                                        <?php if ($mahasiswa['prodi'] == $x['id_prodi']) : ?>
                                        <option name="prodi" value="<?= $x['id_prodi']; ?>" selected>
                                            <?= $x['program_studi']; ?></option>
                                        <?php else : ?>
                                        <option name="prodi" value="<?= $x['id_prodi']; ?>"><?= $x['program_studi']; ?>
                                        </option>
                                        <?php endif; ?>
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
                                                <option selected="selected" value="<?= set_value('jalur_masuk'); ?>"
                                                    <?php if ($mahasiswa['jalur_masuk'] === NULL) echo 'selected'; ?>>
                                                    --Pilih--
                                                </option>
                                                <option value="SNMPTN" <?= set_select('jalur_masuk', 'SNMPTN'); ?>
                                                    <?php if ($mahasiswa['jalur_masuk'] === 'SNMPTN') echo 'selected'; ?>>
                                                    SNMPTN
                                                </option>
                                                <option value="SBMPTN" <?= set_select('jalur_masuk', 'SBMPTN'); ?>
                                                    <?php if ($mahasiswa['jalur_masuk'] === 'SBMPTN') echo 'selected'; ?>>
                                                    SBMPTN
                                                </option>
                                                <option value="MANDIRI" <?= set_select('jalur_masuk', 'MANDIRI'); ?>
                                                    <?php if ($mahasiswa['jalur_masuk'] === 'MANDIRI') echo 'selected'; ?>>
                                                    MANDIRI
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tahun Masuk</label>
                                            <input name="tahun_masuk" value="<?= $mahasiswa['tahun_masuk']; ?>"
                                                type=" text" class="form-control" id="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nominal UKT</label>
                                    <input name="ukt" value="<?= $mahasiswa['ukt']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Tanpa tanda baca">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dosen PA</label>
                                    <select name="dosen_pa" class="form-control select2" style="width: 100%;">
                                        <option value="" name="dosen_pa">--Pilih--</option>
                                        <?php foreach ($dosen as $x) : ?>
                                        <?php if ($mahasiswa['dosen_pa'] == $x['id_dosen']) : ?>
                                        <option name="dosen_pa" value="<?= $x['id_dosen']; ?>" selected>
                                            <?= $x['nama']; ?></option>
                                        <?php else : ?>
                                        <option name="dosen_pa" value="<?= $x['id_dosen']; ?>"><?= $x['nama']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('dosen_pa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Asal Sekolah *</label>
                                    <input name="asal_sekolah" value="<?= $mahasiswa['ijazah_sma']; ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('asal_sekolah', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tahun Lulus *</label>
                                    <input name="tahun_lulus" value="<?= $mahasiswa['ijazah_sma']; ?>" type=" text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('tahun_lulus', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Ijazah</label>
                                    <input name="ijazah_sma" value="<?= $mahasiswa['ijazah_sma']; ?>" type="file"
                                        class="form-control" id="" placeholder="isi ...">
                                    <input name="ijazah_sma" value="<?= $mahasiswa['ijazah_sma']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="isi ...">

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