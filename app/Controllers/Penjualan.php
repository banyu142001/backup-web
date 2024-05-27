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
        $harga = $this->request->getVar('harga_data_cart');
        $qty = $this->request->getVar('qty_data_cart');

        $data = [

            'id_produk' => $id_produk,
            'harga_data_cart' => $harga,
            'qty_data_cart' => $qty,
            'total_data_cart' => $harga * $qty,
            'id_user'   => session()->get('id')
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

    // method update data cart belanja
    public function update()
    {

        // ambil yang dikirimkan melalui ajax
        $id_cart = $this->request->getVar('id_cart');
        $harga_cart = $this->request->getVar('harga_data_cart');
        $qty_cart = $this->request->getVar('qty_data_cart');
        $diskon_cart = $this->request->getVar('diskon_data_cart');
        $total = $this->request->getVar('total_data_cart');

        $data = [

            'id_cart' => $id_cart,
            'harga_data_cart' => $harga_cart,
            'qty_data_cart' => $qty_cart,
            'diskon_data_cart' => $diskon_cart,
            'total_data_cart' => $total
        ];

        $this->cartModel->saveUpdate($data);

        if ($this->penjualanModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }
        echo json_encode($params);
    }
}
