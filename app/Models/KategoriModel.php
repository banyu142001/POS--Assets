<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'id_kategori';
    protected $allowedFields    = ['nama_kategori'];

    // Dates
    protected $useTimestamps = true;

    // select dat auser
    public function selectAllKategori($id_kategori = false)
    {

        if ($id_kategori == false) {

            return $this->findAll();
        }

        return $this->where(['id_kategori' => $id_kategori])->first();
    }

    // save data user from admin
    public function saveKategoriData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateData($data)
    {

        return $this->save($data);
    }
    // hitung semua data kategori
    public function count_kategori()
    {

        return $this->countAll();
    }
}
