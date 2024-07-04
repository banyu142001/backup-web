<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content  mt-2">
    <div class="section min-vh-85 position-relative  transform-scale-md-9">
        <div class="page-header  align-items-start min-vh-100">
            <div class="container my-auto">

                <!-- alert sistem -->
                <div id="flash_4" data-flash_4="<?= session()->getFlashdata('flash_4') ?>"></div>
                <div id="flash_6" data-flash_6="<?= session()->getFlashdata('flash_6') ?>"></div>

                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom rounded-1 border-0 border-top border-5">
                            <h4 class="my-0 border text-center mt-3 mx-auto rounded-circle" style="width: 90px;height: 90px;"><i class="fa-solid fa-store mt-3"></i> <br> Login</h4>
                            <div class="card-body">

                                <form action=" /auth/login" method="post" role="form" class="text-start my-0">
                                    <div class="input-group input-group-outline my-3 mb-4">
                                        <input type="text" name="username" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?>" placeholder="Username">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('username') ?>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?>" " placeholder=" Password">
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('password') ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-info text-white w-100 my-4 mb-2  shadow-none ">Login</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Belum punya akun?
                                        <a href="/auth/register" class="text-info text-gradient font-weight-bold">Register</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="" class="font-weight-bold text-white" target="_blank">Bayu Gurium</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>