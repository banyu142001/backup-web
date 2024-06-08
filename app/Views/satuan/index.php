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
                        <div class="avatar rounded-2 position-relative" <?= bg_success ?>>
                            <i class="fas fa-box-open text-white fs-4"></i>
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
                    <div class="row justify-content-around ">
                        <div class="col-lg-7 border-bottom">
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
                                <table class="table table-sm align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7">
                                                Nama Satuan
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_satuan as $satuan) : ?>
                                            <tr>
                                                <td>
                                                    <p class="mb-0 mx-3 text-capitalize"><?= $satuan['nama_satuan'] ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="" class="text-xs" <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalUpdateSatuan<?= $satuan['id_satuan'] ?> ">
                                                        <i class="material-icons text-sm mx-1">edit</i> Edit
                                                    </a>
                                                    <a href="" class="text-xs" <?= text_danger ?> data-bs-toggle="modal" data-bs-target="#modalDelSatuan<?= $satuan['id_satuan'] ?>">
                                                        <i class="material-icons text-sm mx-1">delete</i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="rounded-0">
                                <div class="card-body rounded-0 px-3 pb-2">
                                    <?php if (session()->getFlashdata('flash')) : ?>
                                        <?= session()->getFlashdata('flash') ?>
                                    <?php endif ?>
                                    <p class="text-uppercase">Tambah data satuan baru</p>
                                    <form action="/satuan/save" method="post">
                                        <div class="form-group">
                                            <label for="satuan">Nama Satuan Baru</label>
                                            <div class="input-group input-group-outline">
                                                <input type="text" name="satuan" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama satuan" value="<?= old('satuan') ?>" />
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('satuan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn mt-2 p-2 text-white rounded-2 shadow-none" <?= btn_success ?> name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL HAPUS DATA SATUAN -->
    <?php foreach ($data_satuan as $satuan) : ?>
        <div class="modal fade" id="modalDelSatuan<?= $satuan['id_satuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content rounded-1 border-0 shadow-none ">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel">Hapus data Satuan</h1>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Satuan <strong><?= $satuan['nama_satuan'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/satuan/delete/<?= $satuan['id_satuan'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL UPDATE SATUAN -->
    <?php foreach ($data_satuan as $satuan) : ?>
        <div class="modal fade" id="modalUpdateSatuan<?= $satuan['id_satuan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-1 border-0 shadow-none">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Satuan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/satuan/update/<?= $satuan['id_satuan'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_update">NAMA SATUAN</label>
                                <div class="input-group input-group-outline">
                                    <input type="hidden" name="id_satuan" value="<?= $satuan['id_satuan'] ?>">
                                    <input type="text" name="satuan_update" id="satuan_update" class="form-control fw-bold text-uppercase" value="<?= $satuan['nama_satuan'] ?> " />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                            <button class="btn p-2 text-white rounded-2 shadow-none" <?= btn_success ?> name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>