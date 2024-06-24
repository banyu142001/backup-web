<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [

            'title'      => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'produk'     => $this->produkModel->count_produk(),
            'satuan'     => $this->satuanModel->count_satuan(),
            'kategori'   => $this->katModel->count_kategori(),
            'stok_masuk' => $this->stokMasukModel->count_stok_masuk(),
            'stok_keluar' => $this->stokKeluarModel->count_stok_keluar(),
            'produk_terlaris' => $this->penjualanModel->getProdukTerlaris(),

        ];
        return view('home/index', $data);
    }
}
