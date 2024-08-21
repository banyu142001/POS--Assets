<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table            = 'testimoni';
    protected $primaryKey       = 'id_test';
    protected $allowedFields    = ['id_user', 'ulasan', 'performa', 'desain'];
    // Date's
    protected $useTimestamps = true;

    // select data testimonial
    public function getAllTestimoni()
    {

        return $this->join('user', 'testimoni.id_user = user.id')->orderBy('id_test', 'DESC')
            ->findAll();
    }
}
