<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $allowedFields    = ['kode_produk', 'nama_produk', 'id_kategori', 'id_satuan', 'harga', 'stok'];

    // Dates
    protected $useTimestamps = true;


    // select data produk
    public function selectAllProduk($id_produk = false)
    {

        if ($id_produk == false) {

            return $this->join('kategori', 'kategori.id_kategori=produk.id_kategori')
                ->join('satuan', 'satuan.id_satuan=produk.id_satuan')
                ->findAll();
        }

        return $this->where(['id_produk' => $id_produk])->first();
    }

    // save data produk
    public function saveProdukData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateProdukData($data)
    {

        return $this->save($data);
    }


    // stok masuk
    // update data stok from add stok data ( Tambah stok masuk)
    public function update_stok_masuk($data)
    {

        $id_produk = $data['id_produk'];
        $qty = $data['qty'];

        $query = "UPDATE produk SET stok = stok + '$qty' WHERE id_produk = '$id_produk' ";

        return $this->db->query($query);
    }

    // update data stok from add stok data ( Hapus  stok masuk)
    public function update_delete_stok_masuk($data)
    {

        $qty = $data['qty'];
        $id_produk = $data['id_produk'];

        $query = "UPDATE produk SET stok = stok - '$qty' WHERE id_produk = '$id_produk' ";

        return $this->db->query($query);
    }

    // stok keluar
    // update data stok from add stok data ( Tambah stok masuk)
    public function update_stok_keluar($data)
    {

        $id_produk = $data['id_produk'];
        $qty = $data['qty'];

        $query = "UPDATE produk SET stok = stok - '$qty' WHERE id_produk = '$id_produk' ";

        return $this->db->query($query);
    }
    // update data stok from add stok data ( Hapus  stok masuk)
    public function update_delete_stok_keluar($data)
    {

        $qty = $data['qty'];
        $id_produk = $data['id_produk'];

        $query = "UPDATE produk SET stok = stok + '$qty' WHERE id_produk = '$id_produk' ";

        return $this->db->query($query);
    }

    // hitung semua data produk
    public function count_produk()
    {

        return $this->countAll();
    }
}
