<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">

        <!-- alert sistem -->
        <div id="flash" data-flash="<?= session()->getFlashdata('flash') ?>"></div>
        <?php if (session()->get('level') == 1) : ?>
            <div class="col my-auto">
                <a href="/testimoni" class="mb-0 float-end mx-5 text-info"><i class="fa-solid fa-arrow-right fs-5"></i></a>
            </div>
        <?php endif ?>
        <div class="row mt-2 justify-content-center">
            <div class="col-lg-10">
                <small class="m-0 text-muted" style="font-size: 12px;">Berikan ulasan, saran atau pengalaman anda saat menggunakan aplikasi point of sale (myPOs).</small>
                <p>Halo <strong><?= session()->get('nama') ?> </strong> <br> Bantu kami dengan berikan ulasan dan pengalaman anda saat menggunakan Aplikasi myPos. Dengan itu kami dapat memperbaiki dan memperbarui sistem sesuai dengan ulasan anda. </p>
                <div class="row g-0">
                    <div class="col-lg-9 col-lg">
                        <form action="/testimoni/save" method="post">
                            <small class="m-0 text-muted" style="font-size: 12px;">Lengkapilah beberapa pertanyaan dibawah ini</small>
                            <p class="mt-2 m-0">1.Bagaimana performa dari sistem saat anda menggunakannya ?</p>
                            <textarea name="performa" cols="30" rows="2" id="performa" class="form-control form-control-sm border w-lg-75 w-100 <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Berikan ulasan.."></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('performa') ?>
                            </div>

                            <p class="mt-2 m-0">2. Bgaimana tanggapan anda mengenai Desain/UI/UX dari sistem ?</p>
                            <textarea name="desain" id="desain" class="form-control form-control-sm border w-lg-75 w-100  <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Berikan ulasan tetang desain"></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('desain') ?>
                            </div>


                            <p class="mt-2 m-0">3. Berikan tanggapan anda tentang sitem</p>
                            <textarea name="ulasan" cols="30" rows="3" id="ulasan" class="form-control form-control-sm border w-lg-75 w-100 <?= (validation_errors()) ? 'is-invalid' : '' ?> " placeholder="Berikan ulasan tentang sistem"></textarea>
                            <div class="invalid-feedback">
                                <?= validation_show_error('ulasan') ?>
                            </div>


                            <button class="btn btn-sm btn-success rounded-1 my-2">Kirim ulasan</button>
                            <form action="">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>