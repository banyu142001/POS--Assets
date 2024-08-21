<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_warning ?>>
                    <!-- <i class="fas fa-folder-plus text-white fs-4  "></i> -->
                    <i class="fas fa-flag text-white fs-4"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Laporan Penjualan
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
        </div>

        <!-- alert sistem -->
        <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>

        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Invoice
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8">
                            Tanggal
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Customer
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Total
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Diskon
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Grand Total
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-8 ps-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_penjualan as $penjualan) : ?>
                        <tr>
                            <td>
                                <p class="mb-0 text-sm"><?= $penjualan['invoice'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= indo_date($penjualan['tanggal']) ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= ($penjualan['id_customer'] == 0 ? 'Umum' : $penjualan['nama_customer']) ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm">Rp<?= number_format($penjualan['total_harga'], 0, ',', '.') ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm text-center"><?= $penjualan['diskon'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm">Rp<?= number_format($penjualan['harga_bayar'], 0, ',', '.') ?></p>
                            </td>
                            <td class="align-middle text-center p-1" style="font-size:10px;">
                                <div class="btn-toolbar my-0" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group my-0" role="group" aria-label="First group">

                                        <a href="/penjualan/cetak/<?= $penjualan['id_penjualan'] ?>" class="btn btn-sm p-0 px-2  rounded-1 mx-1 cursor-pointer my-0 border hover " <?= text_info ?> target="_blank">
                                            <div class="fas fa-print"></div>
                                        </a>

                                        <a id="detail" class="btn btn-sm p-0 px-2  rounded-1 mx-1 cursor-pointer my-0 border hover " <?= text_success ?> data-bs-toggle="modal" data-bs-target="#detailModal" data-invoice="<?= $penjualan['invoice'] ?>" data-tanggal="<?= indo_date($penjualan['tanggal']) ?>" data-waktu=" <?= date('H:i', strtotime($penjualan['created_at'])) ?>" data-total_harga=" <?= number_format($penjualan['total_harga']) ?>" data-diskon="<?= number_format($penjualan['diskon']) ?>" data-harga_bayar=" <?= number_format($penjualan['harga_bayar']) ?>" data-cash=" <?= number_format($penjualan['cash']) ?>" data-kembalian=" <?= number_format($penjualan['kembalian']) ?>" data-nota=" <?= $penjualan['nota'] ?>" data-customer=" <?= ($penjualan['id_customer'] == 0) ? 'Umum' : $penjualan['nama_customer'] ?>" data-id_penjualan="<?= $penjualan['id_penjualan'] ?>">
                                            <div class=" far fa-edit">
                                            </div>
                                        </a>

                                        <a href="/laporan/delete/<?= $penjualan['id_penjualan'] ?>" class="btn btn-sm  p-0 px-2 rounded-1 cursor-pointer my-0 border" class=" text-xs " <?= text_danger ?> id="btn-hapus">
                                            <div class=" fas fa-trash"></div>
                                        </a>
                                    </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-lg-4 text-end">
                <h5>Total : Rp. <?= number_format($total_penjualan, 2)  ?> </h5>
            </div>
        </div>
    </div>

</div>




<!-- Modal detail laporan penjualan -->

<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg border-0 shadow-none position-relative ">
        <div class="modal-content rounded-1 shadow-none border-0">
            <div class="modal-header p-0 py-1 px-3">
                <p class="modal-title fw-bolder mt-2">Detail Laporan Penjualan</p>
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-2 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
            </div>
            <div class="modal-body table-responsive">

                <div class="row">
                    <div class="col-lg-6 border-bottom mb-2">
                        <table class="table table-borderless">
                            <tr>
                                <th>Invoice</th>
                                <td style="font-size: 14px;">: <span id="invoice"></span> </td>
                            </tr>
                            <tr>
                                <th>Tanggal/Waktu</th>
                                <td style=" font-size: 14px;">: <span id="tgl_waktu"></span> : <span id="waktu"></span> </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td style="font-size: 14px;">: Rp<span id="total_harga"></span></td>
                            </tr>
                            <tr>
                                <th>Diskon</th>
                                <td style="font-size: 14px;">: Rp <span id="diskon"></span></td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td style="font-size: 14px;">: Rp<span id="harga_bayar"></span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- col 2 -->
                    <div class="col-lg-6 border-bottom mb-2">
                        <table class="table table-borderless">
                            <tr>
                                <th>Customer</th>
                                <td style="font-size: 14px;">: <span id="customer"></span></td>
                            </tr>
                            <tr>
                                <th>Kasir</th>
                                <td style="font-size: 14px;">: <?= session()->get('nama') ?></td>
                            </tr>
                            <tr>
                                <th>Cash</th>
                                <td style="font-size: 14px;">: Rp <span id="cash"></span></td>
                            </tr>
                            <tr>
                                <th>Kembalian</th>
                                <td style="font-size: 14px;">: Rp <span id="kembalian"></span></td>
                            </tr>
                            <tr>
                                <th>Nota</th>
                                <td style="font-size: 14px;">: <span id="nota"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg">
                        <span id="produk"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</div>

<script>
    $(document).ready(function() {
        // Event listener untuk klik tombol detail
        $(document).on('click', '#detail', function() {

            // Ambil data-data penjaualan dari tombol yang diklik
            let kode_invoice = $(this).data("invoice")
            let tanggal = $(this).data("tanggal")
            let waktu = $(this).data("waktu")
            let total_harga = $(this).data("total_harga")
            let diskon = $(this).data("diskon")
            let harga_bayar = $(this).data("harga_bayar")
            let customer = $(this).data("customer")
            let cash = $(this).data("cash")
            let kembalian = $(this).data("kembalian")
            let nota = $(this).data("nota")
            let id_penjualan = $(this).data("id_penjualan")

            // Set nilai ke elemen berdasarkan (id) di dalam modal
            $("#invoice").text(kode_invoice)
            $("#tgl_waktu").text(tanggal) + '' + $("#waktu").text(waktu)
            $("#total_harga").text(total_harga)
            $("#diskon").text(diskon)
            $("#harga_bayar").text(harga_bayar)
            $("#customer").text(customer)
            $("#cash").text(cash)
            $("#kembalian").text(kembalian)
            $("#nota").text(nota)

            let produk = `<table class="table table-borderless table-sm">
                            <thead>
                                <tr>
                                    <th style="font-size: 15px;" class="text-center p-0" >Nama Produk</th>
                                    <th style="font-size: 15px;" class="text-center p-0" >Harga</th>
                                    <th style="font-size: 15px;" class="text-center p-0" >Jumlah</th>
                                    <th style="font-size: 15px;" class="text-center p-0" >Diskon</th>
                                    <th style="font-size: 15px;" class="text-center p-0">Total</th>
                                 </tr>
                            </thead>`

            $.getJSON('<?= base_url('/laporan/detail_penjualan/') ?>' + $(this).data('id_penjualan'), function(data) {
                $.each(data, function(key, val) {

                    produk += `<tbody>
                                 <tr>
                                    <td style="font-size: 14px;" class="text-center">` + val.nama_produk + `</td>
                                    <td style="font-size: 14px;" class="text-center" >Rp ` + parseInt(val.harga) + `</td>
                                    <td style="font-size: 14px;" class="text-center" >` + val.qty_detail + `</td>
                                    <td style="font-size: 14px;" class="text-center" >Rp ` + val.diskon_detail + `</td>
                                    <td style="font-size: 14px;" class="text-center" >Rp ` + val.total_detail + `</td>
                                 </tr>
                                </tbody>
                                `

                })

                produk += '</table>'
                $('#produk').html(produk)
            })
        });
    });
</script>

<?= $this->endSection(); ?>