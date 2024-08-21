<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        my-pos
    </title>

    <!-- my CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="/assets/fontawesome/fontawesome-1/css/all.min.css" rel="stylesheet" />
    <link href="/assets/fontawesome/fontawesome-2/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <!-- animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg shadow-none  border-radius-xl top-0 z-index-3 position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
                            <i class="fa-solid fa-store"></i>
                            Point Of Sale
                        </a>
                        <button class="navbar-toggler shadow-none ms-2 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navigation">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link me-3 <?= ($auth_title) == 'Beranda' ? 'fw-bold' : '' ?> " href="/">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-4 <?= ($auth_title == 'Tentang') ? 'fw-bold' : '' ?> " href="/front/tentang">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-3  <?= ($auth_title == 'Login') ? 'fw-bold' : '' ?> " href="/auth">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-3  <?= ($auth_title == 'Register') ? 'fw-bold' : '' ?> " href="/auth/register"> Register</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link me-3 bg-success text-white rounded p-1 mt-1" href="https://wa.me/6282239659774" target="_blank">
                                        <i class="fab fa-whatsapp text-white me-1"></i>
                                        Whatsapp
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <?= $this->renderSection('auth-main'); ?>
    </main>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script>
        // get flash
        const flash_4 = $('#flash_4').data('flash_4');
        const flash_6 = $('#flash_6').data('flash_6');
        const flash_7 = $('#flash_7').data('flash_7');


        // popup flash Auth.
        if (flash_4) {

            Swal.fire({
                icon: "error",
                text: flash_4,
                showConfirmButton: false,
                timer: 5000,
                customClass: {
                    popup: 'custom-swal-popup',
                    icon: 'custom-icon',
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek flashdata berhasil login
            <?php if (session()->getFlashdata('flash_6')) : ?>
                Swal.fire({
                    icon: 'success',
                    text: 'Sampai jumpa lagi',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: `
                    animate__animated
                    animate__fadeInDown
                    animate__faster
                 `
                    },
                    hideClass: {
                        popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                        `
                    },
                    customClass: {
                        popup: 'welcome-popup',
                        icon: 'custom-icon',
                    },


                });
            <?php endif; ?>

            // popup flash validasi
            <?php if (session()->getFlashdata('flash_7')) : ?>
                Swal.fire({
                    icon: "warning",
                    text: '<?= session()->getFlashdata('flash_7'); ?>',
                    showConfirmButton: false,
                    timer: 5000,
                    width: 250,
                    customClass: {
                        popup: 'custom-swal-popup',
                        icon: 'custom-icon',
                    }
                });
            <?php endif ?>
        });
    </script>
</body>

</html>