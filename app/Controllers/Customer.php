<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Customer extends BaseController
{

    public function index()
    {
        $data = [
            'title'         => 'Customer',
            'breadcrumb'    => 'Customer',
            'customers'     => $this->cusModel->selectAllCustomer(),
        ];
        return view('customer/index', $data);
    }

    //create supplier data
    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Customer',
            'breadcrumb'    => 'Customer / Tambah Data Customer',
            'customers'     => $this->cusModel->selectAllCustomer(),
        ];
        return view('customer/create', $data);
    }

    // save customer
    public function save()
    {

        // set rules and validate
        $rules = [

            'nama_customer'       => [
                'label'           => 'Nama Customer',
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
            return redirect()->to('/customer/create')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_customer' => $this->request->getVar('nama_customer'),
                'no_telephone'  => $this->request->getVar('telp'),
                'jenis_kelamin' => $this->request->getVar('jk'),
                'alamat'        => $this->request->getVar('alamat'),
            ];

        // insert data to Database
        $this->cusModel->saveCustomerData($data);
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Customer Baru</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/customer');
    }

    // edit customer data
    public function edit($id_customer)
    {
        $data = [
            'title'         => 'Edit Data Customer',
            'breadcrumb'    => 'Customer / Edit Data Customer',
            'customers'     => $this->cusModel->selectAllCustomer(['id_customer' => $id_customer]),
        ];
        return view('customer/edit', $data);
    }

    // update data customer
    public function update($id_customer)
    {

        // set rules and validate
        $rules = [

            'nama_customer'       => [
                'label'           => 'Nama Customer',
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
            return redirect()->to('/customer/edit/' . $this->request->getVar('id_customer'))->withInput();
        }

        // get data from form input
        $data =
            [
                'id_customer'   => $id_customer,
                'nama_customer' => $this->request->getVar('nama_customer'),
                'no_telephone'  => $this->request->getVar('telp'),
                'jenis_kelamin' => $this->request->getVar('jk'),
                'alamat'        => $this->request->getVar('alamat'),
            ];

        // insert data to Database
        $this->cusModel->saveUpdateCustomerData($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Customer</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/customer');
    }


    // delete method
    public function delete($id_custumer)
    {

        $this->cusModel->delete(['id_customer' => $id_custumer]);
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Customer</strong> telah dihapus.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/customer');
    }
}
