
<?php

// menu dashboard
function menu_dashboard($title)
{

    return ($title) == 'Dashboard' ? 'text-white active bg-gradient-success' : '';
}

// menu supplier
function menu_supplier($title)
{
    if (($title) == 'Supplier') {
        // 
        return ($title) == 'Supplier' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Tambah Data Supplier') {
        // 
        return ($title) == 'Tambah Data Supplier' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Edit Data Supplier') {
        // 
        return ($title) == 'Edit Data Supplier' ? 'text-white active bg-gradient-success' : '';
    }
}

// end of menu supplier

// menu customer
function menu_customer($title)
{
    if (($title) == 'Customer') {
        // 
        return ($title) == 'Customer' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Tambah Data Customer') {
        // 
        return ($title) == 'Tambah Data Customer' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Edit Data Customer') {
        // 
        return ($title) == 'Edit Data Customer' ? 'text-white active bg-gradient-success' : '';
    }
}

// end of menu customers

// menu produk
function menu_produk($title)
{
    if (($title) == 'Produk') {
        // 
        return ($title) == 'Produk' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Tambah Data Produk') {
        // 
        return ($title) == 'Tambah Data Produk' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Edit Data Produk') {
        // 
        return ($title) == 'Edit Data Produk' ? 'text-white active bg-gradient-success' : '';
    }
}
// end of menu produk

// menu kategori
function menu_kategori($title)
{
    return ($title) == 'Kategori' ? 'text-white active bg-gradient-success' : '';
}
// end of menu kategori

// menu satuan
function menu_satuan($title)
{
    return ($title) == 'Satuan' ? 'text-white active bg-gradient-success' : '';
}
// end of menu satuan


// menu user
function menu_user($title)
{
    if (($title) == 'User') {
        // 
        return ($title) == 'User' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Tambah Data User') {
        // 
        return ($title) == 'Tambah Data User' ? 'text-white active bg-gradient-success' : '';
    } elseif (($title) == 'Edit Data User') {
        // 
        return ($title) == 'Edit Data User' ? 'text-white active bg-gradient-success' : '';
    }
}

// end of menu user
