<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $allowedFields    = ['nama_satuan'];

    // Dates
    protected $useTimestamps = true;

    // select data Satuan
    public function selectAllSatuan($id_satuan = false)
    {

        if ($id_satuan == false) {

            return $this->findAll();
        }

        return $this->where(['id_satuan' => $id_satuan])->first();
    }

    // // save data user from admin
    // public function saveSatuanData($data)
    // {

    //     return $this->save($data);
    // }

    // // save update data from admin
    // public function saveUpdateData($data)
    // {

    //     return $this->save($data);
    // }

    // hitung semua data satuan
    public function count_satuan()
    {

        return $this->countAll();
    }
}
