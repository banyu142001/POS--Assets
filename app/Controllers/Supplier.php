<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use CodeIgniter\HTTP\ResponseInterface;

class Supplier extends BaseController
{

    public function index()
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'         => 'Supplier',
            'breadcrumb'    => 'Supplier',
            'suppliers'     => $supplierModel->selectAllSupplier()
        ];
        return view('supplier/index', $data);
    }

    // create new supplier data / tambah data supplier baru
    public function create()
    {

        $data = [
            'title'         => 'Tambah Data Supplier',
            'breadcrumb'    => 'Supplier / Tambah Data Supplier',
        ];
        return view('supplier/create', $data);
    }

    // save new suppliers data / simpan data baru supplier
    public function save()
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        // set rules and validate
        $rules = [

            'nama_supplier'       => [
                'label'           => 'Nama Supplier',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'telp'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/supplier/create')->withInput();
        }

        // prepare data
        $data =
            [
                'nama_supplier' => $this->request->getVar('nama_supplier'),
                'no_telephone'  => $this->request->getVar('telp'),
                'alamat'        => $this->request->getVar('alamat'),
                'deskripsi'     => $this->request->getVar('desc'),

            ];

        // insert data to Database
        $supplierModel->saveSupplierData($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkan');
        return redirect()->to('/supplier');
    }

    // Edit suppliers data / edit data supplier
    public function edit($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $data = [
            'title'         => 'Edit Data Supplier',
            'breadcrumb'    => 'Supplier / Edit Data Supplier',
            'suppliers'     =>  $supplierModel->selectAllSupplier(['id_supplier' => $id_supplier]),
        ];
        return view('supplier/edit', $data);
    }

    // update data supplier
    public function update($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        // set rules and validate
        $rules = [

            'nama_supplier'       => [
                'label'           => 'Nama Supplier',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'telp'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('/supplier/edit/' . $this->request->getVar('id_supplier'))->withInput();
        }

        // get and prepare data
        $data =
            [
                'id_supplier'   => $id_supplier,
                'nama_supplier' => $this->request->getVar('nama_supplier'),
                'no_telephone'  => $this->request->getVar('telp'),
                'alamat'        => $this->request->getVar('alamat'),
                'deskripsi'     => $this->request->getVar('desc'),

            ];

        // insert data to Database
        $supplierModel->saveUpdateSupplierData($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');
        return redirect()->to('/supplier');
    }


    //delete supplier / hapus data supllier
    public function delete($id_supplier)
    {
        // load model SupplierModel
        $supplierModel =  $this->loadModel('SupplierModel');

        $supplierModel->delete(['id_supplier' => $id_supplier]);
        $errors = $supplierModel->db->error();

        if ($errors['code'] != 0) {
            session()->setFlashdata('flash_2', 'Data tidak dapat dihapus.(Data supplier ini sedang digunakan pada data stok masuk)');
            return redirect()->to('/supplier');
        }

        session()->setFlashdata('flash', 'Data berhasil dihapus');
        return redirect()->to('/supplier');
    }
}
