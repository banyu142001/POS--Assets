<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StokKeluar extends BaseController
{

    public function index()
    {
        // load mode Stok Keluar
        $stokKeluarModel =  $this->loadModel('StokKeluarModel');

        $data = [
            'title'         => 'Stok Keluar',
            'breadcrumb'    => 'Stok Keluar',
            'data_stok_keluar' => $stokKeluarModel->selectAllStokKeluar(),
        ];
        return view('transaksi/stokkeluar/index', $data);
    }

    // tambah data stok masuk
    public function create()
    {
        // load model ProdukModel dan Supplier
        $produkModel =  $this->loadModel('ProdukModel');
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'           => 'Tambah Data Stok Keluar',
            'breadcrumb'      => 'Tambah Data Stok Keluar',
            'data_produk'     => $produkModel->selectAllProduk(),
            'data_supplier'   => $supplierModel->selectAllSupplier(),
        ];
        return view('transaksi/stokkeluar/create', $data);
    }

    // save data stok masuk
    public function save()
    {
        // load model ProdukModel dan Supplier
        $stokKeluarModel =  $this->loadModel('StokKeluarModel');
        $produkModel =  $this->loadModel('ProdukModel');

        $rules = [

            'kode_produk' => [

                'label'     => 'Kode Produk',
                'rules'     => 'required|trim',
                'errors'    => [
                    'required'      => 'Kode Produk harus diisi!'
                ]
            ],
        ];

        // validation rules
        if (!$this->validate($rules)) {

            return redirect()->to('/stokkeluar/create')->withInput();
        }

        // get data
        $data = [

            'id_produk'     => $this->request->getVar('id_produk'),
            'id_supplier'   => $this->request->getVar('id_supplier'),
            'id_user'       => session()->get('id'),
            'type'           => 'Keluar',
            'detail'        => $this->request->getVar('detail'),
            'detail'        => $this->request->getVar('detail'),
            'qty'           => $this->request->getVar('qty'),
            'tanggal'       => $this->request->getVar('tgl'),
        ];

        $stokKeluarModel->saveData($data);
        $produkModel->update_stok_keluar($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkan');
        return redirect()->to('/stokkeluar');
    }

    // delete data stok masuk
    public function delete($id_stok_keluar)
    {
        // load model ProdukModel dan Supplier
        $stokKeluarModel =  $this->loadModel('StokKeluarModel');
        $produkModel =  $this->loadModel('ProdukModel');

        $data_stok = $stokKeluarModel->selectAllStokKeluar(['id_stok_keluar' => $id_stok_keluar]);

        $data = [

            'qty'   => $data_stok['qty'],
            'id_produk'   => $data_stok['id_produk'],
        ];

        $produkModel->update_delete_stok_keluar($data);
        $stokKeluarModel->delete(['id_stok_keluar' => $id_stok_keluar]);

        session()->setFlashdata('flash', 'Data berhsil dihapus');

        return redirect()->to('/stokkeluar');
    }
}
