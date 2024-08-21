<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid mt-2">

    <div class="row">
        <div class="col-lg-12">
            <h5 class="mx-2">Edit & Update data user</h5>
            <div class="card shadow-sm border-0 p-2 my-2">
                <div class="col my-auto">
                    <a href="/user" class="mb-0 mt-2 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
                </div>
                <form action="/user/update/<?= $user['id'] ?>" method="post">
                    <?= csrf_field(); ?>
                    <!-- hidden data -->
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="row mt-2">
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="nama">Nama User</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="nama" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Nama" value="<?= (old('nama')) ? old('nama') : $user['nama'] ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="username" class="form-control  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Username" value="<?= (old('username')) ? old('username') : $user['username'] ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('username') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="text" name="email" class="form-control <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Email" value="<?= (old('email')) ? old('email') : $user['email'] ?>" />
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <div class="input-group input-group-outline mb-2">
                                    <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control"><?= (old('alamat')) ? old('alamat') : $user['alamat'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 px-4">
                            <div class="form-group">
                                <label for="foto">Level / Role User</label>
                                <div class="input-group input-group-outline mb-2">
                                    <select name="level" id="level" class="form-select px-2">
                                        <option value="Admin"> - pilih role - </option>
                                        <option value="1" <?= ($user['level'] == 1) ? 'selected' : '' ?>>Admin</option>
                                        <option value="2" <?= ($user['level'] == 2) ? 'selected' : '' ?>>Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="password" name="password" class="form-control bg-light" placeholder="Readonly" readonly />

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-konf">Konfirmasi Password</label>
                                <div class="input-group input-group-outline mb-2">
                                    <input type="password" name="password-konf" class="form-control bg-light" placeholder="Readonly" readonly />
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn p-2 mx-2 text-white rounded-2 shadow-none" name="submit" type="reset" <?= btn_info ?>>Reset</button>
                                <button class="btn p-2 text-white rounded-2 shadow-none" <?= btn_success ?> name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Update & Simpan</button>
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