<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_info ?>>
                    <i class="fas fa-share-square tex-white fs-4"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Tambah Data Stok Keluar
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col my-auto">
                <a href="/stokmasuk" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <?php if (session()->getFlashdata('flash')) : ?>
                    <?= session()->getFlashdata('flash'); ?>
                <?php endif; ?>
            </div>
        </div>
        <form action="/stokkeluar/save" method="post">
            <div class="row justify-content-evenly mt-2 ">
                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <label for="kode_produk" class="fw-bolder">Pilih Produk</label>
                        <div class="input-group input-group-outline ">
                            <input type="hidden" class="form-control" name="id_produk" id="id_produk">
                            <input type="text" class="form-control text-warning fw-bold <?= (validation_errors()) ? 'is-invalid' :  null ?>" name="kode_produk" id="kode_produk" placeholder="Pilih produk">
                            <div class="invalid-feedback">
                                <?= validation_show_error('kode_produk') ?>
                            </div>
                            <button type="button" class="btn btn-sm px-1  input-group-text" <?= btn_success_search ?> data-bs-toggle="modal" data-bs-target="#modalStok"><i class="fas fa-search text-white fs-5 mx-3"></i></button>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="nama_produk" class="fw-bolder">Nama Produk</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control text-warning fw-bold" placeholder="-" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-1">
                                <label for="nama_satuan" class="fw-bolder">Satuan</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_satuan" id="nama_satuan" class="form-control text-warning fw-bold" placeholder="-" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-1">
                                <label for="stok" class="fw-bolder">Stok Awal</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="stok" id="stok" class="form-control text-warning fw-bold " placeholder="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="qty" class="fw-bolder">Jumlah / Qty</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="qty" id="qty" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <label for="detail" class="fw-bolder">Detail Keterangan Produk</label>
                        <div class="input-group input-group-outline">
                            <input type="text" name="detail" id="detail" class="form-control" placeholder="Rusak / Hilang / Kadaluarsa">
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label for="supplier" class="fw-bolder">Supplier</label>
                        <div class="input-group input-group-outline">
                            <select name="id_supplier" id="id_supplier" class="form-select px-3 fw-light">
                                <option value=""> - pilih supplier - </option>
                                <?php foreach ($data_supplier as $supplier) : ?>
                                    <option value="<?= $supplier['id_supplier'] ?>"> <?= $supplier['nama_supplier'] ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                    <div class=" form-group mb-1">
                        <label for="tgl" class="fw-bolder">Tanggal Pamasukan</label>
                        <div class="input-group input-group-outline">
                            <input type="date" name="tgl" id="tgl" value="<?= date('Y-m-d') ?>" class="form-control">
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
<!-- Modal -->
<div class="modal fade" id="modalStok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-0 shadow-none position-relative ">
        <div class="modal-content rounded-1 shadow-none border-0">
            <div class="modal-header p-0 py-1 px-3">
                <p class="modal-title fw-bolder mt-2">Pilih Produk</p>
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-1 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-borderles table-sm table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Kode Produk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Nama Produk</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Satuan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Harga</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Stok</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_produk as $produk) : ?>
                            <tr>
                                <td>
                                    <p class="text-sm mb-0 mx-2 fw-bold "><?= $produk['kode_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 mx-2"><?= $produk['nama_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['nama_satuan'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 text-end">Rp. <?= number_format($produk['harga']) ?> </p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['stok'] ?></p>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm rounded-2 mb-0 btn-warning" name="submit" id="select" data-id_produk="<?= $produk['id_produk'] ?>" data-kode_produk="<?= $produk['kode_produk'] ?>" data-nama_produk="<?= $produk['nama_produk'] ?>" data-nama_satuan="<?= $produk['nama_satuan'] ?>" data-stok="<?= $produk['stok'] ?>"> Pilih</button>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(function() {
        $(document).on('click', '#select', function() {

            // ambil data dari button
            const id_produk = $(this).data('id_produk');
            const kode_produk = $(this).data('kode_produk');
            const nama_produk = $(this).data('nama_produk');
            const nama_satuan = $(this).data('nama_satuan');
            const stok = $(this).data('stok');

            // set nilai disetiap inputan
            $('#id_produk').val(id_produk);
            $('#kode_produk').val(kode_produk);
            $('#nama_produk').val(nama_produk);
            $('#nama_satuan').val(nama_satuan);
            $('#stok').val(stok);
            $('#modalStok').modal('hide');
        })

    })
</script>
<!-- Modal -->
<?= $this->endSection(); ?>