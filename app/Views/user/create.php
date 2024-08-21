<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="mx-2">Tambah Data User Baru</h5>
            <div class="card shadow-sm border-0 p-2 my-2">
                <div class="col my-auto">
                    <a href="/user" class="mb-0 mt-2 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
                </div>
                <form action="/user/save" method="post">
                    <?= csrf_field(); ?>
                    <div class="row mt-2">
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="nama">Nama User</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="nama" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama" value="<?= old('nama') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="username" class="form-control  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Username" value="<?= old('username') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('username') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="email" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Email" value="<?= old('email') ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <div class="input-group input-group-outline mb-2">
                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= old('alamat') ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="password" name="password" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?>  " placeholder="Password" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('password') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-konf">Konfirmasi Password</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="password" name="password-konf" class="form-control" placeholder="Password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto">Level / Role User</label>
                                <div class="input-group input-group-outline mb-2">
                                    <select name="level" id="level" class="form-select px-2">
                                        <option value="Admin"> - pilih role - </option>
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-4">
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
<!-- Modal -->
<?= $this->endSection(); ?>