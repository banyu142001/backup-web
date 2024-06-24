<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // load model yang dibuthkan pada view home / dashboard
        $produkModel =  $this->loadModel('ProdukModel');
        $satuanModel =  $this->loadModel('SatuanModel');
        $kategoriModel =  $this->loadModel('KategoriModel');
        $stokMasukModel =  $this->loadModel('StokMasukModel');
        $stokKeluarModel =  $this->loadModel('StokKeluarModel');
        $penjualanModel =  $this->loadModel('PenjualanModel');


        $data = [

            'title'      => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'produk'     => $produkModel->count_produk(),
            'satuan'     => $satuanModel->count_satuan(),
            'kategori'   => $kategoriModel->count_kategori(),
            'stok_masuk' => $stokMasukModel->count_stok_masuk(),
            'stok_keluar' => $stokKeluarModel->count_stok_keluar(),
            'produk_terlaris' => $penjualanModel->getProdukTerlaris(),

        ];
        return view('home/index', $data);
    }
}
