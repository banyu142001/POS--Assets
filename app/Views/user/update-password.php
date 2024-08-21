<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card my-4 rounded-1 shadow-lg">
                <div class="card-header bg-dark rounded-1 text-white p-3">
                    Ubah Password
                    <a href="/user/profile" class="float-end text-white"> <i class="fa-solid fa-arrow-right fs-5"></i></a>
                </div>
                <div class="card-body px-3 pb-2">
                    <!-- sweet alert -->
                    <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>
                    <div id="flash_password" data-flash_password="<?= session()->getFlashdata('flash_password') ?>"></div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form action="/user/save_update_password" method="post">
                                <div class="form-group">

                                    <input type="password" name="password_lama" id="password_lama" class="form-control border px-2 mb-2 form-control-sm <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Password lama anda">

                                    <input type="password" name="password_baru" id="password_baru" class="form-control border px-2 mb-2 form-control-sm <?= (validation_errors()) ? 'is-invalid' : '' ?>" placeholder="Password baru">
                                </div>


                                <button class="btn btn-sm p-1 rounded-1 text-capitalize m-1 mb-2 text-white" <?= btn_success ?> name="submit" type="submit"> Simpan</button>
                            </form>
                        </div>

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