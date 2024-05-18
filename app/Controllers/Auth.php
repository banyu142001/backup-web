<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'auth_title' => 'myPos - Login',

        ];
        return view('auth/index', $data);
    }

    // Login method
    public function login()
    {
        // set rules and validate
        $rules = [

            'username'  => [
                'label'  => 'Username',
                'rules'   => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
            'password'  => [
                'label'  => 'Password',
                'rules'   => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/auth')->withInput();
        }

        // get username & password
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $userData  = $this->authModel->userDataAuth($username);
        // check akun user
        if ($userData) {

            // cek password
            if (password_verify($password, $userData['password'])) {

                // set session & redirect ke beranda
                $login_session = [

                    'logged_in'   => true,
                    'id'          => $userData['id'],
                    'nama'        => $userData['nama'],
                    'email'       => $userData['email'],
                    'level'       => $userData['level'],
                    'foto'       => $userData['foto'],
                ];

                session()->set($login_session);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('flash', '<div class="alert p-0 py-2 px-2 alert-dismissible text-white" role="alert" ' . ALERT_DANGER . ' >
                <span class="text-sm">' . icon_warning . 'Username / Password tidak sesuai!</span>
                ' . icon_close . '
                </div>');
                return redirect()->to('/auth');
            }
        } else {

            session()->setFlashdata('flash', '<div class="alert p-0 py-2 px-2 alert-dismissible text-white" role="alert" ' . ALERT_DANGER . ' ">
                <span class="text-sm">' . icon_warning . ' Data user tidak ditemukan!</span>
                ' . icon_close . '
                </div>');
            return redirect()->to('/auth');
        }
    }


    // Register Method
    public function register()
    {
        $data = [
            'auth_title' => 'myPos - Register',

        ];
        return view('auth/register', $data);
    }

    public function saveRegister()
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
            return redirect()->to('/auth/register')->withInput();
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
                'level' => 2,
                'alamat' => $this->request->getVar('alamat')
            ];

        // insert data to Database
        $this->userModel->saveRegUserData($data);


        session()->setFlashdata('flash', '<div class="alert p-0 py-2 px-2 alert-dismissible text-white" role="alert" ' . ALERT_SUCCESS . ' >
        <span class="text-sm">👌Registrasi suksess ! silahkan login </span>
        ' . icon_close . '
        </div>');
        return redirect()->to('/auth/register');
    }

    // Lgout method
    public function logout()
    {

        session()->remove('logged_in');
        session()->remove('id');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto');


        session()->setFlashdata('flash', '<div class="alert p-0 py-2 px-2 alert-dismissible text-white" role="alert" ' . ALERT_SUCCESS . ' >
        <span class="text-sm">Anda berhasil logout ! se you 👋👋</span>
          ' . icon_close . '
        </div>');

        return redirect()->to('/auth');
    }
}
