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
                    <div class="col-auto px-4">
                        <div class="avatar rounded-2 position-relative" <?= bg_info ?>>
                            <i class="fa-solid fa-magnifying-glass-chart text-white fs-4"></i>
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
                    <!-- <div class="col my-auto">
                        <a href="/produk/create" class="btn bg-gradient-dark btn-sm mx-3 mb-0 float-end"><i class="material-icons text-sm">add</i> Tambah produk</a>
                    </div> -->
                    <div class="col my-auto">
                        <a href="/produk/create" class="mx-4 text-info mb-0 float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
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
                                                <a href="/produk/edit/<?= $produk['id_produk'] ?>" class="text-xs" <?= text_success ?>>
                                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                                </a>
                                                <a href="" class="text-xs" <?= text_danger ?> data-bs-toggle="modal" data-bs-target="#modalDelProduk<?= $produk['id_produk'] ?>">
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
    <!-- MODAL HAPUS DATA PRODUK -->
    <?php foreach ($data_produk as $produk) : ?>
        <div class="modal fade" id="modalDelProduk<?= $produk['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content rounded-1 border-0 shadow-none ">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel">Hapus data Produk</h1>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Produk <strong><?= $produk['nama_produk'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/produk/delete/<?= $produk['id_produk'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>