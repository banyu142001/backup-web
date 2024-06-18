<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{

    public function penjualan()
    {
        $data = [
            'title'         => 'Laporan-Penjualan',
            'breadcrumb'    => 'laporan penjualan',
            'data_penjualan' => $this->penjualanModel->getAllPenjualan(),
        ];

        return view('laporan/penjualan', $data);
    }
}
