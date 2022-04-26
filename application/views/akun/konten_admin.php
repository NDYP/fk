<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('akun/edit/' . $akun['id_admin']) ?>"
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
                                src="<?= base_url('assets/foto/admin/' . $akun['foto']) ?>" alt="logo"
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
                                    <label for="">Username</label>
                                    <input name="username" value="<?= $akun['username']; ?>" type="text"
                                        class="form-control" id="" placeholder="" readonly>
                                    <input name="id_admin" value="<?= $akun['id_admin']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" value="<?= $akun['password']; ?>" type=" text"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input name="nama" value="<?= $akun['nama']; ?>" type=" text" class="form-control"
                                        id="" placeholder="" readonly>
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" value="<?= $akun['email']; ?>" type=" text" class="form-control"
                                        id="" placeholder="" readonly>
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
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