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
            'kategori'      => $this->katModel->selectAllKategori(),
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
        session()->setFlashdata('flash', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert" ' . ALERT_SUCCESS . ' >
        <p style="font-size:14px" class="mb-0 d-inline" ><strong > ' . icon_success . ' Kategori Baru</strong> telah ditambahkan.</p>
        ' . icon_close . '
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
            session()->setFlashdata('flash_update_rule', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert"  ' . ALERT_DANGER . '  >
            <small>  ' . icon_warning . '<strong>Nama Kategori</strong> harus diisi !! lakukan edit kembali.</small>
            ' . icon_close . '
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
        session()->setFlashdata('flash_update', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert"   ' . ALERT_SUCCESS . ' >
        <strong>  ' . icon_success . ' Data Kategori</strong> telah diupdate.
        ' . icon_close . '
      </div>');
        return redirect()->to('/kategori');
    }


    // delete method
    public function delete($id_kategori)
    {

        $this->katModel->delete(['id_kategori' => $id_kategori]);
        $errors = $this->katModel->db->error();

        if ($errors['code'] != 0) {

            session()->setFlashdata('flash_del', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert"   ' . ALERT_DANGER . ' >
            <strong>  ' . icon_warning . ' Data Kategori tidak dapat dihapus </strong> (data ini sedang digunakan pada data master produk).
            ' . icon_close . '
          </div>');
            return redirect()->to('/kategori');
        }

        session()->setFlashdata('flash_del', '<div class="alert text-white alert-dismissible fade show p-2 px-3" role="alert"   ' . ALERT_SUCCESS . ' >
        <strong>  ' . icon_success . ' Data Kategori</strong> telah dihapus.
        ' . icon_close . '
      </div>');
        return redirect()->to('/kategori');
    }
}
