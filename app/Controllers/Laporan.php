<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{

    public function penjualan()
    {
        $data = [
            'title'                 => 'Laporan-Penjualan',
            'breadcrumb'            => 'laporan penjualan',
            'data_penjualan'        => $this->penjualanModel->getAllPenjualan(),
        ];

        return view('laporan/penjualan', $data);
    }

    public function detail_penjualan($id_detail)
    {

        $data = $this->detailPenjualanModel->getDetailData(['id_penjualan_detail' => $id_detail]);

        echo json_encode($data);
    }

    // method delete/hapus data laporan penjualan
    public function delete($id_penjualan)
    {

        $this->penjualanModel->delete(['id_penjualan' => $id_penjualan]);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <strong>' . icon_success . ' Data laporan penjualan</strong> telah dihapus.
      ' . icon_close . '
      </div>');

        return redirect()->to('/laporan/penjualan');
    }
}
