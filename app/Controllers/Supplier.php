<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Supplier extends BaseController
{
    public function index()
    {
        $data = [
            'title'         => 'Supplier',
            'breadcrumb'    => 'Supplier',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),

        ];
        return view('supplier/index', $data);
    }

    //create supplier data
    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Supplier',
            'breadcrumb'    => 'Supplier / Tambah Data Supplier',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
        ];
        return view('supplier/create', $data);
    }

    // save supplier
    public function save()
    {

        // set rules and validate
        $rules = [

            'nama_supplier'       => [
                'label'           => 'Nama Supplier',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'telp'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/supplier/create')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_supplier' => $this->request->getVar('nama_supplier'),
                'no_telephone'  => $this->request->getVar('telp'),
                'alamat'        => $this->request->getVar('alamat'),
                'deskripsi'     => $this->request->getVar('desc'),

            ];

        // insert data to Database
        $this->suplyModel->saveSupplierData($data);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" style="background-color: #2fde7e;
        background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)" >
        <strong>Data Supplier Baru</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/supplier');
    }

    // edit supplier data
    public function edit($id_supplier)
    {
        $data = [
            'title'         => 'Edit Data Supplier',
            'breadcrumb'    => 'Supplier / Edit Data Supplier',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(['id_supplier' => $id_supplier]),
        ];
        return view('supplier/edit', $data);
    }

    // update data user
    public function update($id_supplier)
    {

        // set rules and validate
        $rules = [

            'nama_supplier'       => [
                'label'           => 'Nama Supplier',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'telp'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('/supplier/edit/' . $this->request->getVar('id_supplier'))->withInput();
        }

        // get data from form input
        $data =
            [
                'id_supplier'   => $id_supplier,
                'nama_supplier' => $this->request->getVar('nama_supplier'),
                'no_telephone'  => $this->request->getVar('telp'),
                'alamat'        => $this->request->getVar('alamat'),
                'deskripsi'     => $this->request->getVar('desc'),

            ];

        // insert data to Database
        $this->suplyModel->saveUpdateSupplierData($data);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" style="background-color: #2fde7e;
        background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)" >
        <strong>Data Supplier</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/supplier');
    }


    // delete method
    public function delete($id_supplier)
    {

        $this->suplyModel->delete(['id_supplier' => $id_supplier]);
        $errors = $this->suplyModel->db->error();

        if ($errors['code'] != 0) {
            session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" style="background-color: #ff5978;
            background-image: linear-gradient(90deg, #ff5978 0%, #FF6A88 55%, #ff5978 100%)">
            <strong>Data supplier tidak dapat dihapus. </strong> (data supplier ini sedang digunakan pada data stok masuk).
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
          </div>');
            return redirect()->to('/supplier');
        }

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" style="background-color: #2fde7e;
        background-image: linear-gradient(45deg, #2fde7e 94%, #cccccc 100%)" >
            <strong>Data Supplier</strong> telah dihapus.
            <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
          </div>');
        return redirect()->to('/supplier');
    }
}
