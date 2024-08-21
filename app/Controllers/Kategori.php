<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{

    public function index()
    {
        // load model KategoriModel
        $kategoriModel  =  $this->loadModel('KategoriModel');

        $data = [
            'title'         => 'Kategori',
            'breadcrumb'    => 'Kategori',
            'kategori'      => $kategoriModel->selectAllKategori(),
        ];
        return view('kategori/index', $data);
    }

    // save kategori
    public function save()
    {
        // load model KategoriModel
        $kategoriModel  =  $this->loadModel('KategoriModel');

        // set rules and validate
        $rules = [

            'kategori'       => [
                'label'           => 'Nama Kategori',
                'rules'           => 'required|trim|max_length[100]|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'   => '{field} sudah ada',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/kategori')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_kategori' => $this->request->getVar('kategori'),

            ];

        // insert data to Database
        $kategoriModel->saveKategoriData($data);

        session()->setFlashdata('flash', 'Data berhasil ditambakan');

        return redirect()->to('/kategori');
    }

    // update data kategori
    public function update($id_kategori)
    {
        // load model KategoriModel
        $kategoriModel  =  $this->loadModel('KategoriModel');

        // set rules and validate
        $rules = [

            'kategori_update'       => [
                'label'             => 'Kategori',
                'rules'             => 'required|trim|max_length[100]|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required'      => '{field} harus diisi',
                    'max_length'    => '{field} maksimal 100 karakter',
                    'is_unique'   => '{field} sudah tersedia',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('flash_3', 'Perikasa kembali inputan anda! (Inputan tidak boleh kosong, Data inputan tidak boleh sama) ');
            return redirect()->to('/kategori')->withInput();
        }


        // get data from form input
        $data =
            [
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->request->getVar('kategori_update'),

            ];

        // insert data to Database
        $kategoriModel->saveUpdateData($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');

        return redirect()->to('/kategori');
    }


    // delete method
    public function delete($id_kategori)
    {
        // load model KategoriModel
        $kategoriModel  =  $this->loadModel('KategoriModel');

        $kategoriModel->delete(['id_kategori' => $id_kategori]);
        $errors = $kategoriModel->db->error();

        if ($errors['code'] != 0) {

            session()->setFlashdata('flash_2', 'Data tidak dapat dihapus (Data kategori ini sedang digunakan pada data master');

            return redirect()->to('/kategori');
        }

        session()->setFlashdata('flash', 'Data berhasil dihapus');

        return redirect()->to('/kategori');
    }
}
