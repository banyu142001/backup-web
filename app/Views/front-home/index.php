<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>

<div class="mx-md-3 position-relative" style="background-image: url('/assets/img/'); background-size: cover;">
    <main class="main-content border-radius-lg h-100">
        <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>Selamat Datang! 👋</h5>
                            </div>
                        </div>
                        <h1 class="col-lg"> <i class="fa-solid fa-store"></i> Point Of Sale Management App.</h1>
                    </div>
                </div>
                <div class="row pt-2 mt-2">
                    <div class="col-lg-1 col-md-1 pt-5 pt-lg-0 ms-lg-5 text-center">
                        <button class="btn btn-primary border-radius-lg p-2 mt-n4 mt-md-2" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Home">
                            <i class="material-icons p-2">home</i>
                        </button>
                        <button class="btn btn-primary border-radius-lg p-2 mt-n4 mt-md-0" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Search">
                            <i class="material-icons p-2">search</i>
                        </button>
                        <button class="btn btn-primary border-radius-lg p-2 mt-n4 mt-md-0" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Minimize">
                            <i class="material-icons p-2">more_horiz</i>
                        </button>
                    </div>
                    <div class="col-lg-8 col-md-11 ps-md-5 mb-5 mb-md-0">
                        <div class="d-flex">
                            <div class="me-auto">
                                <h1 class="display-1 font-weight-bold mt-n3 mb-0 text-warning ">28°C</h1>
                                <h6 class="text-uppercase mb-0 text-warning ms-1">Berawan</h6>
                            </div>
                            <div class="ms-auto">
                                <img class="w-50 float-end mt-n6 mt-lg-n4" src="/assets/img/small-logos/icon-sun-cloud.png" alt="image sun">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="card move-on-hover overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h6 class="mb-0 me-3">08:00</h6>
                                            <h6 class="mb-0">Mulai Bekerja <br>
                                                <small class="text-secondary font-weight-normal">Ontime</small>
                                            </h6>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="d-flex">
                                            <h6 class="mb-0 me-3">12:00</h6>
                                            <h6 class="mb-0">Istirahat<br />
                                                <small class="text-secondary font-weight-normal">Makan, & Ibadah</small>
                                            </h6>
                                        </div>
                                        <hr class="horizontal dark">
                                        <div class="d-flex">
                                            <h6 class="mb-0 me-3">13:00</h6>
                                            <h6 class="mb-0">Lanjut Bekerja<br />
                                                <small class="text-secondary font-weight-normal">-</small>
                                            </h6>
                                        </div>
                                    </div>
                                    <a class="bg-gray-100 w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                        <i class="material-icons text-primary">expand_more</i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-4 mt-sm-0">
                                <div class="card bg-gradient-dark move-on-hover">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h5 class="mb-0 text-white">Stok</h5>
                                            <div class="ms-auto">
                                                <h1 class="text-white text-end mb-0 mt-n2">14</h1>
                                                <p class="text-sm mb-0 text-white">items</p>
                                            </div>
                                        </div>
                                        <p class="text-white mb-0">Stok In</p>
                                        <p class="mb-0 text-white">Stok Out</p>
                                    </div>
                                    <a href="javascript:;" class="w-100 text-center py-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                        <i class="material-icons text-white">expand_more</i>
                                    </a>
                                </div>
                                <div class="card move-on-hover mt-4">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <p class="mb-0 text-success">Emails (21)</p>
                                            <a href="javascript:;" class="ms-auto text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Check your emails">
                                                Check
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                                <div class="card card-background card-background-mask-dark move-on-hover align-items-start">
                                    <div class="cursor-pointer">
                                        <div class="full-background" style="background-image: url('https://images.unsplash.com/photo-1470813740244-df37b8c1edcb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80')"></div>
                                        <div class="card-body">
                                            <h5 class="text-white mb-0">Night Jazz</h5>
                                            <p class="text-white text-sm">Gary Coleman</p>
                                            <div class="d-flex mt-5">
                                                <button class="btn btn-outline-white rounded-circle p-2 mb-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Prev">
                                                    <i class="material-icons p-2 mt-0">skip_previous</i>
                                                </button>
                                                <button class="btn btn-outline-white rounded-circle p-2 mx-2 mb-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Pause">
                                                    <i class="material-icons p-2 mt-0">play_arrow</i>
                                                </button>
                                                <button class="btn btn-outline-white rounded-circle p-2 mb-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Next">
                                                    <i class="material-icons p-2 mt-0">skip_next</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card move-on-hover mt-4">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <p class="my-auto">Pesan</p>
                                            <div class="ms-auto">
                                                <div class="avatar-group">
                                                    <a href="javascript:;" class="avatar avatar-sm border-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="7 New Messages">
                                                        <img alt="Image placeholder" src="/assets/img/team-4.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm  text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="" class="font-weight-bold" target="_blank">Bayu Gurium</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>

</div>


<?= $this->endSection(); ?>