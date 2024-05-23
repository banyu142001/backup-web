<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table            = 'cart';
    protected $primaryKey       = 'id_cart';
    protected $allowedFields    = ['id_produk', 'harga', 'qty', 'diskon', 'total', 'id_user'];
    protected $useTimestamps = true;

    // get alll data cart
    public function getAllCart($id_produk = false)
    {

        if ($id_produk == false) {

            return $this->join('produk', 'produk.id_produk = cart.id_produk')->findAll();
        }

        return $this->where(['id_produk' => $id_produk])->first();
    }

    // save data produk
    public function saveCartData($data)
    {

        return $this->save($data);
    }

    // method update data qty jika produk sama
    public function update_cart_qty($data)
    {

        $sql = "UPDATE cart SET harga = '$data[harga]', 
        qty = qty + '$data[qty]', total = '$data[harga]' * qty
        WHERE id_produk = '$data[id_produk]' ";

        return $this->db->query($sql);
    }
}
