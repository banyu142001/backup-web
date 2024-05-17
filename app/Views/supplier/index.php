<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-150 border-radius-xl rounded-2 mt-2" style="background-image: url('/assets/img/');">
        <span class="mask  bg-gradient-primary  opacity-2"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 rounded-2 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <i class="fa-solid fa-truck-arrow-right text-dark fs-1"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Data Suppliers
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/supplier/create" class="mx-3 text-info mb-0 float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">
                            Nama Supplier
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Telephone
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Alamat
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Deskripsi
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-7 ps-2"> <i class="fa-solid fa-file-pen"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $suply) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div>
                                        <i class="fa-solid fa-truck-arrow-right text-success mx-2"></i>
                                    </div>
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?= $suply['nama_supplier'] ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $suply['no_telephone'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $suply['alamat'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $suply['deskripsi'] ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="/supplier/edit/<?= $suply['id_supplier'] ?>" class="text-success font-weight-bolder text-xs">
                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                </a>
                                <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelSupply<?= $suply['id_supplier'] ?> ">
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
<!-- MODAL HAPUS DATA SUPPLIERS -->
<?php foreach ($suppliers as $suply) : ?>
    <div class="modal fade" id="modalDelSupply<?= $suply['id_supplier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content rounded-1 border-0 shadow-none">
                <div class="modal-header p-2">
                    <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel">Hapus data Supplier</h1>
                </div>
                <div class="modal-body p-3 my-0">
                    <p>Data <strong><?= $suply['nama_supplier'] ?></strong> akan dihapus?</p>
                </div>
                <div class="modal-footer p-2">
                    <a href="" class=" badge text-dark bg-light p-2" data-bs-dismiss="modal"> Batal</a>
                    <a href="/supplier/delete/<?= $suply['id_supplier'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>

<?= $this->endSection(); ?>