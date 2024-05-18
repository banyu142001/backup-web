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

        $rules = [

            'kode_produk' => [
                'label'     => 'Kode Produk',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Kode Produk harus diisi!'
                ]
            ],
            'id_supplier' => [
                'label'     => 'Supplier',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Pilih Supplier terlebih dahulu!'
                ]
            ],
        ];

        // validation rules
        if (!$this->validate($rules)) {

            return redirect()->to('/stokmasuk/create')->withInput();
        }

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
        $this->produkModel->update_stok_masuk($data);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <strong> ' . icon_success . ' Data stok baru </strong> telah ditambah & diupdate.
        ' . icon_close . '
      </div>');
        return redirect()->to('/stokmasuk');
    }

    // delete data stok masuk
    public function delete($id_stok_masuk)
    {

        $data_stok = $this->stokMasukModel->selectAllStokMasuk(['id_stok_masuk' => $id_stok_masuk]);

        $data = [

            'qty'   => $data_stok['qty'],
            'id_produk'   => $data_stok['id_produk'],
        ];

        $this->produkModel->update_delete_stok_masuk($data);
        $this->stokMasukModel->delete(['id_stok_masuk' => $id_stok_masuk]);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <strong>' . icon_success . 'Data stok masuk </strong> telah dihapus & diupdate.
        ' . icon_close . '
      </div>');

        return redirect()->to('/stokmasuk');
    }
}
