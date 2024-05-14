<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{

    public function index()
    {
        $data = [

            'title'        => 'User',
            'breadcrumb'    => 'User',
            'konf_delete'   => 'Hapus data User',
            'users'         => $this->userModel->selectAllUser(),
            'suppliers'     =>  $this->suplyModel->selectAllSupplier(),
            'customers'     => $this->cusModel->selectAllCustomer(),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk()

        ];
        return view('user/index', $data);
    }

    // create user
    public function create()
    {

        $data = [

            'title'      => 'Tambah Data User',
            'breadcrumb' => 'User / Tambah Data User',
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),
        ];
        return view('user/create', $data);
    }

    // save user
    public function save()
    {

        // set rules and validate
        $rules = [

            'nama'  => [
                'label'  => 'Nama User',
                'rules'   => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'max_length'  => '{field} maksimal 30 karakter'
                ]
            ],
            'username'  => [
                'label'  => 'Username',
                'rules'   => 'required|trim|min_length[3]|is_unique[user.username]|max_length[10]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'is_unique'   => '{field} sudah terdaftar ! pilih kombinasi {field} yang lain',
                    'max_length'  => '{field} maksimal 10 karakter'
                ]
            ],
            'email'  => [
                'label'  => 'Email',
                'rules'   => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'valid_email'  => 'Format {field} tidak valid',
                    'is_unique'  => '{field} sudah terdaftar'
                ]
            ],
            'password'  => [
                'label'  => 'Password',
                'rules'   => 'required|trim|matches[password-konf]',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'matches'  => 'Konfirmasi {field} tidak sesuai',
                ]
            ],
            'password-konf'  => [
                'label'  => 'Konfirmasi Password',
                'rules'   => 'matches[password]',
                'errors' => [
                    'matches'  => '{field} tidak sesuai',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/user/create')->withInput();
        }

        // get data & encripsi password
        $password = $this->request->getVar('password');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data =
            [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $passwordHash,
                'foto' => 'default.png',
                'level' => $this->request->getVar('level'),
                'alamat' => $this->request->getVar('alamat')
            ];

        // insert data to Database
        $this->userModel->saveUserData($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data User</strong> telah ditambahkan.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/user');
    }

    // edit data user
    public function edit($id)
    {

        $data = [

            'title'      => 'Edit Data User',
            'breadcrumb' => 'User / Edit Data User',
            'user'       => $this->userModel->selectAllUser(['id' => $id]),
            'kategori'      => $this->katModel->selectAllKategori(),
            'satuan'        => $this->satuanModel->selectAllSatuan(),
            'data_produk'   => $this->produkModel->selectAllProduk(),
        ];
        return view('user/edit', $data);
    }

    // update data user
    public function update($id)
    {
        $userDataLama = $this->userModel->selectAllUser(['id' => $id]);

        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if ($userDataLama['username'] == $username) {

            $rule_username = 'required';
        } else {

            $rule_username = 'required|trim|min_length[3]|is_unique[user.username]|max_length[10]';
        }
        if ($userDataLama['email'] == $email) {

            $rule_email = 'required';
        } else {

            $rule_email = 'required|trim|valid_email|is_unique[user.email]';
        }


        // set rules and validate
        $rules = [

            'nama'  => [
                'label'  => 'Nama User',
                'rules'   => 'required|trim|min_length[3]|max_length[30]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'max_length'  => '{field} maksimal 30 karakter'
                ]
            ],
            'username'  => [
                'label'  => 'Username',
                'rules'   => $rule_username,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'min_length'  => '{field} minimal 3 karakter',
                    'is_unique'   => '{field} sudah terdaftar ! pilih kombinasi {field} yang lain',
                    'max_length'  => '{field} maksimal 10 karakter'
                ]
            ],
            'email'  => [
                'label'  => 'Email',
                'rules'   => $rule_email,
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'valid_email'  => 'Format {field} tidak valid',
                    'is_unique'  => '{field} sudah terdaftar'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/user/edit/' . $this->request->getVar('id'))->withInput();
        }

        // insert to databse
        $passwordLama = $userDataLama['password'];

        $data =
            [
                'id'   => $id,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $passwordLama,
                'foto' => 'default.png',
                'level' => $this->request->getVar('level'),
                'alamat' => $this->request->getVar('alamat')
            ];

        // insert data to Database
        $this->userModel->saveUpdateData($data);

        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data User</strong> telah diupdate.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/user');
    }




    // delete method
    public function delete($id)
    {

        $this->userModel->delete(['id' => $id]);
        session()->setFlashdata('flash', '<div class="alert alert-success text-white alert-dismissible fade show p-2 px-3" role="alert">
        <strong>Data User</strong> telah dihapus.
        <span data-bs-dismiss="alert" aria-label="Close" class="cursor-pointer float-end fs-6"><i class="fa-solid fa-xmark"></i></span>
      </div>');
        return redirect()->to('/user');
    }
}
