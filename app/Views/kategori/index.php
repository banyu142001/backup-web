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
                                DATA MASTER - Kategori
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
                                                    <h6 class="mb-0 mx-3 text-sm text-uppercase"><?= $kat['nama_kategori'] ?></h6>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="/kategori/<?= $kat['id_kategori'] ?>" class="text-success font-weight-bolder text-xs" data-bs-toggle="modal" data-bs-target="#modalUpdateKategori<?= $kat['id_kategori'] ?> ">
                                                        <i class="material-icons text-sm mx-1">edit</i> Edit
                                                    </a>
                                                    <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelKategori<?= $kat['id_kategori'] ?> ">
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
                                    <div class="bg-gradient-info rounded-2 pt-1">
                                        <h6 class="text-white text-capitalize ps-3 mt-1 pb-2">Tambah Data Kategori</h6>
                                    </div>
                                </div>
                                <div class="card-body rounded-0 px-3 pb-2">
                                    <?php if (session()->getFlashdata('flash')) : ?>
                                        <?= session()->getFlashdata('flash') ?>
                                    <?php endif ?>
                                    <form action="/kategori/save" method="post">
                                        <div class="form-group">
                                            <label for="kategori" class=" fw-bold ">NAMA KATEGORI BARU</label>
                                            <div class="input-group input-group-outline">
                                                <input type="text" name="kategori" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama Kategori" value="<?= old('kategori') ?>" />
                                                <div class="invalid-feedback">
                                                    <?= validation_show_error('kategori') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn my-1 mt-2 p-2 btn-info" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL HAPUS DATA KATEGORI -->
    <?php foreach ($kategori as $kat) : ?>
        <div class="modal fade" id="modalDelKategori<?= $kat['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content rounded-1 border-0 shadow-none">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel">Hapus data Kategori</h1>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Kategori <strong><?= $kat['nama_kategori'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/kategori/delete/<?= $kat['id_kategori'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL UPDATE KATEGORI -->
    <?php foreach ($kategori as $kat) : ?>
        <div class="modal fade" id="modalUpdateKategori<?= $kat['id_kategori'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-1 border-0 shadow-none">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/kategori/update/<?= $kat['id_kategori'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_update">NAMA KATEGORI</label>
                                <div class="input-group input-group-outline">
                                    <input type="hidden" name="id_kategori" value="<?= $kat['id_kategori'] ?>">
                                    <input type="text" name="kategori_update" id="kategori_update" class="form-control fw-bold text-uppercase" value="<?= $kat['nama_kategori'] ?> " />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="" class="btn text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                            <button class="btn p-2 btn-success" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<?= $this->endSection(); ?>