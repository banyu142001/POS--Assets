<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>
<main class="main-content mt-0">
    <div class="section min-vh-85 position-relative  transform-scale-md-9 ">
        <section>
            <div class="page-header min-vh-100">
                <div class="container mt-5">
                    <div class="row justify-content-center mt-3">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-2">
                                <div class="row justify-content-between">
                                    <div class="col-lg-5 mx-lg-4">
                                        <p class="m-0 mt-lg-2 mt-4 mx-lg-4 mx-4"> <i class="fa-solid fa-store"></i>
                                            Point Of Sale</p>
                                        <div class="card-body">
                                            <div class="card-style mb-1">
                                                <h4 class="font-weight-bolder">Get's started.</h4>
                                                <p class="text-sm mx-auto">
                                                    Sudah punya akun ?
                                                    <a href="/auth" class="text-info text-gradient font-weight-bold">Login</a>
                                                </p>
                                            </div>
                                            <!-- alert -->
                                            <?php if (session()->getFlashdata('flash')) : ?>
                                                <?= session()->getFlashdata('flash') ?>
                                            <?php endif ?>
                                            <form action="/auth/saveRegister" method="post">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-outline mb-2">
                                                            <input type="text" name="nama" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('nama') ?>" placeholder="Nama Lengkap" />
                                                            <div class="invalid-feedback">
                                                                <?= validation_show_error('nama') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group input-group-outline mb-2">
                                                            <input type="text" name="username" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('username') ?>" placeholder="Username" />
                                                            <div class="invalid-feedback">
                                                                <?= validation_show_error('username') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group input-group-outline mb-2">
                                                    <input type="text" name="email" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= old('email') ?>" placeholder="Email" />
                                                    <div class="invalid-feedback">
                                                        <?= validation_show_error('email') ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group input-group-outline mb-2">
                                                            <input type="password" name="password" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder=" Password" />
                                                            <div class="invalid-feedback">
                                                                <?= validation_show_error('password') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group input-group-outline mb-2">
                                                            <input type="password" name="password-konf" class="form-control" placeholder=" Konf password" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group input-group-outline mb-2">
                                                    <textarea name="alamat" id="alamat" cols="30" rows="1" class="form-control" placeholder="Alamat"><?= old('alamat') ?></textarea>
                                                </div>
                                                <div class="text-center mt-2">
                                                    <button type="submit" class="btn btn-lg w-100 mt-2 rounded-1 text-white" <?= btn_info ?>>
                                                        Register
                                                    </button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6" style="background-image: url(/assets/img/reg.png); background-repeat: no-repeat; background-position: 0 0px; background-size: cover; object-fit: fill; border-radius: 0px 7px 7px 0px;">
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