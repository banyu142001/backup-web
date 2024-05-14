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
            'title'           => 'Tambah Data Stok Masuk',
            'breadcrumb'      => 'Tambah Data Stok Masuk',
            'data_produk'     => $this->produkModel->selectAllProduk(),
            'data_supplier'   => $this->suplyModel->selectAllSupplier(),
        ];
        return view('transaksi/stokmasuk/create', $data);
    }

    // save data stok masuk
    public function save()
    {


        // get data
        $data = [

            'id_produk'     => $this->request->getVar('id_produk'),
            'id_supplier'   => $this->request->getVar('id_supplier'),
            'id_user'       => session()->get('id'),
            'typ'           => 'Masuk',
            'detail'        => $this->request->getVar('detail'),
            'detail'        => $this->request->getVar('detail'),
            'qty'           => $this->request->getVar('qty'),
            'tanggal'       => $this->request->getVar('tgl'),
        ];

        $this->stokMasukModel->saveData($data);

        return redirect()->to('/stokmasuk');
    }
}
