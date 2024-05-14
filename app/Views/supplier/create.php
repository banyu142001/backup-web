<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-150 border-radius-xl rounded-2 mt-2" style="background-image: url('/assets/img/');">
        <span class="mask  bg-gradient-primary  opacity-2"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 rounded-2 mt-n7">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <i class="fa-solid fa-truck-arrow-right text-dark fs-1"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Tambah Data Supplier Baru
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/supplier" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
            </div>
            <div class="row ">
                <form action="/supplier/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_supplier" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama Supplier" value="<?= old('nama_supplier') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama_supplier') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telephone</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="telp" class="form-control  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="+628 xxx" value="<?= old('telp') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('telp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= old('alamat') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <div class="input-group input-group-outline mb-2">
                                    <textarea name="desc" id="desc" cols="30" rows="2" class="form-control"><?= old('desc') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <a href="/supplier" class="btn p-2 btn-info mx-2" name="submit" type="submit">Kembali</a>
                                <button class="btn p-2 btn-success" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->include('/layout/modal/modal-delete'); ?>
<!-- Modal -->
<?= $this->endSection(); ?>