<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content  mt-2">
    <div class="section min-vh-85 position-relative  transform-scale-md-9">
        <div class="page-header  align-items-start min-vh-100">
            <div class="container my-auto">

                <!-- alert sistem -->
                <div id="flash_4" data-flash_4="<?= session()->getFlashdata('flash_4') ?>"></div>
                <div id="flash_6" data-flash_6="<?= session()->getFlashdata('flash_6') ?>"></div>

                <div class="row mt-2 justify-content-center">
                    <div class="col-lg-6 mt-5">
                        <h3>Selamat datang kembali di Aplikasi Point Of Sale 👋</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, error accusamus nihil modi rem hic, temporibus adipisci deserunt doloremque quaerat sapiente odio laudantium voluptatibus nobis consectetur sunt magni pariatur a.</p>
                        <div class="row">
                            <div class="col-4">
                                <div class="card shadow-lg rounded-1 border-0 my-2" style="background-image: url(/assets/img/heero-pos.png);height:100px; position:center; background-size: cover; object-fit: fill;"></div>
                            </div>
                            <div class="col-4">
                                <div class="card shadow-lg rounded-1 border-0 my-2" style="background-image: url(/assets/img/table-pos.png);height:100px; position:center; background-size: cover;  object-fit: fill;"></div>
                            </div>
                            <div class="col-4">
                                <div class="card shadow-lg rounded-1 border-0 my-2" style="background-image: url(/assets/img/android-pos.png);height:100px; position:center; background-size: cover;  object-fit: fill;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mx-3">
                        <div class="row mt-3">
                            <div class="col-lg col-md-8 col-12 mx-auto">
                                <div class="card-body mx-auto border mt-5 px-2 border-light">
                                    <h6 class="text-center mx-auto border mt-1 rounded-circle" style="width: 80px;height: 80px;"><i class="fa-solid fa-store mt-3"></i> <br> Login</h6>
                                    <form action=" /auth/login" method="post" role="form" class="text-start mt-2">
                                        <div class="input-group input-group-outline my-2 mb-2 mt-3">
                                            <input type="text" name="username" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?>" placeholder="Username">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="password" name="password" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?>" " placeholder=" Password">
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn text-white w-100  mb-1 rounded-1 " <?= btn_info ?>>Login</button>
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


            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>