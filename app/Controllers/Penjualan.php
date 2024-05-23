<?php

namespace App\Controllers;

class Penjualan extends BaseController
{
    public function index(): string
    {
        $data = [

            'title'          => 'Penjualan',
            'breadcrumb'     => 'Penjualan',
            'invoice'        => $this->penjualanModel->generateInvoiceCode(),
            'data_produk'    => $this->produkModel->selectAllProduk(),
            'data_customer'  => $this->cusModel->selectAllCustomer(),
            'data_cart'     => $this->cartModel->getAllCart()


        ];
        return view('transaksi/penjualan/index', $data);
    }

    //  method save data ke cart belanja
    public function save()
    {

        $id_produk =  $this->request->getVar('id_produk');
        $harga = $this->request->getVar('harga');
        $qty = $this->request->getVar('qty');

        $data = [

            'id_produk' => $id_produk,
            'harga' => $harga,
            'qty' => $qty,
            'total' => $harga * $qty,
            'id_user'   => 1
        ];

        //  ambil data produk berdasarkan id_produk
        $data_cart = $this->cartModel->getAllCart(['cart.id_produk' => $id_produk]);

        if ($data_cart > 0) {

            // method update jumlah/qty jika produk sama
            $this->cartModel->update_cart_qty($data);
        } else {

            $this->cartModel->saveCartData($data);
        }


        if ($this->cartModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }

    // method laod data cart
    public function load_cart()
    {
        $data = [
            'title' => '',
            'bread' => '',
            'data_cart'     => $this->cartModel->getAllCart(),
        ];
        return view('transaksi/penjualan/data_cart', $data);
    }

    // delete data cart
    public function deleteCart()
    {

        $id_cart =  $this->request->getVar('id_cart');

        $this->cartModel->delete(['id_cart' => $id_cart]);

        if ($this->cartModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }
}
