<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <!-- image  -->
    <div class="page-header min-height-150 border-radius-xl rounded-2 mt-2">
        <span class=" mask bg-gradient-primary opacity-2"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 rounded-2 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_danger ?>>
                    <i class="fa-solid fa-users-line text-white fs-4"></i>
                </div>
            </div>
            <div class="col-lg-auto col-6 my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Data Customer
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
            <div class="col-lg my-auto">
                <a href="/customer/create" class="mx-3 mt-lg-2 mt-3 text-info mb-0 float-lg-end float-end fw-lighter font-italic opacity-5"> <i class="fa fa-plus"></i> Tambah data</a>
            </div>
        </div>

        <!-- alert sistem -->
        <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>


        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="myTable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">
                            Nama Customer
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Nomor Telephone
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Jenis Kelamin
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7 ps-2">
                            Alamat
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-7 ps-2"> <i class="fa-solid fa-file-pen"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div>
                                        <i class="fa-solid fa-user-tag text-primary mx-2"></i>
                                    </div>
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?= $customer['nama_customer'] ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $customer['no_telephone'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $customer['jenis_kelamin'] ?></p>
                            </td>
                            <td>
                                <p class="text-sm mb-0"><?= $customer['alamat'] ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="/customer/edit/<?= $customer['id_customer'] ?>" class="text-xs" <?= text_success ?>>
                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                </a>
                                <a href="/customer/delete/<?= $customer['id_customer'] ?>" class="text-xs" <?= text_danger ?> id="btn-hapus">
                                    <i class="material-icons text-sm mx-1">delete</i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>