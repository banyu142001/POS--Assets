<?php

namespace App\Models;

use CodeIgniter\Model;

class StokKeluarModel extends Model
{
    protected $table            = 'stok_keluar';
    protected $primaryKey       = 'id_stok_keluar';
    protected $allowedFields    = ['id_produk', 'id_supplier', 'id_user', 'type', 'detail', 'qty', 'tanggal'];
    protected $useTimestamps    = true;

    // select data Stok Masuk
    public function selectAllStokKeluar($id_stok_keluar = false)
    {

        if ($id_stok_keluar == false) {

            return $this->join('produk', 'stok_keluar.id_produk = produk.id_produk')
                ->join('supplier', 'stok_keluar.id_supplier = supplier.id_supplier', 'left')
                ->where('type', 'Keluar')
                ->orderBy('id_stok_keluar', 'DESC')
                ->findAll();
        }

        return $this->where(['id_stok_keluar' => $id_stok_keluar])->first();
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

    // hitung semua data stok keluar
    public function count_stok_keluar()
    {

        return $this->countAll();
    }
}
