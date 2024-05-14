<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <i class="fa-solid fa-truck-arrow-right text-dark fs-1"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Tambah Data Stok Masuk
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/stokmasuk" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <?php if (session()->getFlashdata('flash')) : ?>
                    <?= session()->getFlashdata('flash'); ?>
                <?php endif; ?>
            </div>
        </div>
        <form action="">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <label for="nama_supplier">Tanggal</label>
                        <div class="input-group input-group-outline">
                            <input type="date" name="tgl" class="form-control m-0" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, quae.
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Modal -->
<?= $this->endSection(); ?>