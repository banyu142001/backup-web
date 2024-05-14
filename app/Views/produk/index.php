<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-2 mb-1">
                    <div class="bg-secondary opacity-2  px-2 p-2 rounded-1">
                        <div class="row">
                            <div class="col-3 text-center">
                                <i class="fa-solid fa-user px-2 p-1 bg-white rounded-2 "></i>
                            </div>
                            <div class="col-6 text-center text-white">
                                <small>Makanan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-1">
                    <div class="bg-secondary opacity-2  px-2 p-2 rounded-1">
                        <div class="row">
                            <div class="col-3 text-center">
                                <i class="fa-solid fa-user px-2 p-1 bg-white rounded-2 "></i>
                            </div>
                            <div class="col-6 text-center text-white">
                                <small>Makanan</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mb-1">
                    <div class="bg-secondary opacity-2  px-2 p-2 rounded-1">
                        <div class="row">
                            <div class="col-3 text-center">
                                <i class="fa-solid fa-user px-2 p-1 bg-white rounded-2 "></i>
                            </div>
                            <div class="col-6 text-center text-white">
                                <small>Makanan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-1 ">
                <div class="row gx-4 mt-3">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <i class="fa-solid fa-magnifying-glass-chart text-dark fs-1"></i>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-50">
                            <h5 class="mb-1">
                                DATA MASTER - Produk
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Point Of Sale Management
                            </p>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <a href="/produk/create" class="btn bg-gradient-dark btn-sm mx-3 mb-0 float-end"><i class="material-icons text-sm">add</i> Tambah produk</a>
                    </div>
                </div>
                <div class="row my-1 px-3">
                    <div class="col-lg">
                        <?php if (session()->getFlashdata('flash')) : ?>
                            <?= session()->getFlashdata('flash') ?>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Kode Produk</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Nama Produk</th>
                                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Kategori</th>
                                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Satuan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Stok</th>
                                        <th class=""></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_produk as $produk) : ?>
                                        <tr>
                                            <td>
                                                <p class="text-sm mb-0 mx-2 fw-bold "><?= $produk['kode_produk'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0 mx-2"><?= $produk['nama_produk'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-center text-uppercase mb-0"><?= $produk['nama_kategori'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-center mb-0"><?= $produk['nama_satuan'] ?></p>
                                            </td>
                                            <td>
                                                <p class="text-sm mb-0 text-end">Rp. <?= number_format($produk['harga']) ?> </p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-center mb-0"><?= $produk['stok'] ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/produk/edit/<?= $produk['id_produk'] ?>" class="text-success font-weight-bolder text-xs">
                                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                                </a>
                                                <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelProduk<?= $produk['id_produk'] ?>">
                                                    <i class="material-icons text-sm mx-1">delete</i> Delete
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->include('/layout/modal/modal-delete'); ?>
<?= $this->include('/layout/modal/modal-update'); ?>
<!-- Modal -->
<?= $this->endSection(); ?>