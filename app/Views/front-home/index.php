<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>

<main class="main-content">
    <div class="section min-vh-85 position-relative transform-scale-md-8 mt-5">
        <div class="row g-5 align-items-center m-1">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="mb-4 animated slideInDown">
                    <i class="fa-solid fa-store fa-2x"></i>Point Of Sale Management App To Manage Your Business
                </h1>
                <h5 class="pb-3 animated slideInDown">
                    Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum
                    stet dolor sed justo kasd dolor sed magna dolor.
                </h5>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control p-3 border rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" />
                    <button type="button" class="btn btn-warning rounded-pill py-2 px-3 shadow-none position-absolute top-5 end-0 m-2">
                        Tampilan
                    </button>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-start position-relative ">
                <img class="img-fluid rounded animated zoomIn" src="/assets/img/heero-pos.png" alt="" />
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>