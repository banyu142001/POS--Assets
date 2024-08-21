<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-4 rounded-1 shadow-lg">
                <div class="card-header bg-dark rounded-1 text-white p-3">
                    User Profile
                </div>
                <div class="card-body px-3 pb-2">
                    <!-- sweet alert -->
                    <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-6">
                            <form action="/user/update_sampul" method="post" enctype="multipart/form-data">
                                <div class="box-profile text-center bg-dark rounded-2 p-2">
                                    <img src="/assets/img/profile-user/<?= session()->get('foto') ?>" alt="profile-picture" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                                </div>
                                <p class="text-muted m-0 mt-1" style="font-size: 12px;">Ubah foto</p>
                                <input type="file" name="sampul" class="form-control form-control-sm border bg-light p-1 m-lg-1 <?= (validation_errors()) ? 'is-invalid' : '' ?> " style="height: 30px;">
                                <div class="invalid-feedback">
                                    <small> <?= validation_show_error('sampul') ?></small>
                                </div>
                        </div>
                        <div class="col-lg-8 col-lg">
                            <div class="row mt-lg-0 mt-2">
                                <div class="col-lg-6 col-6">
                                    <small class="text-muted" style="font-size: 11px;">Nama</small>
                                    <p class="fw-bold" style="font-size: 13px;"><?= session()->get('nama') ?></p>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <small class="text-muted" style="font-size: 11px;">Username</small>
                                    <p class="fw-bold" style="font-size: 13px;"><?= session()->get('username') ?></p>
                                </div>
                            </div>
                            <div class="row mt-lg-0 mt-2">
                                <div class="col-lg-6 col-6">
                                    <small class="text-muted" style="font-size: 11px;">Alamat</small>
                                    <p class="fw-bold" style="font-size: 13px;"><?= session()->get('alamat') ?></p>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <small class="text-muted" style="font-size: 11px;">Email</small>
                                    <p class="fw-bold" style="font-size: 13px;"><?= session()->get('email') ?></p>

                                    <button class="btn btn-sm p-1 rounded-1 text-capitalize m-1 mb-2 text-white" <?= btn_success ?> name="submit" type="submit">Simpan</button>
                                    </form>
                                    <a href="/user/update_password" class="btn btn-sm p-1 rounded-1 text-capitalize m-1 text-white" <?= btn_info ?> name="submit" type="submit">Ubah password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <?= $this->endSection(); ?>