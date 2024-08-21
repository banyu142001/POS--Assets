<?php

namespace App\Controllers;

class Testimoni extends BaseController
{
    public function index(): string
    {
        $TestModel = $this->loadModel('TestModel');

        $data = [

            'title'          => 'User-Testing',
            'breadcrumb'     => 'Testimoni',
            'data_testimoni' => $TestModel->getAllTestimoni(),
        ];
        return view('testimoni/index', $data);
    }

    // create test
    public function create()
    {

        $data = [

            'title'      => 'Add-Testimoni',
            'breadcrumb' => 'Testimoni',
        ];
        return view('testimoni/create', $data);
    }

    // save test
    public function save()
    {

        $TestModel = $this->loadModel('TestModel');
        $id_user = session()->get('id');

        // set rules
        $rules = [

            'performa' => 'required|trim',
            'desain'   => 'required|trim',
            'ulasan'   => 'required|trim',
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('/testimoni/create')->withInput();
        }

        // get data 
        $ulasan = $this->request->getVar('ulasan');
        $performa = $this->request->getVar('performa');
        $desain = $this->request->getVar('desain');

        // set data
        $data = [

            'id_user' => $id_user,
            'ulasan' => $ulasan,
            'performa' => $performa,
            'desain' => $desain,
        ];

        // save data
        $TestModel->save($data);
        session()->setFlashdata('flash', 'Terima kasih atas ulasan anda');
        return redirect()->to('/testimoni/create');
    }

    // delete
    public function delete($id)
    {
        $TestModel = $this->loadModel('TestModel');

        $TestModel->delete(['id_test' => $id]);
        session()->setFlashdata('flash', 'Ulasan telah dihapus');
        return redirect()->to('/testimoni');
    }
}
