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
            <div class="card my-1 rounded-1 ">
                <div class="row gx-4 mt-3">
                    <div class="col-auto px-4">
                        <div class="avatar avatar-xl position-relative">
                            <i class="fa-solid fa-magnifying-glass-chart text-dark fs-1"></i>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                DATA MASTER - Satuan
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Point Of Sale Management
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2 pb-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if (session()->getFlashdata('flash_del')) : ?>
                                <?= session()->getFlashdata('flash_del') ?>
                            <?php endif ?>
                            <?php if (session()->getFlashdata('flash_update')) : ?>
                                <?= session()->getFlashdata('flash_update') ?>
                            <?php endif ?>
                            <?php if (session()->getFlashdata('flash_update_rule')) : ?>
                                <?= session()->getFlashdata('flash_update_rule') ?>
                            <?php endif ?>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7">
                                                Nama Satuan
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($satuan as $satuan) : ?>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 mx-3 text-sm text-uppercase"><?= $satuan['nama_satuan'] ?></h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="" class="text-success font-weight-bolder text-xs" data-bs-toggle="modal" data-bs-target="#modalUpdateSatuan<?= $satuan['id_satuan'] ?> ">
                                                        <i class="material-icons text-sm mx-1">edit</i> Edit
                                                    </a>
                                                    <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelSatuan<?= $satuan['id_satuan'] ?>">
                                                        <i class="material-icons text-sm mx-1">delete</i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="rounded-2 my-4 mt-5 border">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-secondary rounded-2 pt-1">
                                        <h6 class="text-white text-capitalize ps-3 mt-1 pb-2">Tambah Data Satuan</h6>
                                    </div>
                                </div>
                                <div class="card-body rounded-0 px-3 pb-2">
                                    <?php if (session()->getFlashdata('flash')) : ?>
                                        <?= session()->getFlashdata('flash') ?>
                                    <?php endif ?>
                                    <form action="/satuan/save" method="post">
                                        <div class="form-group">
                                            <label for="satuan" class=" fw-bold ">NAMA SATUAN BARU</label>
                                            <div class="input-group input-group-outline">
                                                <input type="text" name="satuan" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama satuan" value="<?= old('satuan') ?>" />
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('satuan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn my-1 mt-2 p-2 btn-secondary" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                                    </form>
                                </div>
                            </div>
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