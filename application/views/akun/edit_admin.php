<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <!-- Main content -->


            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('akun/index') ?>" class="btn btn-social btn-sm btn-warning"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input name="username" value="<?= $akun['username']; ?>" type="text"
                                        class="form-control" id="" placeholder="isi ...">
                                    <input name="id_admin" value="<?= $akun['id_admin']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="isi ...">
                                    <?= form_error('id_admin', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" value="<?= $akun['password']; ?>" type=" text"
                                        class="form-control" id="" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input name="nama" value="<?= $akun['nama']; ?>" type=" text" class="form-control"
                                        id="" placeholder="isi ...">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="<?= $akun['email']; ?>" type=" text" class="form-control"
                                        id="" placeholder="isi ...">
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
                        <button class="btn btn-social btn-sm bg-red btn" type="submit"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                </form>
                <!-- /.box -->

                <!-- /.content -->
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

</section>
<!-- /.content -->