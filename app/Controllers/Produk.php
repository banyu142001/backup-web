<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'title'         => 'Produk',
            'breadcrumb'    => 'Produk',
            'konf_delete'   => 'Hapus data Produk',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'users'         => $this->userModel->selectAllUser(),
            'customers'     => $this->cusModel->selectAllCustomer(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),

        ];
        return view('produk/index', $data);
    }

    //create produk data
    public function create()
    {
        $data = [
            'title'         => 'Tambah Data Produk',
            'breadcrumb'    => 'Produk / Tambah Data Produk',
            'konf_delete'   => '',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'users'         => $this->userModel->selectAllUser(),
            'customers'     => $this->cusModel->selectAllCustomer(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),
        ];
        return view('produk/create', $data);
    }

    // save produk
    public function save()
    {

        // set rules and validate
        $rules = [

            'kode_produk'       => [
                'label'           => 'Kode Produk',
                'rules'           => 'required|trim|is_unique[produk.kode_produk]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'nama_produk'       => [
                'label'           => 'Nama Produk',
                'rules'           => 'required|trim|is_unique[produk.nama_produk]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'kategori'       => [
                'label'           => 'Katrgori',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
            'satuan'       => [
                'label'           => 'Satuan',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/produk/create')->withInput();
        }

        // get data from form input
        $data =
            [
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'id_kategori' => $this->request->getVar('kategori'),
                'id_satuan' => $this->request->getVar('satuan'),
                'harga' => $this->request->getVar('harga'),
                'stok'  => 0,
            ];

        // insert data to Database
        $this->produkModel->saveProdukData($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Produk Baru</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/produk');
    }

    // edit produk data
    public function edit($id_produk)
    {
        $data = [
            'title'         => 'Edit Data Produk',
            'breadcrumb'    => 'Produk / Edit Data Produk',
            'konf_delete'   => '',
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'customers'     => $this->cusModel->selectAllCustomer(),
            'users'         => $this->userModel->selectAllUser(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),
            'produk_update' => $this->produkModel->selectAllProduk(['id_produk' => $id_produk]),

        ];
        return view('produk/edit', $data);
    }

    // update data produk
    public function update($id_produk)
    {

        $data_produk = $this->produkModel->selectAllProduk(['id_produk' => $id_produk]);

        $kode_produk = $this->request->getVar('kode_produk');
        $nama_produk = $this->request->getVar('nama_produk');

        if ($data_produk['kode_produk'] == $kode_produk) {

            $rule_kode = 'required';
        } else {

            $rule_kode = 'required|trim|is_unique[produk.kode_produk]';
        }
        // ----

        if ($data_produk['nama_produk'] == $nama_produk) {

            $rule_nama = 'required';
        } else {

            $rule_nama = 'required|trim|is_unique[produk.nama_produk]';
        }
        // ----

        // set rules and validate
        $rules = [

            'kode_produk'       => [
                'label'           => 'Kode Produk',
                'rules'           => $rule_kode,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'nama_produk'       => [
                'label'           => 'Nama Produk',
                'rules'           => $rule_nama,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'kategori'       => [
                'label'           => 'Kategori',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
            'satuan'       => [
                'label'           => 'Satuan',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/produk/edit/' . $this->request->getVar('id_produk'))->withInput();
        }

        // get data from form input
        $data =
            [
                'id_produk'  => $id_produk,
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'id_kategori' => $this->request->getVar('kategori'),
                'id_satuan' => $this->request->getVar('satuan'),
                'harga' => $this->request->getVar('harga'),
            ];

        // insert data to Database
        $this->produkModel->saveUpdateProdukData($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Produk</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/produk');
    }


    // delete method
    public function delete($id_produk)
    {

        $this->produkModel->delete(['id_produk' => $id_produk]);

        $errors = $this->produkModel->db->error();
        if ($errors['code'] != 0) {

            session()->setFlashdata('flash', '<div class="alert alert-danger text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Produk tidak dapat dihapus</strong>  (data produk ini sedang digunakan pada data stok masuk).
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
            return redirect()->to('/produk');
        }
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data Produk</strong> telah dihapus.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/produk');
    }
}
