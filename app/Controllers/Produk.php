<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {

        // load model ProdukModel
        $produkModel =  $this->loadModel('ProdukModel');

        $data = [
            'title'         => 'Produk',
            'breadcrumb'    => 'Produk',
            'data_produk'   => $produkModel->selectAllProduk(),

        ];
        return view('produk/index', $data);
    }

    //create produk data
    public function create()
    {
        // load model KategoriModel dan SatuanModel
        $kategoriModel =  $this->loadModel('KategoriModel');
        $satuanModel  =  $this->loadModel('SatuanModel');

        $data = [
            'title'         => 'Tambah Data Produk',
            'breadcrumb'    => 'Produk / Tambah Data Produk',
            'kategori'      => $kategoriModel->selectAllKategori(),
            'satuan'        => $satuanModel->selectAllSatuan(),
        ];
        return view('produk/create', $data);
    }

    // insert data produk / save produk
    public function save()
    {
        // load model ProdukModel
        $produkModel =  $this->loadModel('ProdukModel');

        // set rules and validate
        $rules = [

            'kode_produk'       => [
                'label'           => 'Kode Produk',
                'rules'           => 'required|trim|is_unique[produk.kode_produk]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'nama_produk'       => [
                'label'           => 'Nama Produk',
                'rules'           => 'required|trim|is_unique[produk.nama_produk]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'kategori'       => [
                'label'           => 'Kategori',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
            'satuan'       => [
                'label'           => 'Satuan',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/produk/create')->withInput();
        }

        // get data from form input
        $data =
            [
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'id_kategori' => $this->request->getVar('kategori'),
                'id_satuan' => $this->request->getVar('satuan'),
                'harga' => $this->request->getVar('harga'),
                'stok'  => 0,
            ];

        // insert data to Database
        $produkModel->saveProdukData($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkan');
        return redirect()->to('/produk');
    }

    // edit data produk
    public function edit($id_produk)
    {
        // load model ProdukModel, KategoriModel dan SatuanModel
        $produkModel  =  $this->loadModel('ProdukModel');
        $kategoriModel =  $this->loadModel('KategoriModel');
        $satuanModel  =  $this->loadModel('SatuanModel');

        $data = [
            'title'         => 'Edit Data Produk',
            'breadcrumb'    => 'Produk / Edit Data Produk',
            'produk_update' => $produkModel->selectAllProduk(['id_produk' => $id_produk]),
            'kategori'      => $kategoriModel->selectAllKategori(),
            'satuan'        => $satuanModel->selectAllSatuan(),

        ];
        return view('produk/edit', $data);
    }

    // update data produk
    public function update($id_produk)
    {
        // load model ProdukModel
        $produkModel  =  $this->loadModel('ProdukModel');

        $data_produk = $produkModel->selectAllProduk(['id_produk' => $id_produk]);

        $kode_produk = $this->request->getVar('kode_produk');
        $nama_produk = $this->request->getVar('nama_produk');

        if ($data_produk['kode_produk'] == $kode_produk) {

            $rule_kode = 'required';
        } else {

            $rule_kode = 'required|trim|is_unique[produk.kode_produk]';
        }
        // ----

        if ($data_produk['nama_produk'] == $nama_produk) {

            $rule_nama = 'required';
        } else {

            $rule_nama = 'required|trim|is_unique[produk.nama_produk]';
        }
        // ----

        // set rules and validate
        $rules = [

            'kode_produk'       => [
                'label'           => 'Kode Produk',
                'rules'           => $rule_kode,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'nama_produk'       => [
                'label'           => 'Nama Produk',
                'rules'           => $rule_nama,
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter',
                    'is_unique'  => '{field} sudah tersedia',
                ]
            ],
            'kategori'       => [
                'label'           => 'Kategori',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
            'satuan'       => [
                'label'           => 'Satuan',
                'rules'           => 'required',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/produk/edit/' . $this->request->getVar('id_produk'))->withInput();
        }

        // get data from form input
        $data =
            [
                'id_produk'  => $id_produk,
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'id_kategori' => $this->request->getVar('kategori'),
                'id_satuan' => $this->request->getVar('satuan'),
                'harga' => $this->request->getVar('harga'),
            ];

        // insert data to Database
        $produkModel->saveUpdateProdukData($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');
        return redirect()->to('/produk');
    }


    // delete method
    public function delete($id_produk)
    {
        // load model ProdukModel
        $produkModel  =  $this->loadModel('ProdukModel');

        $produkModel->delete(['id_produk' => $id_produk]);

        $errors = $produkModel->db->error();
        if ($errors['code'] != 0) {

            session()->setFlashdata('flash_2', 'Data tidak dapat dihapus.(Data produk ini sedang digunakan pada data stok masuk)');
            return redirect()->to('/produk');
        }

        session()->setFlashdata('flash', 'Data berhasil dihapus');
        return redirect()->to('/produk');
    }
}
