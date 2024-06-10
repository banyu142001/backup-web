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

    // method simpan data transaksi penjualan
    public function save_payment()
    {
        // ambil data yang dikirim dari ajax
        $invoice_code = $this->penjualanModel->generateInvoiceCode();

        $invoice        = $invoice_code;
        $id_customer    = $this->request->getVar('id_customer');
        $total_harga    = $this->request->getVar('sub_total');
        $diskon         = $this->request->getVar('diskon');
        $harga_bayar    = $this->request->getVar('grand_total');
        $cash           = $this->request->getVar('cash');
        $kembalian      = $this->request->getVar('kembalian');
        $nota           = $this->request->getVar('nota');
        $tanggal        = $this->request->getVar('tanggal');
        $id_user        = session()->get('id');

        // siapkan data unutk disimpan
        $data = [

            'invoice'       => $invoice,
            'id_customer'   => $id_customer,
            'total_harga'   => $total_harga,
            'diskon'        => $diskon,
            'harga_bayar'   => $harga_bayar,
            'cash'          => $cash,
            'kembalian'     => $kembalian,
            'nota'          => $nota,
            'tanggal'       => $tanggal,
            'id_user'       => $id_user,
        ];

        // simpan data ke dalam tabel penjualan
        $id_penjualan =  $this->penjualanModel->save_payment_sale($data);

        // ambil data dari tabel cart (agar dapat kita simpan kedalam tabel detai penjualan)
        $data_cart = $this->cartModel->getAllCart();
        $row = [];
        foreach ($data_cart as $cart) {

            array_push($row, [
                'id_penjualan_detail'   => $id_penjualan,
                'id_produk_detail'      => $cart['id_produk'],
                'harga_detail'          => $cart['harga_data_cart'],
                'qty_detail'            => $cart['qty_data_cart'],
                'diskon_detail'         => $cart['diskon_data_cart'],
                'total_detail'          => $cart['total_data_cart']
            ]);
            $this->penjualanModel->save_detail_penjualan($row);
        }


        if ($this->cartModel->db->affectedRows() > 0) {
            $this->cartModel->truncate();
            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }




    //  method simpan data ke cart belanja
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
    // ---------------------------------

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
    // ---------------------------------

    // method hapus data dari cart belanja
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
    // ---------------------------------

    // method update data cart belanja
    public function update()
    {

        // ambil data yang dikirimkan melalui ajax
        $id_cart       = $this->request->getVar('id_cart');
        $harga_cart    = $this->request->getVar('harga_data_cart');
        $qty_cart      = $this->request->getVar('qty_data_cart');
        $diskon_cart   = $this->request->getVar('diskon_data_cart');
        $total         = $this->request->getVar('total_data_cart');

        // siapkan data unutk diinsert ke dalam tabel (cart)
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
    // ---------------------------------
}
