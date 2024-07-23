<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_warning ?>>
                    <i class="fas fa-users text-white fs-4  "></i>
                </div>
            </div>
            <div class="col-auto col-6 my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Testimoni User
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>

            <div class="col-lg my-auto">
                <a href="/testimoni/create" class="mx-3 mt-lg-2 mt-2 text-info mb-0 float-lg-end float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>

        <!-- alert sistem -->
        <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>
        <div class="row mt-2 justify-content-center">
            <div class="col-lg-10">
                <p class="m-0">List Ulasan user :</p>
                <?php foreach ($data_testimoni as $test) : ?>
                    <div class="row g-0 border p-1 rounded-2 border-light">
                        <div class="col-lg-2 col-3 text-center">
                            <img src="assets/img/profile-user/<?= $test['foto'] ?>" class="img-fluid rounded-circle mt-2" style="width: 60px; height: 60px;">
                        </div>
                        <div class="col-lg-9 col-9">
                            <p class="m-0 fw-bold"><?= $test['nama'] ?></p>
                            <small><span class="text-muted">Ulasan</span> : <?= $test['ulasan'] ?></small>
                            <div class="row">
                                <div class="col-lg-7 col-lg">
                                    <table class="table table-sm  table-striped text-center">
                                        <thead>
                                            <tr class="p-0">
                                                <td style="font-size: 12px;">Performa Sistem</td>
                                                <td style="font-size: 12px;">Desain</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th style="font-size: 12px;" class="text-center"><?= $test['performa'] ?></th>
                                                <th style="font-size: 12px;"><?= $test['desain'] ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/testimoni/delete/<?= $test['id_test'] ?>" class="btn btn-sm btn-danger rounded-1 mt-lg-4 mt-0">Hapus ulasan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>