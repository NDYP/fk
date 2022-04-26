<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <?php foreach ($prodi_aktif as $x) : ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $x['jumlah'] ?></h3>
                    <p>Mahasiswa Aktif</p>
                    <p><?= $x['program_studi'] ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="<?= base_url('beranda/cetak_aktif/' . $x['id_prodi']) ?>" class="small-box-footer">Cetak <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php foreach ($prodi_nonaktif as $x) : ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $x['jumlah'] ?></h3>
                    <p>Mahasiswa Tidak Aktif</p>
                    <p><?= $x['program_studi'] ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="<?= base_url('beranda/cetak_nonaktif/' . $x['id_prodi']) ?>" class="small-box-footer">Cetak <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php foreach ($prodi_ipk as $x) : ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= number_format($x['ipk_highest'], 2) ?> - <?= number_format($x['ipk_lowest'], 2) ?></h3>
                    <p>IPK (Tertinggi Terendah)</p>
                    <p><?= $x['program_studi'] ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="<?= base_url('beranda/cetak_ipk/' . $x['id_prodi']) ?>" class="small-box-footer">Cetak <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        <?php foreach ($prodi_masa_studi as $x) : ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Masa Studi</h3>
                    <p><?= $x['program_studi'] ?></p>
                    <p>(Tecepat Terlama)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people-outline"></i>
                </div>
                <a href="<?= base_url('beranda/cetak_masa_studi/' . $x['id_prodi']) ?>" class="small-box-footer">Cetak
                    <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- ./col -->

        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

</section>
<!-- /.content -->