<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Front extends BaseController
{
    public function index()
    {
        $data = [
            'auth_title' => 'Beranda',

        ];
        return view('front-home/index', $data);
    }

    public function tentang()
    {

        $data = [
            'auth_title' => 'Tentang',

        ];
        return view('front-home/tentang', $data);
    }
}
