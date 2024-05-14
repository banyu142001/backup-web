<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <i class="fas fa-folder-plus text-dark fs-1 "></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Data Stok Masuk / Barang Masuk
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/stokmasuk/create" class="mx-3 text-info mb-0 float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <?php if (session()->getFlashdata('flash')) : ?>
                    <?= session()->getFlashdata('flash'); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Tanggal data Masuk
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8">
                            Kode Produk
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Nama Produk
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Jumlah / QTY
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-8 ps-2"> <i class="fa-solid fa-file-pen"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_stok_masuk as $stok) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div>
                                        <i class="sfas fa-history mx-1"></i>
                                    </div>
                                    <div class="my-auto">
                                        <p class="mb-0 mx-2 text-sm"><?= indo_date($stok['tanggal']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= $stok['kode_produk'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $stok['nama_produk'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $stok['qty'] ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="" class="text-success text-xs">
                                    <i class="material-icons text-xs mx-1"></i> Detail
                                </a>
                                <a href="/stokmasuk/delete/<?= $stok['id_stok_masuk'] . '/' . $stok['id_produk']  ?>" class="text-primary font-weight-bold text-xs">
                                    <i class="material-icons text-xs mx-1"></i> Delete
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
<!-- Modal -->
<?= $this->endSection(); ?>