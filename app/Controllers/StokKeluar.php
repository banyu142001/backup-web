<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StokKeluar extends BaseController
{

    public function index()
    {
        $data = [
            'title'         => 'Stok Keluar',
            'breadcrumb'    => 'Stok Keluar',
            'data_stok_keluar' => $this->stokKeluarModel->selectAllStokKeluar(),
        ];
        return view('transaksi/stokkeluar/index', $data);
    }

    // tambah data stok masuk
    public function create()
    {
        $data = [
            'title'           => 'Tambah Data Stok Keluar',
            'breadcrumb'      => 'Tambah Data Stok Keluar',
            'data_produk'     => $this->produkModel->selectAllProduk(),
            'data_supplier'   => $this->suplyModel->selectAllSupplier(),
        ];
        return view('transaksi/stokkeluar/create', $data);
    }

    // save data stok masuk
    public function save()
    {

        $rules = [

            'kode_produk' => [

                'label'     => 'Kode Produk',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Kode Produk harus diisi!'
                ]
            ],
        ];

        // validation rules
        if (!$this->validate($rules)) {

            return redirect()->to('/stokkeluar/create')->withInput();
        }

        // get data
        $data = [

            'id_produk'     => $this->request->getVar('id_produk'),
            'id_supplier'   => $this->request->getVar('id_supplier'),
            'id_user'       => session()->get('id'),
            'type'           => 'Keluar',
            'detail'        => $this->request->getVar('detail'),
            'detail'        => $this->request->getVar('detail'),
            'qty'           => $this->request->getVar('qty'),
            'tanggal'       => $this->request->getVar('tgl'),
        ];

        $this->stokKeluarModel->saveData($data);
        $this->produkModel->update_stok_keluar($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data stok keluar </strong> telah ditambah & diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/stokkeluar');
    }

    // delete data stok masuk
    public function delete($id_stok_keluar)
    {

        $data_stok = $this->stokKeluarModel->selectAllStokKeluar(['id_stok_keluar' => $id_stok_keluar]);

        $data = [

            'qty'   => $data_stok['qty'],
            'id_produk'   => $data_stok['id_produk'],
        ];

        $this->produkModel->update_delete_stok_keluar($data);
        $this->stokKeluarModel->delete(['id_stok_keluar' => $id_stok_keluar]);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data stok keluar </strong> telah dihapus & diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');

        return redirect()->to('/stokkeluar');
    }
}
