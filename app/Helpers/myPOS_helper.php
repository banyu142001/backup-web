
<?php

// menu dashboard
function menu_dashboard($title)
{

    return ($title) == 'Dashboard' ? 'text-white active bg-gradient-success' : '';
}

// menu supplier
function menu_supplier($title)
{
    return ($title) == 'Supplier' ? 'text-white active bg-gradient-success' : '';
}

function menu_add_supplier($title)
{
    return ($title) == 'Tambah Data Supplier' ? 'text-white active bg-gradient-success' : '';
}
function menu_edit_supplier($title)
{
    return ($title) == 'Edit Data Supplier' ? 'text-white active bg-gradient-success' : '';
}
// end of menu supplier

// menu customer
function menu_customer($title)
{
    return ($title) == 'Customer' ? 'text-white active bg-gradient-success' : '';
}
function menu_add_customer($title)
{
    return ($title) == 'Tambah Data Customer' ? 'text-white active bg-gradient-success' : '';
}
function menu_edit_customer($title)
{
    return ($title) == 'Edit Data Customer' ? 'text-white active bg-gradient-success' : '';
}
// end of menu customers

// menu produk
function menu_produk($title)
{
    return ($title) == 'Produk' ? 'text-white active bg-gradient-success' : '';
}
function menu_add_produk($title)
{
    return ($title) == 'Tambah Data Produk' ? 'text-white active bg-gradient-success' : '';
}
function menu_edit_produk($title)
{
    return ($title) == 'Edit Data Produk' ? 'text-white active bg-gradient-success' : '';
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
    return ($title) == 'User' ? 'text-white active bg-gradient-success' : '';
}
function menu_add_user($title)
{
    return ($title) == 'Tambah Data User' ? 'text-white active bg-gradient-success' : '';
}
function menu_edit_user($title)
{
    return ($title) == 'Edit Data User' ? 'text-white active bg-gradient-success' : '';
}
// end of menu user
