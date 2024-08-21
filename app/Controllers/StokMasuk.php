<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StokMasuk extends BaseController
{

    public function index()
    {
        // load model Stok Masuk
        $stokMasukModel = $this->loadModel('StokMasukModel');

        $data = [
            'title'         => 'Stok Masuk',
            'breadcrumb'    => 'Stok Masuk',
            'data_stok_masuk' => $stokMasukModel->selectAllStokMasuk(),
        ];
        return view('transaksi/stokmasuk/index', $data);
    }

    // tambah data stok masuk
    public function create()
    {
        // load model Produk dan Supplier
        $produkModel =  $this->loadModel('ProdukModel');
        $supplierModel =  $this->loadModel('SupplierModel');



        $data = [
            'title'           => 'Tambah Data Stok Masuk',
            'breadcrumb'      => 'Tambah Data Stok Masuk',
            'data_produk'     => $produkModel->selectAllProduk(),
            'data_supplier'   => $supplierModel->selectAllSupplier(),
        ];
        return view('transaksi/stokmasuk/create', $data);
    }

    // save data stok masuk
    public function save()
    {

        // load model Produk dan Supplier
        $stokMasukModel = $this->loadModel('StokMasukModel');
        $produkModel =  $this->loadModel('ProdukModel');


        $rules = [

            'kode_produk' => [
                'label'     => 'Kode Produk',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Kode Produk harus diisi!'
                ]
            ],
            'id_supplier' => [
                'label'     => 'Supplier',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Pilih Supplier terlebih dahulu!'
                ]
            ],
        ];

        // validation rules
        if (!$this->validate($rules)) {

            return redirect()->to('/stokmasuk/create')->withInput();
        }

        // get data
        $data = [

            'id_produk'     => $this->request->getVar('id_produk'),
            'id_supplier'   => $this->request->getVar('id_supplier'),
            'id_user'       => session()->get('id'),
            'type'           => 'Masuk',
            'detail'        => $this->request->getVar('detail'),
            'detail'        => $this->request->getVar('detail'),
            'qty'           => $this->request->getVar('qty'),
            'tanggal'       => $this->request->getVar('tgl'),
        ];

        // load model Stok Masuk dan Produk
        $stokMasukModel->saveData($data);
        $produkModel->update_stok_masuk($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkan');
        return redirect()->to('/stokmasuk');
    }

    // delete data stok masuk
    public function delete($id_stok_masuk)
    {
        // load model Stok Masuk
        $stokMasukModel = $this->loadModel('StokMasukModel');
        $produkModel =  $this->loadModel('ProdukModel');


        $data_stok = $stokMasukModel->selectAllStokMasuk(['id_stok_masuk' => $id_stok_masuk]);

        $data = [

            'qty'   => $data_stok['qty'],
            'id_produk'   => $data_stok['id_produk'],
        ];

        $produkModel->update_delete_stok_masuk($data);
        $stokMasukModel->delete(['id_stok_masuk' => $id_stok_masuk]);

        session()->setFlashdata('flash', 'Data berhasil dihapus');

        return redirect()->to('/stokmasuk');
    }
}
