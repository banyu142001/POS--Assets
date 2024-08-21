<?php

namespace App\Models;

use CodeIgniter\Model;
use OCILob;

// Model detail penjualan
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

        return $this->join('produk', 'detail_penjualan.id_produk_detail = produk.id_produk')->where(['detail_penjualan.id_penjualan_detail' => $id_detail])->findAll();
    }

    public function count_detail_penjualan()
    {

        return $this->countAll();
    }
}
