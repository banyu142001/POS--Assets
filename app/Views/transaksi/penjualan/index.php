<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-lg">
            <div class="card px-2 py-1 shadow-none rounded-1 border-0 mt-4">
                <table class="table table-sm table-borderless my-0">
                    <tr>
                        <th class="fw-normal">Tanggal</th>
                        <td>
                            <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" class="form-control border border-light form-control-sm">
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-normal">Kasir</th>
                        <td>
                            <span class="text-xs"><?= session()->get('nama') ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-normal">Customer</th>
                        <td>
                            <select name="id_customer" id="id_customer" class="form-select border border-light form-select-sm px-2">
                                <option value="">Umum</option>
                                <?php foreach ($data_customer as $data) : ?>
                                    <option value="<?= $data['id_customer'] ?>"><?= $data['nama_customer'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-lg-4 col-lg">
            <div class="card px-2 py-1 shadow-none rounded-1 border-0 mt-4">
                <table class="table table-sm table-borderless my-0">
                    <tr>
                        <th class="fw-normal">Produk</th>
                        <td>
                            <div class="input-group">
                                <input type="hidden" id="id_produk">
                                <input type="hidden" id="harga">
                                <input type="hidden" id="stok">
                                <input type="hidden" id="qty_cart">
                                <input type="text" class="form-control form-control-sm fw-bold border" name="kode_produk" id="kode_produk" placeholder="Pilih produk">
                                <button type="button" class="btn btn-sm input-group-text" <?= btn_success_style ?> data-bs-toggle="modal" data-bs-target="#modalCart"><i class="fas fa-search text-white mx-3 align-items-center d-flex" style="font-size: 17px; margin-top: -3px;"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-normal">Jumlah</th>
                        <td class="my-0">
                            <input type="number" name="qty" id="qty" class="form-control border  border-light form-control-sm my-0" value="1">
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-normal"></th>
                        <td>
                            <button type="button" id="cart" class="btn text-white my-0 rounded-1" <?= btn_cart_warning ?>>
                                <i class="fas fa-cart-plus" style="font-size: 14px;"></i> Tambah
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-lg-5 col-lg">
            <div class="card px-2 py-1 shadow-none rounded-1 border-0  border-bottom border-2 border-primary  mt-4">
                <table class="table table-sm table-borderless my-0">
                    <tr>
                        <th class="fw-normal"></th>
                        <td>
                            <span class="float-end mx-2">Invoice <strong><?= $invoice ?></strong></span>
                        </td>
                    </tr>
                </table>
                <div class="row mb-2">
                    <div class="col-lg">
                        <div class="box border px-1" style="background-color: #FFFF;">
                            <h1 class="text-end" id="grand_total2">0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card px-0 py-1 rounded-1 border-0 mt-2">
        <div class="row mx-1">
            <div class="col-lg-7 col-lg table-responsive">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th class="fw-normal p-2" style="font-size: 14px;">Produk</th>
                            <th class="fw-normal p-2" style="font-size: 14px;">Nama Produk</th>
                            <th class="fw-normal p-2" style="font-size: 14px;">Harga</th>
                            <th class="fw-normal p-2" style="font-size: 14px;">Jumlah</th>
                            <th class="fw-normal p-2" style="font-size: 14px;">Diskon</th>
                            <th class="fw-normal p-2" style="font-size: 14px;">Total</th>
                            <th class="fw-normal p-2" style="font-size: 14px;"></th>
                        </tr>
                    </thead>
                    <tbody id="tb_cart">
                        <?= $this->include('transaksi/penjualan/data_cart'); ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-5 col-lg">
                <div class="row mt-3 justify-content-center">
                    <div class="col-3">
                        <span class="text-xs">Sub Total</span>
                    </div>
                    <div class="col-7">
                        <input type="number" name="sub_total" id="sub_total" class="form-control border border-light form-control-sm fw-bold" readonly>
                    </div>
                </div>
                <div class="row my-1 justify-content-center">
                    <div class="col-3">
                        <span class="text-xs">Diskon</span>
                    </div>
                    <div class="col-7">
                        <input type="number" value="0" name="diskon_penjualan" id="diskon_penjualan" class="form-control border border-light form-control-sm">
                    </div>
                </div>
                <div class="row my-1 justify-content-center">
                    <div class="col-3">
                        <span class="text-xs">Grand Total</span>
                    </div>
                    <div class="col-7">
                        <input type="number" value="0" name="grand_total" id="grand_total" class="form-control border border-light form-control-sm fw-bold" readonly>
                    </div>
                </div>
                <form action="">
                    <div class="row my-1 justify-content-center">
                        <div class="col-3">
                            <span class="text-xs">Cash</span>
                        </div>
                        <div class="col-7">
                            <input type="number" value="0" name="cash" id="cash" class="form-control border border-light form-control-sm">
                        </div>
                    </div>
                    <div class="row my-1 justify-content-center">
                        <div class="col-3">
                            <span class="text-xs">Kembalian</span>
                        </div>
                        <div class="col-7">
                            <input type="number" value="0" name="kembalian" id="kembalian" class="form-control border border-light form-control-sm">
                        </div>
                    </div>
                    <div class="row my-1 justify-content-center">
                        <div class="col-3">
                            <span class="text-xs">Nota</span>
                        </div>
                        <div class="col-7">
                            <textarea name="nota" id="nota" class="form-control form-control-sm border" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row my-1 justify-content-center">
                        <div class="col-lg-3 col-lg">
                            <button class="btn btn-sm btn-outline-info mt-2 rounded-2" name="submit" type="reset">Clear</button>
                        </div>
                        <div class="col-lg-7 col-lg">
                            <button class="btn w-100 mt-2 rounded-2 text-white" id="simpan_transaksi" <?= btn_success ?>>Simpan Transaksi </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal cart -->
    <?= $this->include('transaksi/penjualan/form'); ?>
</div>

<?= $this->endSection(); ?>