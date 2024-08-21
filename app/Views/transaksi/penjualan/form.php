<!-- Modal Pilih data produk unutk ditambahkan ke dalam  cart belanja -->
<div class="modal fade" id="modalCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-0 shadow-none position-relative ">
        <div class="modal-content rounded-1 shadow-none border-0">
            <div class="modal-header p-0 py-1 px-3">
                <p class="modal-title fw-bolder mt-2">Pilih Produk</p>
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-1 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-borderles table-sm table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Kode Produk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Nama Produk</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Satuan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Harga</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Stok</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_produk as $produk) : ?>
                            <tr>
                                <td>
                                    <p class="text-sm mb-0 mx-2 fw-bold "><?= $produk['kode_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 mx-2"><?= $produk['nama_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['nama_satuan'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 text-end">Rp. <?= number_format($produk['harga']) ?> </p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['stok'] ?></p>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm rounded-2 p-1 w-100 mb-0 btn-warning" id="select" name="submit" data-id_produk="<?= $produk['id_produk'] ?>" data-kode_produk="<?= $produk['kode_produk'] ?>" data-harga="<?= $produk['harga'] ?>" data-stok="<?= $produk['stok'] ?>"> Pilih</button>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal update/edit data cart cart -->
<div class="modal fade" id="modalUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm border-0 shadow-none position-relative ">
        <div class="modal-content rounded-1 shadow-none border-0">
            <div class="modal-header p-0 py-1 px-3">
                <p class="modal-title fw-bolder mt-2">Update Produk</p>
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-2 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group mb-0">
                    <label for="" class="my-0">Produk</label>
                    <div class="row">
                        <input type="hidden" id="id_cart">
                        <div class="col-6">
                            <input type="text" id="kode_cart" class="form-control border form-control-sm bg-light fw-bold" readonly>
                        </div>
                        <div class="col-6">
                            <input type="text" id="nama_cart" class="form-control border form-control-sm bg-light fw-bold" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label for="harga" class="my-0">Harga</label>
                    <input type="number" id="harga_cart" class="form-control border form-control-sm">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="jumlah" class="my-0">Jumlah</label>
                            <input type="number" id="jumlah_cart" class="form-control border form-control-sm">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-0">
                            <label for="jumlah" class="my-0">Stok</label>
                            <input type="number" id="stok_produk" class="form-control border form-control-sm" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label for="total1" class="my-0">Total sebelum Diskon</label>
                    <input type="number" id="total1" class="form-control border form-control-sm fw-bold bg-light">
                </div>
                <div class="form-group mb-0">
                    <label for="diskon_produk" class="my-0">Diskon per Produk</label>
                    <input type="number" id="diskon_cart" class="form-control border form-control-sm" value="0">
                </div>
                <div class="form-group mb-0">
                    <label for="total2" class="my-0">Total setelah Diskon</label>
                    <input type="number" id="total2" class="form-control border form-control-sm fw-bold bg-light ">
                </div>
                <div class="form-group mb-0">
                    <button id="simpan_update" class="btn btn-sm rounded-1 text-white w-100 mt-1" <?= btn_success ?>>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- PROSES AJAX -->
<script>
    $(document).ready(function() {

        // Jquery / ajax menambahakan data ke dalam cart belanja
        $(document).on('click', '#select', function() {

            // ambil data dari button search 
            const id_produk = $(this).data('id_produk');
            const kode_produk = $(this).data('kode_produk');
            const harga = $(this).data('harga');
            const stok = $(this).data('stok');

            // set value dari tiap inputan berdasarkan (id)
            $('#id_produk').val(id_produk);
            $('#kode_produk').val(kode_produk);
            $('#harga').val(harga);
            $('#stok').val(stok);
            $('#modalCart').modal('hide');


            get_cart_qty(kode_produk)
        })

        // fungsi validasi qty pada tabel cart
        function get_cart_qty(kode_produk) {

            $('#tb_cart tr').each(function() {

                // let qty_cart = $(this).find('td').eq(2).html()

                let qty_cart = $('#tb_cart td.kode_produk:contains("' + kode_produk + '")').parent().find('td').eq(3).html()

                if (qty_cart != null) {

                    $('#qty_cart').val(qty_cart);
                } else {
                    $('#qty_cart').val(0);
                }

            })
        }


        // ketika button tambah  ditekan 
        $(document).on('click', '#cart', function() {

            // ambil data dari button
            const id_produk = $('#id_produk').val()
            const harga = $('#harga').val()
            const stok = $('#stok').val()
            const qty = $('#qty').val()
            const qty_cart = $('#qty_cart').val()

            // validasi data produk

            if (id_produk == '') {

                Swal.fire({
                    showConfirmButton: false,
                    icon: 'warning',
                    text: 'Silahkan pilih produk',
                    width: '300px',
                    timer: 1000,
                    customClass: {
                        icon: 'custom-icon',
                    }
                });

            } else if (stok < 1 || parseInt(stok) < (parseInt(qty_cart) + parseInt(qty))) {
                Swal.fire({
                    showConfirmButton: false,
                    icon: 'warning',
                    text: 'Stok produk tidak mencukupi',
                    width: '300px',
                    timer: 1000,
                    customClass: {
                        icon: 'custom-icon',
                    }
                });
            } else {

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('penjualan/save') ?>',
                    data: {
                        'cart': true,
                        'id_produk': id_produk,
                        'harga_data_cart': harga,
                        'qty_data_cart': qty
                    },
                    dataType: 'json',
                    success: function(result) {

                        if (result.success == true) {

                            Swal.fire({
                                showConfirmButton: false,
                                icon: 'success',
                                text: 'Data ditambah ke cart ',
                                width: '300px',
                                timer: 1000,
                                customClass: {
                                    icon: 'custom-icon',
                                }
                            });

                            $('#tb_cart').load('<?= base_url('/penjualan/load_cart') ?>', function() {
                                hitung()
                            })
                            $('#id_produk').val('')
                            $('#kode_produk').val('')
                            $('#qty').val(1)

                        } else {
                            Swal.fire({
                                showConfirmButton: false,
                                icon: 'error',
                                text: 'Data gagal ditambah ke cart ',
                                width: '300px',
                                timer: 1000,
                                customClass: {
                                    icon: 'custom-icon',
                                }
                            });
                        }
                    }
                })
            }
        })
        // -------------------------------------------------------------------------------------------

        // Jquery / ajax delete / hapus data dari cart belanja
        $(document).on('click', '#del_cart', function() {
            const id_cart = $(this).data('id_cart')

            $.ajax({
                type: 'POST',
                url: '<?= base_url('/penjualan/deleteCart') ?>',
                dataType: 'json',
                data: {
                    'id_cart': id_cart
                },
                success: function(result) {
                    if (result.success == true) {
                        Swal.fire({
                            showConfirmButton: false,
                            icon: 'success',
                            text: 'Data berhasil dihapus',
                            width: '300px',
                            timer: 1000,
                            customClass: {
                                icon: 'custom-icon',
                            }
                        });
                        $('#tb_cart').load('<?= base_url('/penjualan/load_cart') ?>', function() {
                            hitung()
                        })

                    } else {
                        alert("Data cart gagal dihapus")
                    }
                }
            })
        })
        // -------------------------------------------------------------------------------------------

        // jquery ketika edit data cart belanja
        $(document).on('click', '#update_cart', function() {

            // ambil data dari button update dan isi value tiap inputan berdasarkan  (ID) pada form
            const id_cart = $(this).data('id_cart');
            const kode_produk = $(this).data('kode_produk');
            const stok_produk = $(this).data('stok');
            const nama_produk = $(this).data('nama_produk');
            const harga = $(this).data('harga');
            const qty = $(this).data('qty');
            const diskon = $(this).data('diskon');
            const total = $(this).data('total');

            // set nilai/value dari tiap inputan berdasarkan id
            $('#id_cart').val(id_cart);
            $('#kode_cart').val(kode_produk);
            $('#nama_cart').val(nama_produk);
            $('#harga_cart').val(harga);
            $('#jumlah_cart').val(qty);
            $('#stok_produk').val(stok_produk);
            $('#total1').val((harga * qty));
            $('#diskon_cart').val(diskon);
            $('#total2').val(total)
        })

        // fungsi kalkulasi pada modal edit secara (realtime)
        function calculate_data_modal() {

            // ambil data harga, diskon, dan qty
            harga = $('#harga_cart').val()
            jumlah = $('#jumlah_cart').val()
            diskon = $('#diskon_cart').val()

            total_sebelum_diskon = harga * jumlah
            $('#total1').val(total_sebelum_diskon)

            total = (harga - diskon) * jumlah
            $('#total2').val(total)
        }
        // jalankan fungsi kalkulasi
        $(document).on('keyup mouseup', '#harga_cart, #jumlah_cart, #diskon_cart', function() {

            calculate_data_modal()
        })
        // -------------------------------------------------------------------------------------------

        // jquery simpan update data pada cart belanja
        $(document).on('click', '#simpan_update', function() {

            // ambil data inputan dari modal edit
            id_cart = $('#id_cart').val()
            harga_cart = $('#harga_cart').val()
            let jumlah_cart = $('#jumlah_cart').val()
            diskon_cart = $('#diskon_cart').val()
            total2 = $('#total2').val()
            let stok_produk = $('#stok_produk').val()

            // validasi data edit data cart
            if (harga_cart == 0) {
                Swal.fire({
                    showConfirmButton: false,
                    icon: 'warning',
                    text: 'Harga produk tidak boleh kosong',
                    width: '300px',
                    timer: 3000,
                    customClass: {
                        icon: 'custom-icon',
                    }
                });
                $('#harga_cart').focus()

            } else if (jumlah_cart == 0) {
                Swal.fire({
                    showConfirmButton: false,
                    icon: 'warning',
                    text: 'Jumlah tidak boleh kosong',
                    width: '300px',
                    timer: 3000,
                    customClass: {
                        icon: 'custom-icon',
                    }
                });
                $('#jumlah_cart').focus()

            } else if (parseInt(jumlah_cart) > parseInt(stok_produk)) {
                Swal.fire({
                    showConfirmButton: false,
                    icon: 'warning',
                    text: 'Stok produk tidak mencukupi',
                    width: '300px',
                    timer: 1000,
                    customClass: {
                        icon: 'custom-icon',
                    }
                });
                $('#jumlah_cart').focus()
            } else {

                // ajax untuk mengirimkan data ke controller penjualan 
                $.ajax({

                    type: 'POST',
                    url: '<?= base_url('penjualan/update') ?>',
                    data: {
                        'simpan_update': true,
                        'id_cart': id_cart,
                        'harga_data_cart': harga_cart,
                        'qty_data_cart': jumlah_cart,
                        'diskon_data_cart': diskon_cart,
                        'total_data_cart': total2,
                    },
                    dataType: 'json',
                    success: function(result) {

                        if (result.success == true) {
                            Swal.fire({
                                showConfirmButton: false,
                                icon: 'success',
                                text: 'Data berhasil diupdate ',
                                width: '300px',
                                timer: 1000,
                                customClass: {
                                    icon: 'custom-icon',
                                }
                            });
                            $('#tb_cart').load('<?= base_url('/penjualan/load_cart') ?>', function() {
                                hitung()
                            })
                            $('#modalUpdate').modal('hide');

                        } else {

                            Swal.fire({
                                showConfirmButton: false,
                                icon: 'error',
                                text: 'Data gagal diupdate',
                                width: '300px',
                                timer: 1000,
                                customClass: {
                                    icon: 'custom-icon',
                                }
                            });
                        }
                    }
                })
            }
        })
        // -------------------------------------------------------------------------------------------
    })

    // fungsi format rupiah
    function formatRupiah(angka) {
        var number_string = angka.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp ' + rupiah;
    }
    // ------------------------------------------------  

    // fungsi hitung transaksi penjualan
    function hitung() {
        let sub_total = 0;
        $('#tb_cart tr').each(function() {
            sub_total += parseInt($(this).find('#total_cart').text());
        });
        isNaN(sub_total) ? $('#sub_total').val(0) : $('#sub_total').val(sub_total);

        const diskon = parseInt($('#diskon_penjualan').val()); // Pastikan diskon dalam bentuk numerik
        const grand_total = sub_total - diskon;

        if (isNaN(grand_total)) {
            $('#grand_total').val(0);
            $('#grand_total2').text(0);
        } else {
            $('#grand_total').val(grand_total);
            $('#grand_total2').text(formatRupiah(grand_total));
        }

        const cash = parseInt($('#cash').val()); // Pastikan cash dalam bentuk numerik
        const kembalian = cash - grand_total;
        $('#kembalian').val(kembalian >= 0 ? kembalian : 0); // Pastikan kembalian tidak negatif
    }
    $(document).on('keyup mouseup', '#diskon_penjualan, #cash', function() {
        hitung()
        formatRupiah()
    })
    // menjalankan fungsi hitung dan formatRupiah
    $(document).ready(function() {
        hitung()
        formatRupiah()
    });
    // ------------------------------------------------  

    // Jquery Simpan proses transaksi penjualan
    $(document).on('click', '#simpan_transaksi', function() {

        // ambil semua inputan yang akan di INSERT ke dalam tabel penjualan
        const id_customer = $('#id_customer').val()
        const sub_total = $('#sub_total').val()
        const diskon_penjualan = $('#diskon_penjualan').val()
        const grand_total = $('#grand_total').val()
        const cash = $('#cash').val()
        const kembalian = $('#kembalian').val()
        const nota = $('#nota').val()
        const tanggal = $('#tanggal').val()

        // validasi inputan
        if (sub_total < 1) {

            Swal.fire({
                showConfirmButton: false,
                icon: 'warning',
                text: 'Silahkan pilih produk ',
                width: '300px',
                timer: 1000,
                customClass: {
                    icon: 'custom-icon',
                }
            });
        } else if (cash < 1) {
            Swal.fire({
                showConfirmButton: false,
                icon: 'warning',
                text: 'Nominal / Cash belum diinput',
                width: '300px',
                timer: 2000,
                customClass: {
                    icon: 'custom-icon',
                }
            });
            $('#cash').focus()
        } else {

            // jalankan ajax
            // $.ajax({
            //     type: 'POST',
            //     url: '<?= base_url('/penjualan/save_payment') ?> ',
            //     data: {
            //         'simpan_transaksi': true,
            //         'id_customer': id_customer,
            //         'sub_total': sub_total,
            //         'diskon': diskon_penjualan,
            //         'grand_total': grand_total,
            //         'cash': cash,
            //         'kembalian': kembalian,
            //         'nota': nota,
            //         'tanggal': tanggal
            //     },
            //     dataType: 'json',
            //     success: function(result) {

            //         if (result.success == true) {
            //             // alert("Transaksi Berhasil");
            //             window.open('<?= base_url('/penjualan/cetak/') ?>' + result.id_penjualan);

            //         }

            //         location.href = '<?= base_url('penjualan') ?>';
            //     }
            // })

            $.ajax({
                type: 'POST',
                url: '<?= base_url('/penjualan/save_payment') ?>',
                data: {
                    'simpan_transaksi': true,
                    'id_customer': id_customer,
                    'sub_total': sub_total,
                    'diskon': diskon_penjualan,
                    'grand_total': grand_total,
                    'cash': cash,
                    'kembalian': kembalian,
                    'nota': nota,
                    'tanggal': tanggal
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        // Kirim permintaan AJAX untuk mencetak struk
                        $.ajax({
                            url: '<?= base_url('/penjualan/cetak/') ?>' + result.id_penjualan,
                            type: 'POST',
                            success: function(response) {
                                // Redirect atau tampilkan pesan jika diperlukan
                                location.href = '<?= base_url('penjualan') ?>';
                            },
                            error: function(xhr, status, error) {
                                console.error('Error printing receipt:', error);
                                // Tangani error jika diperlukan
                            }
                        });
                    } else {
                        location.href = '<?= base_url('penjualan') ?>';
                    }
                }
            });

        }


    })
</script>