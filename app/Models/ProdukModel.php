<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'id_kategori', 'id_satuan', 'harga', 'stok'];

    // Dates
    protected $useTimestamps = true;


    // select dat auser
    public function selectAllProduk($id_produk = false)
    {

        if ($id_produk == false) {

            return $this->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('satuan', 'satuan.id_satuan=produk.id_satuan')
                ->findAll();
        }

        return $this->where(['id_produk' => $id_produk])->first();
    }

    // save data supplier
    public function saveProdukData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateProdukData($data)
    {

        return $this->save($data);
    }
}
