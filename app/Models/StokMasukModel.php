<?php

namespace App\Models;

use CodeIgniter\Model;

class StokMasukModel extends Model
{
    protected $table            = 'stok_masuk';
    protected $primaryKey       = 'id_stok_masuk';
    protected $allowedFields    = ['id_produk', 'id_supplier', 'id_user', 'type', 'detail', 'qty', 'tanggal'];
    protected $useTimestamps    = true;

    // select data Stok Masuk
    public function selectAllStokMasuk($id_stok_masuk = false)
    {

        if ($id_stok_masuk == false) {

            return $this->join('produk', 'stok_masuk.id_produk = produk.id_produk')
                ->join('supplier', 'stok_masuk.id_supplier = supplier.id_supplier', 'left')
                ->where('type', 'Masuk')
                ->orderBy('id_stok_masuk', 'DESC')
                ->findAll();
        }

        return $this->where(['id_stok_masuk' => $id_stok_masuk])->first();
    }

    // save data stok masuk
    public function saveData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateSupplierData($data)
    {

        return $this->save($data);
    }

    // hitung semua data stok masuk
    public function count_stok_masuk()
    {

        return $this->countAll();
    }
}
