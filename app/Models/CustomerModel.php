<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer';
    protected $primaryKey       = 'id_customer';
    protected $allowedFields    = ['nama_customer', 'jenis_kelamin', 'no_telephone', 'alamat'];

    // Dates
    protected $useTimestamps = true;


    // select dat auser
    public function selectAllCustomer($id_customer = false)
    {

        if ($id_customer == false) {

            return $this->findAll();
        }

        return $this->where(['id_customer' => $id_customer])->first();
    }

    // save data custommer
    public function saveCustomerData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateCustomerData($data)
    {

        return $this->save($data);
    }
}
