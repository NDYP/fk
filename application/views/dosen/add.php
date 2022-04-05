<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('dosen/index') ?>" class="btn btn-social btn-sm btn-warning"><span
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
                                    <label for="">NIP *</label>
                                    <input name="nip" value="<?= set_value('nip'); ?>" type="text" class="form-control"
                                        id="" placeholder="isi ...">
                                    <?= form_error('nip', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap *</label>
                                    <input name="nama" value="<?= set_value('nama'); ?>" type=" text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email *</label>
                                    <input name="email" value="<?= set_value('email'); ?>" type=" text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kontak (No.HP/WA/Telegram)</label>
                                    <input name="kontak" value="<?= set_value('kontak'); ?>" type=" text"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input name="foto" value="<?= set_value('foto'); ?>" type="file"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
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