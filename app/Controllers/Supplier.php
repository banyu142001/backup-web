<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use CodeIgniter\HTTP\ResponseInterface;

class Supplier extends BaseController
{

    public function index()
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'         => 'Supplier',
            'breadcrumb'    => 'Supplier',
            'suppliers'     => $supplierModel->selectAllSupplier()
        ];
        return view('supplier/index', $data);
    }

    // create new supplier data / tambah data supplier
    public function create()
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'         => 'Tambah Data Supplier',
            'breadcrumb'    => 'Supplier / Tambah Data Supplier',
            'suppliers'     =>  $supplierModel->selectAllSupplier(),
        ];
        return view('supplier/create', $data);
    }

    // simpan data supplier baru / save supplier data
    public function save()
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

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
        $supplierModel->saveSupplierData($data);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <strong>' . icon_success . ' Data Supplier Baru</strong> telah ditambahkan.
         ' . icon_close . '
      </div>');
        return redirect()->to('/supplier');
    }

    // ubah data supplier / edit supplier data
    public function edit($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'         => 'Edit Data Supplier',
            'breadcrumb'    => 'Supplier / Edit Data Supplier',
            'suppliers'     =>  $supplierModel->selectAllSupplier(['id_supplier' => $id_supplier]),
        ];
        return view('supplier/edit', $data);
    }

    // update data supplier
    public function update($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

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
        $supplierModel->saveUpdateSupplierData($data);

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <strong>' . icon_success . ' Data Supplier</strong> telah diupdate.
        ' . icon_close . '
      </div>');
        return redirect()->to('/supplier');
    }


    // hapus data supllier / delete supplier
    public function delete($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $supplierModel->delete(['id_supplier' => $id_supplier]);
        $errors = $supplierModel->db->error();

        if ($errors['code'] != 0) {
            session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_DANGER . ' >
            <strong>' . icon_warning . ' Data supplier tidak dapat dihapus. </strong> (data supplier ini sedang digunakan pada data stok masuk).
            ' . icon_close . '
          </div>');
            return redirect()->to('/supplier');
        }

        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
            <strong>' . icon_success . ' Data Supplier</strong> telah dihapus.
            ' . icon_close . '
          </div>');
        return redirect()->to('/supplier');
    }
}
