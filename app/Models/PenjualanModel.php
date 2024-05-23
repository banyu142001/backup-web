<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_penjualan';
    protected $allowedFields    = [];
    protected $useTimestamps = true;

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
}
