<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-2 pe-1 text-center">
                                <i class="fa-solid fa-store text-white"></i>
                                <h4 class="text-white font-weight-bolder text-center mb-0">Login</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('flash')) : ?>
                                <?= session()->getFlashdata('flash') ?>
                            <?php endif; ?>

                            <form action="/auth/login" method="post" role="form" class="text-start">
                                <div class="input-group input-group-outline my-3">
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
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Login</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Belum punya akun?
                                    <a href="/auth/register" class="text-primary text-gradient font-weight-bold">Register</a>
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
</main>
<?= $this->endSection(); ?>