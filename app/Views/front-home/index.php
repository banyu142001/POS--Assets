<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>

<main class="main-content">
    <div class="section min-vh-85 position-relative transform-scale-md-8 mt-5">
        <div class="row g-5 align-items-center m-1">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="mb-4 animated slideInDown">
                    <i class="fa-solid fa-store fa-2x"></i> Point Of Sale Management App To Manage Your Business.
                </h1>
                <h5 class="pb-3 animated slideInDown">
                    Yuk ! Optimalkan Pengelolaan usaha Toko Anda dengan Aplikasi Point Of Sale. Pilih Kemudahan dan Efisiensi dengan Aplikasi POS Terbaik.
                </h5>
                <footer>
                    <small>&copy; 2024 <a href="" <?= text_info ?>>Bayu Gurium</a>. All rights reserved.</small><br>
                </footer>
            </div>
            <div class="col-lg-6 text-center text-lg-start position-relative ">
                <img class="img-fluid rounded animated zoomIn shadow-lg" src="/assets/img/heero-2.png" alt="" />
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>