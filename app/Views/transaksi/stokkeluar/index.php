<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_info ?>>
                    <i class="fas fa-share-square tex-white fs-4"></i>
                </div>
            </div>
            <div class="col-auto col-6 my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Data Stok Keluar
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col-lg my-auto">
                <a href="/stokkeluar/create" class="mx-3 mt-lg-2 mt-2 text-info mb-0 float-lg-end float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
            </div>
        </div>

        <!-- alert sistem -->
        <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>


        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8">
                            Kode Produk
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Nama Produk
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Supplier
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Jumlah / QTY
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Tanggal data Keluar
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-8 ps-2"> <i class="fa-solid fa-file-pen"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_stok_keluar as $stok) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <p class="mb-0 mx-2 text-sm"><?= $stok['kode_produk'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $stok['nama_produk'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= $stok['nama_supplier'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $stok['qty'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= indo_date($stok['tanggal']) ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="" class="text-xs" <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalDetail<?= $stok['id_stok_keluar'] ?>">
                                    <i class="fas fa-eye mx-1"></i> Detail
                                </a>
                                <a href="/stokkeluar/delete/<?= $stok['id_stok_keluar'] . '/' . $stok['id_produk']  ?>" class="text-xs" <?= text_danger ?> id="btn-hapus">
                                    <i class="fas fa-trash mx-1"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<?php foreach ($data_stok_keluar as $stok) : ?>
    <div class="modal fade" id="modalDetail<?= $stok['id_stok_keluar'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm  position-relative">
            <div class="modal-content border-0 rounded-1">
                <div class="modal-header p-2">
                    <p class="modal-title fs-5 mx-2" id="staticBackdropLabel"> Detail Data </p>
                    <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-3 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-borderless">
                        <tr class="mb-0">
                            <td class="fw-bold">Tanggal Stok</td>
                            <td class="fw-lighter">: <?= indo_date($stok['tanggal']) ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kode Produk</td>
                            <td class="fw-lighter">: <?= $stok['kode_produk'] ?> </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nama Produk</td>
                            <td class="fw-lighter">: <?= $stok['nama_produk'] ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Supplier</td>
                            <td class="fw-lighter">: <?= $stok['nama_supplier'] ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Qty / Jumlah</td>
                            <td class="fw-lighter">: <?= $stok['qty'] ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Detail</td>
                            <td class="fw-lighter">: <?= $stok['detail'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>
<?= $this->endSection(); ?>