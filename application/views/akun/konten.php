<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('akun/edit/' . $akun['id_mahasiswa']) ?>"
                        class="btn btn-social btn-sm btn-warning"><span class="fa fa-edit"></span>
                        Edit</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body bg-identitas">
                        <?php if ($akun['foto'] == NULL) : ?>
                        <center>
                            <img src="<?= base_url('assets/foto/user.png'); ?>" alt=""
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                        </center>
                        <?php elseif ($akun['foto']) : ?>
                        <center>
                            <img class="img-identitas img-responsive"
                                src="<?= base_url('assets/foto/mahasiswa/' . $akun['foto']) ?>" alt="logo"
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
                                    <input name="nim" value="<?= $akun['nim']; ?>" type="text" class="form-control"
                                        id="" placeholder="" readonly>
                                    <input name="id_mahasiswa" value="<?= $akun['id_mahasiswa']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('nim', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input name="nik" value="<?= $akun['nik']; ?>" type=" text" class="form-control"
                                        id="" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">KTP</label>
                                    <br>
                                    <a href="<?= base_url('akun/ktp/' . $akun['id_mahasiswa']) ?>">Link
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input name="nama" value="<?= $akun['nama']; ?>" type=" text" class="form-control"
                                        id="" placeholder="" readonly>
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="<?= $akun['email']; ?>" type=" text" class="form-control"
                                        id="" placeholder="" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak" value="<?= $akun['kontak']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat, tanggal lahir</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="tempat_lahir" value="<?= $akun['tempat_lahir']; ?>"
                                                type=" text" class="form-control" id="" placeholder="" readonly>
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" name="tanggal_lahir"
                                                    value="<?= date('d-m-Y', strtotime($akun['tanggal_lahir'])); ?>"
                                                    id="datepicker" readonly>
                                            </div>
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <input name="ukt" value="<?= $akun['jenis_kelamin']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Tanpa tanda baca" readonly>
                                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" readonly><?= $akun['alamat']; ?>
                                    </textarea>
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
                                    <input name="nama_ayah" value="<?= $akun['nama_ayah']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Sesuai KK" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <input name="nama_ibu" value="<?= $akun['nama_ibu']; ?>"" type=" text"
                                        class="form-control" id="" placeholder="Sesuai KK" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak</label>
                                    <input name="kontak_ortu" value="<?= $akun['kontak_ortu']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Telepon/WA/Telegram" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ayah</label>

                                    <input name="alamat_kantor_ayah" value="<?= $akun['pekerjaan_ayah']; ?>"
                                        type=" text" class="form-control" id="" placeholder="" readonly>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pekerjaan Ibu</label>
                                    <input name="alamat_kantor_ayah" value="<?= $akun['pekerjaan_ibu']; ?>" type=" text"
                                        class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ayah</label>
                                    <input name="alamat_kantor_ayah" value="<?= $akun['alamat_kantor_ayah']; ?>"
                                        type=" text" class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ayah</label>
                                    <input name="penghasilan_ayah" value="<?= $akun['penghasilan_ayah']; ?>"
                                        type=" text" class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Penghasilan Ibu</label>
                                    <input name="penghasilan_ibu" value="<?= $akun['penghasilan_ibu']; ?>" type=" text"
                                        class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat Kantor Ibu</label>
                                    <input name="alamat_kantor_ibu" value="<?= $akun['alamat_kantor_ibu']; ?>"
                                        type=" text" class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat_ortu" readonly><?= $akun['alamat_ortu']; ?>
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
                                    <input name="ukt" value="<?= $akun['program_studi']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Tanpa tanda baca" readonly>
                                    <?= form_error('prodi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Jalur Masuk</label>
                                            <input name="ukt" value="<?= $akun['jalur_masuk']; ?>" type=" text"
                                                class="form-control" id="" placeholder="Tanpa tanda baca" readonly>
                                            <?= form_error('jalur_masuk', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tahun Masuk</label>
                                            <input name="tahun_masuk" value="<?= $akun['tahun_masuk']; ?>" type=" text"
                                                class="form-control" id="" placeholder="" readonly>
                                            <?= form_error('tahun_masuk', '<small class="text-danger pl-1">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nominal UKT</label>
                                    <input name="ukt" value="<?= $akun['ukt']; ?>" type=" text" class="form-control"
                                        id="" placeholder="Tanpa tanda baca" readonly>
                                    <?= form_error('ukt', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pembimbing Akademik</label>
                                    <input name="ukt" value="<?= $akun['nama_dosen']; ?>" type=" text"
                                        class="form-control" id="" placeholder="Tanpa tanda baca" readonly>
                                    <?= form_error('dosen_pa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Asal Sekolah *</label>
                                    <input name="asal_sekolah" value="<?= $akun['asal_sekolah']; ?>" type=" text"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('asal_sekolah', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tahun Lulus *</label>
                                    <input name="tahun_lulus" value="<?= $akun['tahun_lulus']; ?>" type=" text"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('tahun_lulus', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Ijazah</label>
                                    <br>
                                    <a href="<?= base_url('akun/ijazah/' . $akun['id_mahasiswa']) ?>">Link

                                </div>
                            </div>
                        </div>
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