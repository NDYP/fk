<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('krs_mhs/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <a href="<?= base_url('krs_list/tambah') ?>" class="btn btn-social btn btn-sm bg-red"><i
                            class="fa fa-user-plus"></i>
                        Input Modul</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body bg-identitas">
                        <?php if ($semester['foto'] == NULL) : ?>
                        <center>
                            <img src="<?= base_url('assets/foto/user.png'); ?>" alt=""
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                        </center>
                        <?php elseif ($semester['foto']) : ?>
                        <center>
                            <img class="img-identitas img-responsive"
                                src="<?= base_url('assets/foto/semester/' . $semester['foto']) ?>" alt="logo"
                                style="width: auto;max-height: 400px;max-width: 400px; vertical-align: middle;">
                        </center>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- <div class="btn btn-default col-md-12"><u><b>DATA PRIBADI</b></u></div> -->
                            <div class="callout callout-success">
                                <center><b>BIODATA</b></center>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">NIM</label>
                                        <input name="nim" value="<?= $this->session->userdata('nip'); ?>" type="text"
                                            class="form-control" id="" placeholder="" readonly>
                                        <input name="id_mahasiswa"
                                            value="<?= $this->session->userdata('id_mahasiswa'); ?>" type="hidden"
                                            class="form-control" id="" placeholder="" readonly>
                                        <?= form_error('id_mahasiswa', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input name="nama" value="<?= $this->session->userdata('nama'); ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dosen PA</label>
                                        <input name="" value="<?= $detail_krs['dosen_pa']; ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tahun Akademik</label>
                                        <input name="ukt"
                                            value="<?= $detail_krs['tahun_akademik']; ?>-<?= $detail_krs['semester']; ?>"
                                            type=" text" class="form-control" id="" placeholder="" readonly>
                                        <input name="id_tahun_akademik" value="<?= $detail_krs['id_tahun_ajaran']; ?>"
                                            type="hidden" class="form-control" id="" placeholder="" readonly>
                                        <input name="id_registrasi" value="<?= $detail_krs['id_registrasi']; ?>"
                                            type="hidden" class="form-control" id="" placeholder="">
                                        <input name="id_krs" value="<?= $detail_krs['id_krs']; ?>" type="hidden"
                                            class="form-control" id="" placeholder="">
                                        <?= form_error('id_registrasi', '<small class="text-danger pl-1">', '</small>'); ?>
                                        <?= form_error('id_tahun_akademik', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Semester</label>
                                        <input name="semester" value="<?= $detail_krs['smt']; ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                        <?= form_error('semester', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">IPS</label>
                                        <input name="ips" value="<?= $detail_krs['ips'] ?: 0; ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">IPK</label>
                                        <input name="ipk" value="<?= $detail_krs['ipk'] ?: 0; ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">SKS Kumultatif</label>
                                        <input name="sks_kumultatif" value="<?= $detail_krs['sks_kumultatif'] ?: 0; ?>"
                                            type=" text" class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">SKS yad.</label>
                                        <input name="sks_yad"
                                            value="<?= $detail_krs['sks_yad'] + $sks_yad_edit['sks']; ?>" type=" text"
                                            class="form-control" id="" placeholder="" readonly>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="btn btn-default col-md-12"><u><b>DATA ORANG TUA</b></u></div> -->
                            <!-- <div class="btn btn-default col-md-12"><u><b>DATA AKADEMIK</b></u></div> -->
                            <div class="callout callout-success">
                                <center><b>MODUL DIAMBIL</b></center>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered table-striped"
                                        style="width: 100%;">
                                        <?php if ($this->session->userdata('prodi') == 3) : ?>
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No.</th>
                                                <th style="text-align: center;">Kode MK</th>
                                                <th style="text-align: center;">Mata Kuliah</th>
                                                <th style="text-align: center;">SKS</th>
                                                <th style="text-align: center;">Semester</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                                foreach ($krs as $x) : ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td><?= $x['kode'] ?>
                                                    <input name="id_detail_krs[]" value="<?= $x['id_detail_krs'] ?>"
                                                        type=" text" class="form-control" id="" placeholder="" readonly>
                                                    <input name="x[]" value="<?= $detail_krs['smt']; ?>" type=" text"
                                                        class="form-control" id="" placeholder="" readonly>
                                                </td>
                                                <td><?= $x['mata_kuliah'] ?>
                                                <td><?= $x['sks'] ?>
                                                <td><?= $x['semester'] ?>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('krs_list/hapus/' . $x['id_detail_krs']); ?>"
                                                        class="btn btn-social-icon btn-danger tombol-hapus"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <?php elseif ($this->session->userdata('prodi') == 4) : ?>
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No.</th>
                                                <th style="text-align: center;">Kode MK</th>
                                                <th style="text-align: center;">Mata Kuliah</th>
                                                <th style="text-align: center;">SKS</th>
                                                <th style="text-align: center;">Tahun</th>
                                                <th style="text-align: center;">Durasi</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                                foreach ($krs as $x) : ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td><?= $x['kode'] ?></td>
                                                <td><?= $x['mata_kuliah'] ?>
                                                <td><?= $x['sks'] ?>
                                                <td><?= $x['tahun'] ?>
                                                <td><?= $x['durasi'] ?> minggu
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('krs_list/hapus/' . $x['id_detail_krs']); ?>"
                                                        class="btn btn-social-icon btn-danger tombol-hapus"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-social btn-sm btn-info" type="submit">
                                        <i class="fa fa-save"></i> Input KRS
                                    </button>
                                </div>
                            </div>
                        </form>
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