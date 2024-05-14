<?php

namespace App\Models;

use CodeIgniter\Model;

class StokMasukModel extends Model
{
    protected $table            = 'stok_masuk';
    protected $primaryKey       = 'id_stok_masuk';
    protected $allowedFields    = [];
    protected $useTimestamps    = true;

    // select data Stok Masuk
    public function selectAllStokMasuk($id_stok_masuk = false)
    {

        if ($id_stok_masuk == false) {

            return $this->findAll();
        }

        return $this->where(['id_stok_masuk' => $id_stok_masuk])->first();
    }

    // save data supplier
    public function saveSupplierData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateSupplierData($data)
    {

        return $this->save($data);
    }
}
