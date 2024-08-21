<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content  mt-2">
    <div class="section min-vh-85 position-relative  transform-scale-md-9">
        <section>
            <div class="page-header min-vh-100">
                <div class="container mt-5">
                    <!-- alert sistem -->
                    <div id="flash_4" data-flash_4="<?= session()->getFlashdata('flash_4') ?>"></div>
                    <div id="flash_6" data-flash_6="<?= session()->getFlashdata('flash_6') ?>"></div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-2">
                                <div class="row justify-content-between">
                                    <div class="col-lg-5 mx-lg-4">
                                        <p class="m-0 mt-lg-2 mt-4 mx-lg-4 mx-4"> <i class="fa-solid fa-store"></i>
                                            Point Of Sale</p>
                                        <div class="card-body">
                                            <div class="card-style">
                                                <h4 class="font-weight-bolder">Login</h4>
                                                <p class="text-sm mx-auto">
                                                    Belum punya akun ?
                                                    <a href="/auth/register" class="text-info text-gradient font-weight-bold">Register</a>
                                                </p>
                                            </div>
                                            <div class="card-body mx-auto  px-2 border-light">
                                                <form action=" /auth/login" method="post" role="form" class="text-start">
                                                    <div class="input-group input-group-outline my-2 mb-3">
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
                                                        <button type="submit" class="btn btn-lg text-white w-100  mb-1 rounded-1 " <?= btn_info ?>>Login</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="background-image: url(/assets/img/log.png); background-repeat: no-repeat; background-position: 0 0px; background-size: cover; object-fit: fill; border-radius: 0px 7px 7px 0px;">
                                    </div>
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