</main>

<!-- footer -->
<div class="fixed-plugin">
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>

<!-- data table -->

<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/DataTables/datatables.min.css"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugins -->
<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="/assets/js/demo/datatables-demo.js"></script>


<!--   Core JS Files   -->
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>

<!-- Sweet alert -->
<script>
    const flash = $('#flash').data('flash');
    const flash_2 = $('#flash_2').data('flash_2');
    const flash_3 = $('#flash_3').data('flash_3');
    const flash_4 = $('#flash_4').data('flash_4');
    const flash_password = $('#flash_password').data('flash_password');


    // alert CRUD sistem
    if (flash) {

        Swal.fire({
            icon: "success",
            text: flash,
            showConfirmButton: false,
            timer: 4500,
            width: '400px',
            customClass: {
                icon: 'custom-icon',
            }

        });
    }

    if (flash_2) {

        Swal.fire({
            icon: "warning",
            text: flash_2,
            showConfirmButton: false,
            timer: 5000,
            customClass: {
                icon: 'custom-icon'
            }
        });
    }

    // popup flash kategori & satuan
    if (flash_3) {

        Swal.fire({
            icon: "warning",
            text: flash_3,
            showConfirmButton: false,
            timer: 5000,
            customClass: {
                icon: 'custom-icon'
            }
        });
    }
    // popup flash Auth.
    if (flash_3) {

        Swal.fire({
            icon: "warning",
            text: flash_3,
            showConfirmButton: false,
            timer: 5000
        });
    }

    // flash worng update password user
    if (flash_password) {
        Swal.fire({
            icon: "error",
            text: flash_password,
            showConfirmButton: false,
            width: '400px',
            timer: 5000,
            customClass: {
                icon: 'custom-icon'
            }
        });
    }


    // alert delete data
    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            icon: 'warning',
            text: "Apakah anda yakin ?",
            showCancelButton: true,
            confirmButtonColor: "#38bd5e",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, hapus!",
            width: '400px',
            customClass: {
                confirmButton: 'custom-confirm-button-delete',
                cancelButton: 'custom-cancel-button-delete',
                icon: 'custom-icon'
            }
        }).then((result) => {
            if (result.isConfirmed) {

                window.location = href

            }
        });
    })

    // alert logout
    $(document).on('click', '#btn-logout', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            text: 'Anda akan keluar dari sistem',
            confirmButtonText: '<i class="fa-solid fa-right-from-bracket mx-1"></i> Keluar',
            confirmButtonColor: "#014ffd",
            showCancelButton: true,
            width: '300px',
            customClass: {
                confirmButton: 'custom-confirm-button',
                cancelButton: 'custom-cancel-button',
                popup: 'custom-text',
            },

        }).then((result) => {
            if (result.isConfirmed) {

                window.location = href

            }
        });
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek flashdata berhasil login
        <?php if (session()->getFlashdata('flash_5')) : ?>
            Swal.fire({
                icon: 'success',
                text: 'Selamat datang',
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
    });
</script>

<!-- =================================== -->


<script>
    $(document).ready(function() {
        $("#myTable").DataTable();
    });
</script>


<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>