<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use tidy;

class Satuan extends BaseController
{

    public function index()
    {
        $data = [
            'title'         => 'Satuan',
            'breadcrumb'    => 'Satuan',
            'konf_delete'   => 'Hapus data Satuan',
            'customers'     => $this->cusModel->selectAllCustomer(),
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'users'         => $this->userModel->selectAllUser(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),

        ];
        return view('satuan/index', $data);
    }

    // save satuan
    public function save()
    {

        // set rules and validate
        $rules = [

            'satuan'       => [
                'label'           => 'Nama Satuan',
                'rules'           => 'required|trim|max_length[100]|is_unique[satuan.nama_satuan]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'   =>  '{field} sudah tersedia'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/satuan')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_satuan' => $this->request->getVar('satuan'),

            ];

        // insert data to Database
        $this->satuanModel->saveSatuanData($data);
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Satuan Baru</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/satuan');
    }

    // update data satuan
    public function update($id_satuan)
    {

        // set rules and validate
        $rules = [

            'satuan_update'       => [
                'label'             => 'Nama Satuan',
                'rules'             => 'required|trim|max_length[100]',
                'errors' => [
                    'required'      => '{field} harus diisi',
                    'max_length'    => '{field} maksimal 100 karakter'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('flash_update_rule', '<div class="alert alert-danger text-white alert-dismissible fade show p-2 px-3" role="alert">
            <small>Nama Satuan harus diisi !! lakukan edit kembali.</small>
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
          </div>');
            return redirect()->to('/satuan')->withInput();
        }


        // get data from form input
        $data =
            [
                'id_satuan'   => $id_satuan,
                'nama_satuan' => $this->request->getVar('satuan_update'),

            ];

        // insert data to Database
        $this->satuanModel->saveUpdateData($data);
        session()->setFlashdata('flash_update', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Satuan</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/satuan');
    }


    // delete method
    public function delete($id_satuan)
    {

        $this->satuanModel->delete(['id_satuan' => $id_satuan]);
        $errors = $this->satuanModel->db->error();

        if ($errors['code'] != 0) {

            session()->setFlashdata('flash_del', '<div class="alert alert-danger text-white alert-dismissible fade show p-2 px-3" role="alert">
            <strong>Data Satuan tidak dapat dihapus </strong> (data ini sedang digunakan pada data master produk).
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
          </div>');
            return redirect()->to('/satuan');
        }

        session()->setFlashdata('flash_del', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Satuan </strong> telah dihapus.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/satuan');
    }
}
