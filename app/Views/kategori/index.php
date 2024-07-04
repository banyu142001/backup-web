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
                        <div class="avatar rounded-2 position-relative" <?= bg_danger ?>>
                            <i class="fas fa-tags text-white fs-4 "></i>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                DATA MASTER - Kategori
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

                            <!-- alert sistem -->
                            <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>
                            <div id="flash_2" data-flash_2="<?= session()->getFlashdata('flash_2') ?>"></div>
                            <div id="flash_3" data-flash_3="<?= session()->getFlashdata('flash_3') ?>"></div>

                            <div class="table-responsive p-0">
                                <table class="table table-sm align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Kategori
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <tr>
                                                <td>
                                                    <p class="mb-0 mx-3 text-capitalize"><?= $kat['nama_kategori'] ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/kategori/<?= $kat['id_kategori'] ?>" class="text-xs" <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalUpdateKategori<?= $kat['id_kategori'] ?> ">
                                                        <i class="material-icons text-sm mx-1">edit</i> Edit
                                                    </a>
                                                    <a href="/kategori/delete/<?= $kat['id_kategori'] ?>" class="text-xs" <?= text_danger ?> id="btn-hapus">
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
                                    <p class="text-uppercase">Tambah data kategori baru</p>
                                    <form action="/kategori/save" method="post">
                                        <div class="form-group">
                                            <label for="kategori">Nama Kategori</label>
                                            <div class="input-group input-group-outline p-0">
                                                <input type="text" name="kategori" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama Kategori" value="<?= old('kategori') ?>" />
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('kategori') ?>
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

    <!-- MODAL UPDATE KATEGORI -->
    <?php foreach ($kategori as $kat) : ?>
        <div class="modal fade" id="modalUpdateKategori<?= $kat['id_kategori'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-1 border-0 shadow-none">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Kategori</h1>
                        <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-2 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
                    </div>
                    <form action="/kategori/update/<?= $kat['id_kategori'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_update">NAMA KATEGORI</label>
                                <div class="input-group input-group-outline">
                                    <input type="hidden" name="id_kategori" value="<?= $kat['id_kategori'] ?>">
                                    <input type="text" name="kategori_update" id="kategori_update" class="form-control fw-bold" value="<?= $kat['nama_kategori'] ?> " />
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