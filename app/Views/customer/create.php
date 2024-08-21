<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-150 border-radius-xl rounded-2 mt-2" style="background-image: url('/assets/img/');">
        <span class="mask  bg-gradient-primary  opacity-2"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 rounded-2 mt-n7">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_danger ?>>
                    <i class="fa-solid fa-users-line text-white fs-4"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Tambah Data Customer Baru
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/customer" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
            </div>
            <div class="row ">
                <form action="/customer/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="nama_customer">Nama Customer Baru</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_customer" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama Customer" value="<?= old('nama_customer') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama_customer') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomor_telephone">Nomor Telephone</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nomor_telephone" class="form-control  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="+628 xxx" value="<?= old('nomor_telephone') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nomor_telephone') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="input-group input-group-outline">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select px-2">
                                        <option value=""> - pilih - </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= old('alamat') ?></textarea>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button class="btn p-2 mx-2 text-white rounded-2 shadow-none" name="submit" type="reset" <?= btn_info ?>>Reset</button>
                                <button class="btn p-2 text-white rounded-2 shadow-none" <?= btn_success ?> name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>