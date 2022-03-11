<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('registrasi/lihat/' . $id_tahun_ajaran) ?>"
                        class="btn btn-social btn-sm btn-warning"><span class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Akademik</label>
                                    <select name="id_tahun_ajaran" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($tahun_ajaran as $x) : ?>
                                        <?php if ($id_tahun_ajaran == $x['id_tahun_ajaran']) : ?>
                                        <option
                                            value=<?= $x['id_tahun_ajaran']; ?><?= set_select('id_tahun_ajaran', $x['id_tahun_ajaran']); ?>
                                            name="id_tahun_ajaran" selected>
                                            <?= $x['tahun_akademik'] . ' - ' . $x['semester']; ?>
                                        </option>
                                        <?php else : ?>
                                        <option
                                            value=<?= $x['id_tahun_ajaran']; ?><?= set_select('id_tahun_ajaran', $x['id_tahun_ajaran']); ?>
                                            name="id_tahun_ajaran">
                                            <?= $x['tahun_akademik'] . ' - ' . $x['semester']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_tahun_ajaran', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mahasiswa</label>
                                    <input name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa') ?>"
                                        type="hidden" class="form-control" id="" placeholder="">
                                    <input value="<?= $this->session->userdata('nama') ?>" type="text"
                                        class="form-control" id="" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">VA</label>
                                    <input name="va" value="<?= set_value('va'); ?>" type="text" class="form-control"
                                        id="" placeholder="VA Bank yang dikeluarkan oleh Universitas">
                                    <?= form_error('va', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slip</label>
                                    <input name="slip" type="file" class="form-control" id="" placeholder=""
                                        multiple="multiple">
                                    <?= form_error('slip', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bukti Registrasi Univ</label>
                                    <input name="regis_univ" type="file" class="form-control" id="" placeholder=""
                                        multiple="multiple">
                                    <?= form_error('regis_univ', '<small class="text-danger pl-1">', '</small>'); ?>

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