<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use tidy;

class Satuan extends BaseController
{

    public function index()
    {

        // load model SatuanModel
        $satuanModel = $this->loadModel('SatuanModel');

        $data = [
            'title'         => 'Satuan',
            'breadcrumb'    => 'Satuan',
            'data_satuan'        => $satuanModel->selectAllSatuan(),
        ];
        return view('satuan/index', $data);
    }

    // save satuan
    public function save()
    {
        // load model SatuanModel
        $satuanModel = $this->loadModel('SatuanModel');

        // set rules and validate
        $rules = [

            'satuan'       => [
                'label'           => 'Nama Satuan',
                'rules'           => 'required|trim|max_length[100]|is_unique[satuan.nama_satuan]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'   =>  '{field} sudah tersedia'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/satuan')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_satuan' => $this->request->getVar('satuan'),

            ];

        // insert data to Database
        $satuanModel->save($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkn');
        return redirect()->to('/satuan');
    }

    // update data satuan
    public function update($id_satuan)
    {
        // load model SatuanModel
        $satuanModel = $this->loadModel('SatuanModel');

        // set rules and validate
        $rules = [

            'satuan_update'       => [
                'label'             => 'Nama Satuan',
                'rules'             => 'required|trim|max_length[100]|is_unique[satuan.nama_satuan]',
                'errors' => [
                    'required'      => '{field} harus diisi',
                    'max_length'    => '{field} maksimal 100 karakter',
                    'is_unique'   =>  '{field} sudah tersedia',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('flash_3', 'Perikasa kembali inputan anda! (Inputan tidak boleh kosong, Data inputan tidak boleh sama) ');
            return redirect()->to('/satuan')->withInput();
        }


        // get data from form input
        $data =
            [
                'id_satuan'   => $id_satuan,
                'nama_satuan' => $this->request->getVar('satuan_update'),

            ];

        // insert data to Database
        $satuanModel->save($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');
        return redirect()->to('/satuan');
    }


    // delete method
    public function delete($id_satuan)
    {
        // load model SatuanModel
        $satuanModel = $this->loadModel('SatuanModel');

        $satuanModel->delete(['id_satuan' => $id_satuan]);
        $errors = $satuanModel->db->error();

        if ($errors['code'] != 0) {

            session()->setFlashdata('flash_2', 'Data tidak dapat dihapus. (Data satuan ini sedang digunakan pada data master produk).');
            return redirect()->to('/satuan');
        }

        session()->setFlashdata('flash', 'Data berhasil dihapus');
        return redirect()->to('/satuan');
    }
}
