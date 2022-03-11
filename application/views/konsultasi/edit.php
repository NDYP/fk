<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('konsultasi/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <a href="<?= base_url('konsultasi/terima/' . $detail_krs['id_krs']) ?>"
                        class="btn btn-social btn btn-sm btn-success"><i class="fa fa-check"></i>
                        Approve KRS</a>
                    <a href="<?= base_url('konsultasi/revisi/' . $detail_krs['id_krs']) ?>"
                        class="btn btn-social btn btn-sm bg-red"><i class="fa fa-close"></i>
                        Revisi KRS</a>
                </div>
                <div class="box-body bg-identitas">
                    <?php if ($detail_krs['foto'] == NULL) : ?>
                    <center>
                        <img src="<?= base_url('assets/foto/user.png'); ?>" alt=""
                            style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                    </center>
                    <?php elseif ($detail_krs['foto']) : ?>
                    <center>
                        <img class="img-identitas img-responsive"
                            src="<?= base_url('assets/foto/semester/' . $detail_krs['foto']) ?>" alt="logo"
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
                                <input name="nim" value="<?= $detail_krs['nim']; ?>" type="text" class="form-control"
                                    id="" placeholder="" readonly>
                                <input name="id_krs" value="<?= $detail_krs['id_krs']; ?>" type="hidden"
                                    class="form-control" id="" placeholder="">
                                <input name="id_mahasiswa" value="<?= $detail_krs['id_mahasiswa']; ?>; ?>" type="hidden"
                                    class="form-control" id="" placeholder="" readonly>
                                <?= form_error('id_mahasiswa', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input name="nama" value="<?= $detail_krs['nama']; ?>" type=" text" class="form-control"
                                    id="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dosen PA</label>
                                <input name="" value="<?= $detail_krs['dosen_pa']; ?>" type=" text" class="form-control"
                                    id="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tahun Akademik</label>
                                <input name="ukt"
                                    value="<?= $detail_krs['tahun_akademik']; ?>-<?= $detail_krs['semester']; ?>"
                                    type=" text" class="form-control" id="" placeholder="" readonly>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Semester</label>
                                <input name="semester" value="<?= $detail_krs['smt']; ?>" type=" text"
                                    class="form-control" id="" placeholder="" readonly>

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
                                <input name="sks_yad" value="<?= $detail_krs['sks_yad'] + $sks_yad_edit['sks']; ?>"
                                    type=" text" class="form-control" id="" placeholder="" readonly>
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
                            <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                <?php if ($detail_krs['prodi'] == 3) : ?>
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No.</th>
                                        <th style="text-align: center;">Kode MK</th>
                                        <th style="text-align: center;">Mata Kuliah</th>
                                        <th style="text-align: center;">SKS</th>
                                        <th style="text-align: center;">Semester</th>

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
                                                type="hidden" class="form-control" id="" placeholder="" readonly>
                                            <input name="x[]" value="<?= $detail_krs['smt']; ?>" type="hidden"
                                                class="form-control" id="" placeholder="" readonly>
                                        </td>
                                        <td><?= $x['mata_kuliah'] ?>
                                        <td><?= $x['sks'] ?>
                                        <td><?= $x['semester'] ?>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php elseif ($detail_krs['prodi'] == 4) : ?>
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No.</th>
                                        <th style="text-align: center;">Kode MK</th>
                                        <th style="text-align: center;">Mata Kuliah</th>
                                        <th style="text-align: center;">SKS</th>
                                        <th style="text-align: center;">Tahun</th>
                                        <th style="text-align: center;">Durasi</th>

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

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php endif; ?>
                            </table>
                        </div>

                    </div>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->