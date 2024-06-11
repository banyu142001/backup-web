<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_penjualan';
    protected $allowedFields    = ['id_penjualan', 'invoice', 'id_customer', 'total_harga', 'diskon', 'harga_bayar', 'cash', 'kembalian', 'nota', 'tanggal', 'id_user'];
    protected $useTimestamps = true;

    // Kode Invoice
    public function generateInvoiceCode()
    {
        // Mendapatkan tanggal hari ini
        $today = date('ymd');

        // Mendapatkan penjualan terakhir dari database
        $last_sale = $this->orderBy('id_penjualan', 'DESC')->first();

        // Jika tidak ada penjualan sebelumnya, atur counter ke 0001
        if (!$last_sale) {
            $next_invoice_number = '0001';
        } else {
            // Mendapatkan tanggal penjualan terakhir
            $last_sale_date = substr($last_sale['invoice'], 2, 6);

            // Jika tanggal hari ini berbeda dengan tanggal penjualan terakhir,
            // atur counter ke 0001
            if ($today != $last_sale_date) {
                $next_invoice_number = '0001';
            } else {
                // Mendapatkan nomor urut terakhir dari database
                $last_invoice_number = intval(substr($last_sale['invoice'], -4));

                // Membuat format nomor urut dengan panjang 4 digit (0001, 0002, dst)
                $next_invoice_number = sprintf("%04d", $last_invoice_number + 1);
            }
        }

        // Gabungkan tanggal dan nomor urut untuk membuat kode invoice
        $invoice_code = 'MP' . $today . $next_invoice_number;

        return $invoice_code;
    }
    // ------------------------------------------------------

    // mentod Insert data ke tabel Penjualan
    public function save_payment_sale($data)
    {

        $this->save($data);

        return $this->insertID();
    }
    // method Insert data ke tabel detail_penjualan
    public function save_detail_penjualan($data)
    {
        $builder = $this->db->table('detail_penjualan');

        return $builder->insertBatch($data);
    }

    // method megambil data (customer dan data user)

    public function getAllPenjualan($id_penjualan = false)
    {

        if ($id_penjualan == false) {

            return $this->join('customer', 'penjualan.id_customer = customer.id_customer', 'left')
                ->join('user', 'penjualan.id_user = user.id')
                ->findAll();
        }

        return $this->join('customer', 'penjualan.id_customer = customer.id_customer', 'left')
            ->join('user', 'penjualan.id_user = user.id')
            ->where(['id_penjualan' => $id_penjualan])->first();
    }
}


// Model penjualan Detail
class PenjualanDetailModel extends Model
{
    protected $table            = 'detail_penjualan';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['id_detail', 'id_penjualan_detail', 'id_produk_detail', 'harga_detail', 'qty_detail', 'diskon_detail', 'total_detail'];
    protected $useTimestamps = true;


    // get alll detail data
    public function getDetailData($id_detail = false)
    {

        if ($id_detail == false) {


            return $this->join('produk', 'detail_penjualan.id_produk_detail = produk.id_produk')->findAll();
        }

        return $this->join('produk', 'detail_penjualan.id_produk_detail = produk.id_produk')->where(['detail_penjualan.id_penjualan_detail' => $id_detail])->first();
    }
}
