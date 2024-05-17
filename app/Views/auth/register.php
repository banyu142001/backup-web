<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content mt-0">
    <div class="section min-vh-85 position-relative  transform-scale-md-9 ">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative  h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"></div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="card-style mb-1">
                                        <h4 class="font-weight-bolder">Register</h4>
                                        <p class="mb-0">
                                            Lakukan registrasi akun !
                                        </p>
                                    </div>
                                    <?php if (session()->getFlashdata('flash')) : ?>
                                        <?= session()->getFlashdata('flash') ?>
                                    <?php endif ?>
                                    <form action="/auth/saveRegister" method="post">
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="text" name="nama" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('nama') ?>" placeholder="Nama" />
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('nama') ?>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="text" name="username" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('username') ?>" placeholder="Username" />
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('username') ?>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="text" name="email" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('email') ?>" placeholder="Email" />
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('email') ?>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <textarea name="alamat" id="alamat" cols="30" rows="1" class="form-control" placeholder="Alamat"><?= old('alamat') ?></textarea>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="password" name="password" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder=" Password" />
                                            <div class="invalid-feedback">
                                                <?= validation_show_error('password') ?>
                                            </div>
                                        </div>
                                        <div class="input-group input-group-outline mb-2">
                                            <input type="password" name="password-konf" class="form-control" placeholder=" Konfirmasi password" />
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary btn-lg w-100 mt-2">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2">
                                    <p class="text-sm mx-auto">
                                        Sudah punya akun ?
                                        <a href="/auth" class="text-primary text-gradient font-weight-bold">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?= $this->endSection(); ?>