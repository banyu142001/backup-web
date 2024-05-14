<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StokMasuk extends BaseController
{

    public function index()
    {
        $data = [
            'title'         => 'Stok Masuk',
            'breadcrumb'    => 'Stok Masuk',
            'data_stok_masuk' => $this->stokMasukModel->selectAllStokMasuk(),
        ];
        return view('transaksi/stokmasuk/index', $data);
    }

    // tambah data stok masuk
    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Stok Masuk',
            'breadcrumb'    => 'Tambah Data Stok Masuk',
            'data_stok_masuk' => $this->stokMasukModel->selectAllStokMasuk(),
        ];
        return view('transaksi/stokmasuk/create', $data);
    }
}
