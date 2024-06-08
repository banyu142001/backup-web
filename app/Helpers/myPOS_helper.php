
<?php

// menu dashboard
function menu_dashboard($title)
{

    return ($title) == 'Dashboard' ? 'text-white active bg-gradient-primary' : '';
}

// menu supplier
function menu_supplier($title)
{
    if (($title) == 'Supplier' | $title == 'Tambah Data Supplier' | $title == 'Edit Data Supplier') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}
// end of menu supplier

// menu customer
function menu_customer($title)
{
    if (($title) == 'Customer' | $title == 'Tambah Data Customer' | $title == 'Edit Data Customer') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}
// end of menu customers

// menu produk
function menu_produk($title)
{
    if (($title) == 'Produk' | $title == 'Tambah Data Produk' | $title == 'Edit Data Produk') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}
// end of menu produk

// menu kategori
function menu_kategori($title)
{
    return ($title) == 'Kategori' ? 'text-white active bg-gradient-primary' : '';
}
// end of menu kategori

// menu satuan
function menu_satuan($title)
{
    return ($title) == 'Satuan' ? 'text-white active bg-gradient-primary' : '';
}
// end of menu satuan


// menu user
function menu_user($title)
{
    if (($title) == 'User' | $title == 'Tambah Data User' | $title == 'Edit Data User') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}

// end of menu user


// menu stok masuk
function menu_stok($title)
{
    if (($title) == 'Stok Masuk' | $title == 'Tambah Data Stok Masuk') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}
// end of menu user

// menu stok Keluar
function menu_stok_keluar($title)
{
    if ($title == 'Stok Keluar' | $title == 'Tambah Data Stok Keluar') {
        // 
        return $title =  'text-white active bg-gradient-primary';
    }
}
// menu penjualan
function menu_penjualan($title)
{
    if ($title == 'Penjualan') {
        // 
        return $title =  'text-white active bg-gradient-primary';
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

//  icon check
define('icon_success', '<i class="fa fa-check-circle mx-2"></i>');
//  icon warnign alert danger
define('icon_warning', '<i class="fas fa-exclamation-circle mx-2"></i>');
// icon close alert
define('icon_close', ' <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>');

// text success
define('text_success', 'style="color: #00DFA2;"');
// texr danger
define('text_danger', 'style="color: #C73659;"');
// texr info
define('text_info', 'style="color: #1679AB;"');


// button success
define('btn_success', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)"');
// button info
define('btn_info', 'style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #0093e9 100%)"');
// button success
define('btn_success_search', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%); height: 39px;"');
// button success style
define('btn_success_style', 'style="background-color: #2fde7e;
background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%); height: 33px;"');
// btn info add cart
define('btn_cart', 'style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #0093e9 100%);
--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .3rem; --bs-btn-font-size: .70rem; "');
// btn info add cart
define('btn_cart_warning', 'style="background-color: #FBAB7E;
background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
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
