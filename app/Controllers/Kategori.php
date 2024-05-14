<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{

    public function index()
    {
        $data = [
            'title'         => 'Kategori',
            'breadcrumb'    => 'Kategori',
            'konf_delete'   => 'Hapus data Kategori',
            'customers'     => $this->cusModel->selectAllCustomer(),
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'users'         => $this->userModel->selectAllUser(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),
        ];
        return view('kategori/index', $data);
    }

    // save kategori
    public function save()
    {

        // set rules and validate
        $rules = [

            'kategori'       => [
                'label'           => 'Nama Kategori',
                'rules'           => 'required|trim|max_length[100]|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'   => '{field} sudah ada',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/kategori')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_kategori' => $this->request->getVar('kategori'),

            ];

        // insert data to Database
        $this->katModel->saveKategoriData($data);
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Kategori Baru</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/kategori');
    }

    // update data kategori
    public function update($id_kategori)
    {

        // set rules and validate
        $rules = [

            'kategori_update'       => [
                'label'             => 'Kategori',
                'rules'             => 'required|trim|max_length[100]',
                'errors' => [
                    'required'      => '{field} harus diisi',
                    'max_length'    => '{field} maksimal 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('flash_update_rule', '<div class="alert alert-danger text-white alert-dismissible fade show p-2 px-3" role="alert">
            <small>Nama Kategori harus diisi !! lakukan edit kembali.</small>
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
          </div>');
            return redirect()->to('/kategori')->withInput();
        }


        // get data from form input
        $data =
            [
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->request->getVar('kategori_update'),

            ];

        // insert data to Database
        $this->katModel->saveUpdateData($data);
        session()->setFlashdata('flash_update', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Kategori</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/kategori');
    }


    // delete method
    public function delete($id_kategori)
    {

        $this->katModel->delete(['id_kategori' => $id_kategori]);
        session()->setFlashdata('flash_del', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Kategori</strong> telah dihapus.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/kategori');
    }
}
