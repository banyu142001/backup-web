<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid py-2">
    <div class="section min-vh-85 position-relative  transform-scale-md-9 ">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape shadow-info  text-center border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_info ?>>
                            <i class="fab fa-product-hunt opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Data Produk</p>
                            <h4 class="mb-0"> <?= $produk ?></h4>

                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <div class="row">
                            <div class="col-6">
                                <p class="my-0 text-end"><i class="fas fa-boxes" <?= text_success ?>></i> <span class="fw-bold"><?= $satuan ?></span> </p>
                            </div>
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-box-open" <?= text_success ?>></i> <span class="fw-bold"><?= $kategori ?></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center shadow-warning border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_warning ?>>
                            <i class="fas fa-money-bill-wave opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Data Penjualan</p>
                            <h4 class="mb-0">2,300</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <div class="row justify-content-end g-0">
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-download" <?= text_success ?>></i> <span class="fw-bold  text-end"><?= $stok_masuk ?></span> </p>
                            </div>
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-file-export text-danger"></i> <span class="fw-bold"><?= $stok_keluar ?></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center shadow-success border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_success ?>>
                            <i class="fas fa-users opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Data User</p>
                            <h4 class="mb-0">2,300</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <div class="row justify-content-end g-0">
                            <div class="col-6">
                                <p class="my-0 text-end d-inline-block"> <i class="fa-solid fa-users-line" <?= text_success ?>></i> <span class="fw-bold">0</span> </p> |
                                <p class="my-0 text-end d-inline-block"> <i class="fa-solid fa-truck-arrow-right" <?= text_success ?>></i> <span class="fw-bold">0</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <img src="/assets/img/<?= session()->get('foto') ?>" alt="" class="img-fluid rounded-circle">
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm text-success font-weight-bolder mb-0 text-capitalize"><?= (session()->get('level') == 1) ? 'Admin' : 'Kasir' ?></p>
                            <h4 class="mb-0 text-capitalize"><?= session()->get('nama') ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <p class="mb-0"><?= session()->get('email') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 col-lg">
                <h4 class="mb-4 animated slideInDown">
                    <i class="fa-solid fa-store fa-2x"></i> Point Of Sale Management App
                </h4>
                <p class="mx-3 ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio nesciunt neque aliquam error obcaecati nisi nulla voluptas doloribus adipisci facilis.</p>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 rounded-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-info rounded-2 shadow-info border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Laporan Penjualan</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="" class="font-weight-bold" target="_blank">Bayu Gurium</a>
                        for a better web.
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>
<?= $this->endSection(); ?>