<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<?php $level = session()->get('level') ?>
<div class="container-fluid py-2">
    <div class="section min-vh-85 position-relative  transform-scale-md-9 ">
        <div class="row">
            <div class="<?= ($level == 1) ? 'col-xl-3' : 'col-xl-4' ?> col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape shadow-info  text-center border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_info ?>>
                            <i class="fab fa-product-hunt opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Data Produk</p>
                            <h4 class="mb-0"> <?= $produk ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <div class="row">
                            <div class="col-6">
                                <p class="my-0 text-end"><i class="fas fa-boxes" <?= text_success ?>></i> <span class="fw-bold"><?= $satuan ?></span> </p>
                            </div>
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-box-open" <?= text_success ?>></i> <span class="fw-bold"><?= $kategori ?></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= ($level == 1) ? 'col-xl-3' : 'col-xl-4' ?> col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape text-center shadow-warning border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_warning ?>>
                            <i class="fas fa-money-bill-wave opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Data Penjualan</p>
                            <h4 class="mb-0"><?= $penjualan ?> | <?= $penjualan_detail ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <div class="row justify-content-end g-0">
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-download" <?= text_success ?>></i> <span class="fw-bold  text-end"><?= $stok_masuk ?></span> </p>
                            </div>
                            <div class="col-6">
                                <p class="my-0 text-end"> <i class="fas fa-file-export text-danger"></i> <span class="fw-bold"><?= $stok_keluar ?></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($level == 1) : ?>
                <div class="<?= ($level == 1) ? 'col-xl-3' : 'col-xl-4' ?> col-sm-6 mb-xl-0 mb-4">
                    <div class="card rounded-2">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape text-center shadow-success border-radius-xl mt-n4 position-absolute rounded-2" <?= bg_success ?>>
                                <i class="fas fa-users opacity-10"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Data User</p>
                                <h4 class="mb-0"><?= $user ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 px-3">
                            <div class="row justify-content-end g-0">
                                <div class="col-6">
                                    <p class="my-0 text-end d-inline-block"> <i class="fa-solid fa-users-line" <?= text_success ?>></i> <span class="fw-bold">0</span> </p> |
                                    <p class="my-0 text-end d-inline-block"> <i class="fa-solid fa-truck-arrow-right" <?= text_success ?>></i> <span class="fw-bold">0</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="<?= ($level == 1) ? 'col-xl-3' : 'col-xl-4' ?> col-sm-6 mb-xl-0 mb-4">
                <div class="card rounded-2">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute p-1" style="background-image: url('assets/img/profile-user/<?= session()->get('foto') ?>'); background-position: center; background-size: cover;">
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm text-success font-weight-bolder mb-0 text-capitalize"><?= (session()->get('level') == 1) ? 'Admin' : 'Kasir' ?></p>
                            <h4 class="mb-0 text-capitalize"><?= session()->get('nama') ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 px-3">
                        <p class="mb-0"><?= session()->get('email') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <?php if ($level == 1) : ?>
                <div class="col-lg-6 col-lg">
                    <h4 class="mb-4 animated slideInDown">
                        <i class="fa-solid fa-store fa-2x"></i> Point Of Sale Management App
                    </h4>
                    <p class="mx-3 ">Aplikasi POS kami tidak hanya menyederhanakan transaksi penjualan, tetapi juga meningkatkan interaksi dengan pelanggan melalui manajemen data pelanggan yang terintegrasi. Dengan fokus pada pengalaman pengguna yang unggul, kami memberikan alat yang diperlukan untuk memahami preferensi pelanggan dan meningkatkan loyalitas mereka. </p>
                </div>
            <?php endif ?>
            <div class="<?= ($level == 1) ? 'col-lg-6' : 'col-lg-8' ?> col-md-6 mt-4 mb-4">
                <div class="card z-index-2 rounded-2">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="<?= ($level == 1) ? 'bg-gradient-info' : 'bg-gradient-success' ?> rounded-2 shadow-success border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Laporan Penjualan</h6>
                        <p class="text-sm ">Report produk terlaris</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($level != 1) : ?>
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 rounded-2 p-2 my-2" style="background: #B2FEFA;  
                        background: -webkit-linear-gradient(to right, #0ED2F7, #B2FEFA);  
                        background: linear-gradient(to right, #0ED2F7, #B2FEFA);
                        ">
                        <small>Total Penjualan hari ini </small>
                        <div class="card-body p-0 py-1 px-2">
                            <h4>Rp. <?= number_format($total_sale_today, 2) ?></h4>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <footer class="footer py-4  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        <footer>
                            <small>&copy; 2024 <a href="" <?= text_info ?>>Bayu Gurium</a>. All rights reserved.</small><br>
                        </footer>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var produkTerlaris = <?php echo json_encode($produk_terlaris); ?>;
    var labels = produkTerlaris.map(function(produk) {
        return produk.nama_produk;
    });
    var data = produkTerlaris.map(function(produk) {
        return produk.total_jumlah;
    });

    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Jumlah Terjual",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: data,
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>


<?= $this->endSection();
