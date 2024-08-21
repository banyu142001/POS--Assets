<?php

namespace App\Models;

use CodeIgniter\Model;
use OCILob;

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

    // method megambil data (Penjualan, customer dan data user)

    public function getAllPenjualan($id_penjualan = false)
    {
        $id_user = session()->get('id');

        if ($id_penjualan == false) {

            return $this->join('customer', 'penjualan.id_customer = customer.id_customer', 'left')
                ->join('user', 'penjualan.id_user = user.id')
                ->orderBy('id_penjualan', 'DESC')->where(['id_user' => $id_user])
                ->findAll();
        }

        return $this->join('customer', 'penjualan.id_customer = customer.id_customer', 'left')
            ->join('user', 'penjualan.id_user = user.id')
            ->where(['id_penjualan' => $id_penjualan])->first();
    }

    // method menghitung produk terlaris

    public function getProdukTerlaris()
    {
        $builder = $this->db->table('detail_penjualan dp');
        $builder->select('dp.id_produk_detail, p.nama_produk, SUM(dp.qty_detail) AS total_jumlah');
        $builder->join('produk p', 'dp.id_produk_detail = p.id_produk');
        $builder->groupBy('dp.id_produk_detail');
        $builder->orderBy('total_jumlah', 'DESC');
        $builder->limit(5);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // jumlah penjualan
    public function count_penjualan()
    {

        return $this->countAll();
    }

    // Method untuk mendapatkan total penjualan
    public function getTotalPenjualan()
    {
        $builder = $this->db->table($this->table);
        $builder->selectSum('total_harga', 'total_penjualan');
        $query = $builder->get();

        return $query->getRow()->total_penjualan;
    }

    // Method untuk mendapatkan total penjualan hari ini
    public function getTotalPenjualanHariIni()
    {
        $builder = $this->db->table($this->table);
        $builder->selectSum('total_harga', 'total_penjualan');
        $builder->where('tanggal', date('Y-m-d')); // Filter untuk hari ini
        $query = $builder->get();
        return $query->getRow()->total_penjualan;
    }
}
