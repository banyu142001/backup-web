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
            'konf_delete'   => 'Hapus data Stok Masuk',
            'data_stok_masuk' => $this->stokMasukModel->selectAllStokMasuk(),
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),


        ];
        return view('transaksi/stokmasuk/index', $data);
    }
}
