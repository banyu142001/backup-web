
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
// end of menu user


// indo date format
function indo_date($date)
{

    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);

    return $d . '/' . $m . '/' . $y;
}
