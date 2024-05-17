<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>

<div class="mx-md-3 position-relative" style="background-image: url('/assets/img/'); background-size: cover;">
    <main class="main-content border-radius-lg h-100">
        <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="mb-4 animated slideInDown">
                        Awesome Software To Manage Your Business
                    </h1>
                    <p class="pb-3 animated slideInDown">
                        Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum
                        stet dolor sed justo kasd dolor sed magna dolor.
                    </p>
                    <div class="position-relative w-100 mt-3">
                        <input class="form-control border rounded w-100 px-2 " type="text" placeholder="Your Email" style="height: 70px" />
                        <button type="button" class="btn btn-primary rounded shadow-none position-absolute top-0 end-0 m-2">
                            Free Trail
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid rounded animated zoomIn" src="/assets/img/hero.jpg" alt="" />
                </div>
            </div>
        </div>
    </main>

</div>


<?= $this->endSection(); ?>