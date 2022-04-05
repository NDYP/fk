<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form action="<?= base_url('nilai_mhs/input') ?>" method="POST" enctype="multipart/form-data">

                    <div class="box-header">
                        <button class="btn btn-social btn-sm btn-primary" type="submit"><span class="fa fa-save"></span>
                            Simpan</button>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Nilai</th>
                                    <th style="text-align: center;">NIM</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Semester</th>
                                    <th style="text-align: center;">Nilai Akhir</th>
                                    <th style="text-align: center;">Penginput</th>

                                    <!-- <th style="text-align: center;">Input Nilai</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($mahasiswa as $x) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no++; ?></td>
                                    <td style="text-align: center;">
                                        <input type="hidden" value="<?= $x['id_modul']; ?>" name="id_modul" id=""
                                            class="form-control input-sm">
                                        <?php if ($x['nilai'] == NULL) : ?>
                                        <input type='hidden' name='id_detail_krs[]' value='<?= $x['id_detail_krs']; ?>'>
                                        <select name="id_nilai[]" class="form-control select3" style="width: 70%;">
                                            <option value="" name="id_nilai[]">--Pilih--
                                            </option>
                                            <?php foreach ($nilai as $z) : ?>
                                            <option
                                                value=<?= $z['id_nilai']; ?><?= set_select('id_nilai', $z['id_nilai']); ?>
                                                name="id_nilai[]">
                                                <?= $z['mutu']; ?> (<?= $z['nilai']; ?>)
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <br>
                                        <?= form_error('id_nilai[]', '<small class="text-danger pl-1">', '</small>'); ?>

                                        <?php else : ?>
                                        <input type='hidden' name='id_nilai[]' value='<?= $x['id_nilai']; ?>'>
                                        <input type="hidden" value="<?= $x['id_modul']; ?>" name="id_modul" id=""
                                            class="form-control input-sm">
                                        <input type='hidden' name='id_detail_krs[]' value='<?= $x['id_detail_krs']; ?>'>
                                        <?= $x['nilai'] . '-', $x['mutu']; ?>
                                        <?php endif; ?>


                                    </td>
                                    <td style="text-align: center;"><?= $x['nim'] ?><br>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $x['nama'] ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $x['tahun_akademik'] ?>-<?= $x['semester'] ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $x['nilai'] ?: 'Belum Input' ?> (<?= $x['mutu'] ?: '-' ?>)
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $x['nama_penginput'] ?> (<?= $x['timestamp'] ?>)
                                    </td>
                                    <!-- <td style="text-align: center;">
                                    <a data-no="<?= $x['id_detail_krs']; ?>" data-toggle="modal"
                                        data-target="#modal-no<?= $x['id_detail_krs']; ?>"
                                        class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                </td> -->
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<?php $no = 0;
foreach ($mahasiswa as $z) : ?>
<div class="modal fade" id="modal-no<?= $z['id_detail_krs']; ?>">
    <div class="modal-dialog">
        <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
            action="<?= base_url('nilai_akhir/input'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Input Nilai Akhir</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" value="<?= $z['id_detail_krs']; ?>" name="id_detail_krs" id=""
                            class="form-control input-sm">
                        <input type="hidden" value="<?= $z['id_modul']; ?>" name="id_modul" id=""
                            class="form-control input-sm">
                        <div class="col-xs-12">
                            <label for="exampleInputEmail1">List Nilai</label>
                            <select name="id_nilai" class="form-control select3" style="width: 100%;">
                                <?php foreach ($nilai as $x) : ?>
                                <option value=<?= $x['id_nilai']; ?><?= set_select('id_nilai', $x['id_nilai']); ?>
                                    name="id_nilai">
                                    <?= $x['mutu']; ?> (<?= $x['nilai']; ?>)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<?php endforeach; ?>
<!-- /.content -->