<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">

    <div class="row">
        <div class="col-12">
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
                                Tambah Data Produk Baru
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Point Of Sale Management
                            </p>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <a href="/produk" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
                    </div>
                </div>
                <div class="row my-1 px-3">
                    <form action="/produk/save" method="post">
                        <?= csrf_field(); ?>
                        <div class="row mt-2">
                            <div class="col-lg-6 px-4">
                                <div class="form-group">
                                    <label for="kode_produk">Kode Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="kode_produk" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Kode Produk" value="<?= old('kode_produk') ?>" />
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('kode_produk') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="nama_produk" class="form-control  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama Produk" value="<?= old('nama_produk') ?>" />
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nama_produk') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <select name="kategori" id="kategori" class="form-select px-3 text-uppercase <?= (validation_errors()) ? 'is-invalid' : '' ?>  ">
                                            <option value=""> - pilih kategori - </option>
                                            <?php foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('kategori') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 px-4">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <select name="satuan" id="satuan" class="form-select px-3 text-uppercase <?= (validation_errors()) ? 'is-invalid' : '' ?>  ">
                                            <option value=""> - pilih satuan - </option>
                                            <?php foreach ($satuan as $satuan) : ?>
                                                <option value="<?= $satuan['id_satuan'] ?>"><?= $satuan['nama_satuan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('satuan') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="harga" class="form-control" value="<?= old('harga') ?>" placeholder="Rp . xxx" />
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <a href="/produk" class="btn p-2 btn-info mx-2" name="submit" type="submit">Kembali</a>
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
<?= $this->include('/layout/modal/modal-update'); ?>
<!-- Modal -->
<?= $this->endSection(); ?>