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
                    <i class="fa-solid fa-users-line text-dark fs-1"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Data Customer
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <!-- <div class="col my-auto">
                <a href="/customer/create" class="btn bg-gradient-dark btn-sm mb-0 float-end"><i class="material-icons text-sm">add</i> Tambah customer</a>
            </div> -->
            <div class="col my-auto">
                <a href="/customer/create" class="mx-3 text-info mb-0 float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
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
                            Nama Customer
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Nomor Telephone
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Jenis Kelamin
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Alamat
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-7 ps-2"> <i class="fa-solid fa-file-pen"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div>
                                        <i class="fa-solid fa-user-tag text-primary mx-2"></i>
                                    </div>
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?= $customer['nama_customer'] ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $customer['no_telephone'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $customer['jenis_kelamin'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bolder mb-0"><?= $customer['alamat'] ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="/customer/edit/<?= $customer['id_customer'] ?>" class="text-success font-weight-bolder text-xs">
                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                </a>
                                <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelCus<?= $customer['id_customer'] ?> ">
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

<?= $this->include('/layout/modal/modal-delete'); ?>
<!-- Modal -->
<?= $this->endSection(); ?>