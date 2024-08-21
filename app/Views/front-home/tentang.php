<?= $this->extend('layout/auth-layout/auth-login') ?>

<?= $this->section('auth-main'); ?>

<main class="main-content">
    <div class="section min-vh-85 position-relative transform-scale-md-9 px-2 ">
        <div class="row justify-content-center mx-1 mt-lg-0 mt-5">
            <div class="col-lg-7 bg-white text-lg-start py-2 mx-3 mt-lg-0 mt-4 mb-4 border-top border-2 border-success">
                <section id="1">
                    <h3 class="mb-2 mt-2 animated">Point Of Sale <span class="badge bg-success text-capitalize" style="font-size: 14px;">myPos versi 1</span></h3>
                    <h5>Optimalkan Pengelolaan usaha Toko Anda dengan Aplikasi Point Of Sale. Pilih Kemudahan dan Efisiensi dengan Aplikasi POS Terbaik.</h5>
                    <p>Aplikasi Manajemen Point of Sale (POS) ini dirancang untuk membantu pemilik usaha dalam mengelola bisnis mereka dengan lebih efektif dan efisien. Aplikasi ini dilengkapi dengan berbagai fitur yang memungkinkan pengguna untuk mengelola data produk, transaksi penjualan, serta persediaan barang dengan mudah.</p>
                    <h6>1. Fitur-fitur utama myPos</h6>
                    <p class="me-1"><b class="d-block"> - Pengelolaan Data Master</b>
                        Di dalam aplikasi POS dapat mengelola data master seperti, data Produk, data Kategori dan data Satuan. POS dapat melakukan tambah, melihat, update dan hapus data atau CRUD (Create, Read, Update dan Delete) sesuai filed yang dibutuhkan oleh setiap data. Pengelolaan data lainnya seperti CRUD data Supplier dengan data yang dibutuhkan, CRUD data Customer dengan data yang dibutuhkan.
                    </p>
                    <p> <b class="d-block"> - Transaksi Penjualan</b>
                        POS juga menawarkan fitur yang sangat penting yaitu transaksi penjualan barang/produk dari toko anda. Karena fitur ini memungkinkan pengguna dapat melakukan transaksi penjualan produk kepada pelanggan denga mudah dan cepat. Pengguna dapat memilih produk menentukan jumlah yang dijual, menentukan diskon produk/penjualan dan menghasilkan struk penjualan serta mencatat setiap transaksi penjualan untuk keperluan dan analisis.
                    </p>
                </section>

                <h6>2. Manfaat Pengguna</h6>
                <p>Penggunaan POS memiliki manfaat yang signifikan bagi bisnis antara lain : </p>
                <p><b> a. Manajemen Inventaris:</b> POS memungkinkan pemantauan real-time terhadap stok barang, membantu bisnis untuk mengelola persediaan dengan lebih efisien dan menghindari kekurangan atau kelebihan stok.</p>

                <p><b> b. Peningkatan Efisiensi :</b> Dengan otomatisasi proses transaksi, POS mengurangi waktu yang dibutuhkan untuk setiap transaksi, memungkinkan karyawan untuk fokus pada pelayanan pelanggan atau kegiatan yang lebih strategis.</p>

                <p><b> c. Analisis Penjualan: </b>3.Data yang terkumpul melalui POS dapat digunakan untuk menganalisis tren penjualan, preferensi pelanggan, dan performa produk. Hal ini memungkinkan bisnis untuk mengidentifikasi peluang pasar baru dan merancang strategi pemasaran yang lebih efektif Dll.</p>

                <h6>3. Teknologi yang Digunakan dalam Aplikasi Point Of Sale (POS)</h6>
                <p><b class="d-block"> 1. Codeigniter 4 </b>CodeIgniter 4 adalah kerangka kerja PHP yang ringan dan mudah digunakan untuk membangun aplikasi web. Beberapa kelebihan CodeIgniter 4 yang mendukung pengembangan aplikasi meliputi: Kecepatan dan Kinerja,Struktur MVC: Menggunakan arsitektur Model-View-Controller (MVC) yang membantu memisahkan logika aplikasi, tampilan, dan kontroler sehingga kode lebih terstruktur dan mudah dikelola <a href="https://www.codeigniter.com/" target="_blank" class="text-info">codeigniter 4. </a></p>

                <p><b class="d-block"> 2. Bootstrap v5 </b>Bootstrap adalah framework front-end yang digunakan untuk membuat antarmuka pengguna yang responsif dan modern. Desain Responsif: Memungkinkan aplikasi POS Anda untuk tampil dengan baik di berbagai perangkat, mulai dari desktop hingga ponsel. Komponen UI: Menyediakan berbagai komponen UI siap pakai seperti tombol, form, modal, dan navigasi yang mempercepat proses pengembangan.<a href="https://getbootstrap.com/" target="_blank" class="text-info">get bootsrap. </a></p>

                <p><b class="d-block"> 3. Javascript dan JQUERY </b>JavaScript dan jQuery digunakan untuk meningkatkan interaktivitas dan responsivitas aplikasi POS Anda. Keduanya memungkinkan Anda untuk Manipulasi DOM: Mengubah elemen halaman web secara dinamis tanpa perlu memuat ulang halaman. Event Handling: Mengelola dan merespons berbagai tindakan pengguna, seperti klik tombol atau input formulir.AJAX: Mengambil data secara asinkron dari server untuk memperbarui konten halaman tanpa perlu memuat ulang seluruh halaman.</p>

                <p><b class="d-block"> 4. MYSQL </b>MySQL adalah sistem manajemen basis data relasional (RDBMS) yang digunakan untuk menyimpan dan mengelola data aplikasi POS Anda. Keuntungan menggunakan MySQL meliputi Kinerja Tinggi: MySQL dikenal dengan kinerja tinggi dan kemampuan untuk menangani basis data berukuran besar.Keandalan dan Skalabilitas: Menyediakan fitur untuk replikasi dan skalabilitas yang baik untuk menangani pertumbuhan data.Kompatibilitas: Mudah diintegrasikan dengan berbagai bahasa pemrograman dan platform.</p>

                <p><b class="d-block"> 5. HTML & CSSS </b>HTML dan CSS adalah dasar dari semua halaman web, digunakan untuk membangun struktur dan tampilan aplikasi POS Anda: Digunakan untuk membuat struktur halaman web, seperti form input, tabel, dan elemen lainnya.CSS: Digunakan untuk mengatur tampilan dan gaya elemen HTML, termasuk warna, font, layout, dan animasi. </p>

                <p><b class="d-block"> 6. SweetAlert v2 </b>SweetAlert adalah plugin JavaScript yang digunakan untuk membuat pop-up dan dialog yang menarik dan interaktif. Dalam aplikasi POS Anda, SweetAlert digunakan untuk konfirmasi penghapusan data dan notifikasi lainnya. </p>


                <h6 class="text-lg-start text-center">Pengembang Aplikasi POS - (myPOS)</h6>
                <div class="card rounded-0 border-0 border-top border-2 border-success p-2 my-2">
                    <div class="row mb-2">
                        <div class="col-lg-4 text-lg-center text-center">
                            <img src="/assets/img/bayu.jpg" alt="bayu" class="rounded" width="100">
                            <h5 class="m-0 mt-1">BAYU GURIUM</h5>
                            <small class="d-block">Sistem Informasi 2020</small>
                        </div>
                        <div class="col-lg-4 text-lg-center text-center">
                            <p class="m-0 mt-3">INSTITUT TEKNOLOGI DAN BISNIS STIKOM AMBON</p>
                            <small>Alamat: Jl. A. Y. Patty, Kel Honipopu, Kec. Sirimau, Kota Ambon, Maluku</small>
                        </div>
                    </div>
                </div>

                <p>Hallo, nama saya BAYU GURIUM saya adalah mahasiswa tingkat akhir pada ITB-Stikom Ambon dengan program Study (S1 - Sistem Informasi) 2020. sedikit cerita, setelah saya mulai berkuliah di ITB Stikom Ambon pada semester awal kami belajar tentang pemrograman, saya mulai tertarik untuk mempelajarinya lebih khususnya <b>Web Developer</b> mulai dari mempelajari HTML, CSS, JS dan PHP hingga pada Framework PHP yaitu Codeigniter 4 dan Laravel.</p>
                <p>Sistem Informasi Point Of Sale atau aplikasi POS ini adalah projek akhir saya yang dirancang dan kembangkan sebagai syarat ujian akhir pada perguruan tinggi <a href="" class="text-info">ITB STIKOM AMBON</a>. Aplikasi ini saya kembangkan dengan salah satu framewok dari PHP yaitu Codeigniter lebih spesifiknya Codeigniter versi 4 dan library-library pihak ketiga sebagai pendukung. Alasan kenapa saya menggunakan framework codeigniter sebagai tools utama dalam pengembangan aplikasi ini karena CodeIgniter adalah kerangka kerja PHP yang ringan dan mudah digunakan untuk membangun aplikasi web dan juga menggunakan petern MVC (Model, View, Controller) yang membuat pengembang lebih mudah untuk mengelolan Route dari aplikasi.</p>
                <small class="text-muted"><i> Aplikasi ini akan terus dikembangkan karena masih banyak fitur-fitur lainnya yang ingin ditambahkan pada aplikasi POS ini.</i></small>

            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>