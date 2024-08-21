<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'username', 'email', 'password', 'foto', 'level', 'alamat'];
    // Dates
    protected $useTimestamps = true;

    // select dat auser
    public function selectAllUser($id = false)
    {

        if ($id == false) {

            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    // registrasi data user
    public function saveRegUserData($data)
    {

        return $this->save($data);
    }
    // save data user from admin
    public function saveUserData($data)
    {

        return $this->save($data);
    }

    // save update data from admin
    public function saveUpdateData($data)
    {

        return $this->save($data);
    }

    // hitung semua data user
    public function count_user()
    {

        return $this->countAll();
    }
}
