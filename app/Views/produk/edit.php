<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">

    <div class="row">
        <div class="col-12">
            <div class="card rounded-1 ">
                <div class="row gx-4 mt-3">
                    <div class="col-auto px-4">
                        <div class="avatar rounded-2 position-relative" <?= bg_info ?>>
                            <i class="fa-solid fa-magnifying-glass-chart text-white fs-4"></i>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-50">
                            <h5 class="mb-1">
                                Edit Data Produk
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Point Of Sale Management
                            </p>
                        </div>
                    </div>
                    <div class="col my-auto">
                        <a href="/produk" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
                    </div>
                </div>
                <div class="row my-1 px-3">
                    <form action="/produk/update/<?= $produk_update['id_produk'] ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_produk" value="<?= $produk_update['id_produk'] ?>">
                        <div class="row mt-2">
                            <div class="col-lg-6 px-4">
                                <div class="form-group">
                                    <label for="kode_produk">Kode Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="kode_produk" class="form-control fw-bold  <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= (old('kode_produk') ? old('kode_produk') : $produk_update['kode_produk']) ?>" />
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('kode_produk') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="nama_produk" class="form-control fw-bold  <?= (validation_errors()) ? 'is-invalid' : '' ?> " value="<?= (old('nama_produk') ? old('nama_produk') : $produk_update['nama_produk']) ?>" />
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('nama_produk') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <select name="kategori" id="kategori" class="form-select px-3 text-uppercase fw-bold <?= (validation_errors()) ? 'is-invalid' : '' ?>  ">
                                            <option value=""> - pilih kategori - </option>
                                            <?php foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat['id_kategori'] ?>" <?= ($kat['id_kategori'] == $produk_update['id_kategori']) ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('kategori') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 px-4">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <select name="satuan" id="satuan" class="form-select px-3 text-uppercase fw-bold <?= (validation_errors()) ? 'is-invalid' : '' ?>  ">
                                            <option value=""> - pilih satuan - </option>
                                            <?php foreach ($satuan as $satuan) : ?>
                                                <option value="<?= $satuan['id_satuan'] ?>" <?= ($satuan['id_satuan'] == $produk_update['id_satuan']) ? 'selected' : '' ?>><?= $satuan['nama_satuan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= validation_show_error('satuan') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Produk</label>
                                    <div class="input-group input-group-outline mb-2">
                                        <input type="text" name="harga" class="form-control fw-bold" value="<?= (old('harga') ? old('harga') : $produk_update['harga']) ?>" />
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