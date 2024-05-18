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
                    <button type="button" class="btn btn-info rounded-pill py-2 px-3 shadow-none position-absolute top-5 end-0 m-2">
                        Get Pro
                    </button>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid rounded animated zoomIn" src="/assets/img/hero.jpg" alt="" />
            </div>
        </div>
    </div>
    <!-- Overview Start -->
    <div class="container-xxl bg-light my-6 py-5" id="overview">
        <div class="container">
            <div class="row g-5 py-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="/assets/img/overview-1.jpg" />
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="mb-0">01</h1>
                        <span class="bg-primary mx-2" style="width: 30px; height: 2px"></span>
                        <h5 class="mb-0">App Integration</h5>
                    </div>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>Fully
                        customizable
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>User
                        friendly interface
                    </p>
                    <p class="mb-0">
                        <i class="fa fa-check-circle text-primary me-3"></i>More
                        effective & poerwfull
                    </p>
                </div>
            </div>
            <div class="row g-5 py-5 align-items-center flex-column-reverse flex-lg-row">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="mb-0">02</h1>
                        <span class="bg-primary mx-2" style="width: 30px; height: 2px"></span>
                        <h5 class="mb-0">App Customization</h5>
                    </div>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>Fully
                        customizable
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>User
                        friendly interface
                    </p>
                    <p class="mb-0">
                        <i class="fa fa-check-circle text-primary me-3"></i>More
                        effective & poerwfull
                    </p>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="/assets/img/overview-2.jpg" />
                </div>
            </div>
            <div class="row g-5 py-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="/assets/img/overview-3.jpg" />
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center mb-4">
                        <h1 class="mb-0">03</h1>
                        <span class="bg-primary mx-2" style="width: 30px; height: 2px"></span>
                        <h5 class="mb-0">App Modification</h5>
                    </div>
                    <p class="mb-4">
                        Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                        labore. Clita erat ipsum et lorem et sit, sed stet no labore
                        lorem sit clita duo justo eirmod magna dolore erat amet
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>Fully
                        customizable
                    </p>
                    <p>
                        <i class="fa fa-check-circle text-primary me-3"></i>User
                        friendly interface
                    </p>
                    <p class="mb-0">
                        <i class="fa fa-check-circle text-primary me-3"></i>More
                        effective & poerwfull
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Overview End -->
</main>

<?= $this->endSection(); ?>