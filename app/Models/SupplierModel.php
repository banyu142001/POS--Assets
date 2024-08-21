<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $allowedFields    = ['nama_supplier', 'no_telephone', 'alamat', 'deskripsi'];

    // Dates
    protected $useTimestamps = true;


    // select dat auser
    public function selectAllSupplier($id_supplier = false)
    {

        if ($id_supplier == false) {

            return $this->findAll();
        }

        return $this->where(['id_supplier' => $id_supplier])->first();
    }

    // save data supplier
    public function saveSupplierData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateSupplierData($data)
    {

        return $this->save($data);
    }
}
