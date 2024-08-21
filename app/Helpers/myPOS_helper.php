
<?php


// menu dashboard
function menu_dashboard($title)
{
    $level = session()->get('level');

    if ($level == 1) {

        return ($title) == 'Dashboard' ? 'text-white active bg-gradient-primary' : '';
    } else {
        return ($title) == 'Dashboard' ? 'active bg-gradient-info' : '';
    }
}

// menu supplier
function menu_supplier($title)
{
    $level = session()->get('level');

    if (($title) == 'Supplier' | $title == 'Tambah Data Supplier' | $title == 'Edit Data Supplier' && ($level == 1)) {

        if ($level == 1) {
            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of menu supplier

// menu customer
function menu_customer($title)
{
    $level = session()->get('level');

    if (($title) == 'Customer' | $title == 'Tambah Data Customer' | $title == 'Edit Data Customer') {
        // 
        if ($level == 1) {

            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of menu customers

// menu produk
function menu_produk($title)
{
    $level = session()->get('level');

    if (($title) == 'Produk' | $title == 'Tambah Data Produk' | $title == 'Edit Data Produk') {
        // 
        if ($level == 1) {

            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of menu produk

// menu kategori
function menu_kategori($title)

{
    $level = session()->get('level');
    if ($level == 1) {

        return ($title) == 'Kategori' ? 'text-white active bg-gradient-primary' : '';
    } else {
        return ($title) == 'Kategori' ? 'text-white active bg-gradient-info' : '';
    }
}
// end of menu kategori

// menu satuan
function menu_satuan($title)
{
    $level = session()->get('level');
    if ($level == 1) {

        return ($title) == 'Satuan' ? 'text-white active bg-gradient-primary' : '';
    } else {
        return ($title) == 'Satuan' ? 'text-white active bg-gradient-info' : '';
    }
}
// end of menu satuan


// menu user
function menu_user($title)
{
    $level = session()->get('level');

    if (($title) == 'User' | $title == 'Tambah Data User' | $title == 'Edit Data User') {
        // 
        if ($level == 1) {

            return $title =  'text-white active bg-gradient-primary';
        } else {

            return $title =  'text-white active bg-gradient-info';
        }
    }
}

// end of menu user


// menu stok masuk
function menu_stok($title)
{
    $level = session()->get('level');
    if (($title) == 'Stok Masuk' | $title == 'Tambah Data Stok Masuk') {
        // 
        if ($level == 1) {
            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of menu user

// menu stok Keluar
function menu_stok_keluar($title)
{
    $level = session()->get('level');
    if ($title == 'Stok Keluar' | $title == 'Tambah Data Stok Keluar') {
        // 
        if ($level == 1) {
            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// menu penjualan
function menu_penjualan($title)
{
    $level = session()->get('level');

    if ($title == 'Penjualan') {
        // 
        if ($level == 1) {

            return $title =  'text-white active bg-gradient-primary';
        } else {

            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of penjualan

// menu laporan penjualan
function menu_laporan_penjualan($title)
{
    // 
    $level = session()->get('level');

    if ($title == 'Laporan-Penjualan') {
        if ($level == 1) {
            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of penjualan

// menu testimoni
function menu_testimoni($title)
{
    // 
    $level = session()->get('level');

    if ($title == 'User-Testing' | $title == 'Add-Testimoni') {
        if ($level == 1) {
            return $title =  'text-white active bg-gradient-primary';
        } else {
            return $title =  'text-white active bg-gradient-info';
        }
    }
}
// end of penjualan


// indo date format
function indo_date($date)
{

    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);

    return $d . '/' . $m . '/' . $y;
}

// =======================================================================
// CONSTANTA ALERT

// alert success
define('ALERT_SUCCESS', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)"');
// alert danger
define('ALERT_DANGER', ' style="background-color: #ff6a88;
background-image: linear-gradient(90deg, #ff6a88 0%, #FF6A88 55%, #ff6a88 100%);
 "');

// icon close alert
define('icon_close', ' <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>');

// text success
define('text_success', 'style="color: #00DFA2;"');
// texr danger
define('text_danger', 'style="color: #C73659;"');
// texr info
define('text_info', 'style="color:  #014ffd;"');


// button success
define('btn_success', 'style="background-color: #2ad06b;"');
// button info
define('btn_info', 'style="background-color: #014ffd"');
// button success
define('btn_success_search', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%); height: 39px;"');
// button success style
define('btn_success_style', 'style="background-color: #2ad06b;height: 33px;"');
// btn info add cart
define('btn_cart', 'style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #0093e9 100%);
--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem; "');
// btn info add cart
define('btn_cart_warning', 'style="background-color: #014ffd;
--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem; "');

// bg icon info
define('bg_info', 'style="background-color: #8EC5FC;
background-image: linear-gradient(62deg, #8EC5FC 0%, #8ec5fc 100%)"');

// bg icon danger
define('bg_danger', 'style="background-color: #ff99ac;
background-image: linear-gradient(90deg, #ff99ac 0%, #ff99ac 55%, #FF99AC 100%);
"');

// bg icon success
define('bg_success', 'style="background-color: #d8d457;
background-image: linear-gradient(45deg, #d8d457 0%, #d8d457 100%);
"');

// bg icon warning
define('bg_warning', 'style="background-color: #f7ce68;
background-image: linear-gradient(62deg, #f7ce68 0%, #F7CE68 100%);
"');
