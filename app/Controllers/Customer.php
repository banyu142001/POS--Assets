<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Customer extends BaseController
{


    public function index()
    {
        // load model CustomerModel
        $customerModel =  $this->loadModel('CustomerModel');

        $data = [
            'title'         => 'Customer',
            'breadcrumb'    => 'Customer',
            'customers'     => $customerModel->selectAllCustomer(),
        ];
        return view('customer/index', $data);
    }

    // tambah data supplier baru /  create new supplier data
    public function create()
    {

        $data = [
            'title'         => 'Tambah Data Customer',
            'breadcrumb'    => 'Customer / Tambah Data Customer',
        ];
        return view('customer/create', $data);
    }

    // save customer
    public function save()
    {
        // load model CustomerModel
        $customerModel =  $this->loadModel('CustomerModel');

        // set rules and validate
        $rules = [

            'nama_customer'       => [
                'label'           => 'Nama Customer',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'nomor_telephone'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/customer/create')->withInput();
        }

        // get data from form input
        $data =
            [
                'nama_customer' => $this->request->getVar('nama_customer'),
                'no_telephone'  => $this->request->getVar('nomor_telephone'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'alamat'        => $this->request->getVar('alamat'),
            ];

        // insert data to Database
        $customerModel->saveCustomerData($data);

        session()->setFlashdata('flash', 'Data berhasil ditambahkan');
        return redirect()->to('/customer');
    }

    // edit customer data
    public function edit($id_customer)
    {
        // load model CustomerModel
        $customerModel =  $this->loadModel('CustomerModel');

        $data = [
            'title'         => 'Edit Data Customer',
            'breadcrumb'    => 'Customer / Edit Data Customer',
            'customers'     => $customerModel->selectAllCustomer(['id_customer' => $id_customer]),
        ];
        return view('customer/edit', $data);
    }

    // update data customer
    public function update($id_customer)
    {
        // load model CustomerModel
        $customerModel =  $this->loadModel('CustomerModel');

        // set rules and validate
        $rules = [

            'nama_customer'       => [
                'label'           => 'Nama Customer',
                'rules'           => 'required|trim|max_length[100]',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'max_length'  => '{field} maksimal 100 karakter'
                ]
            ],
            'nomor_telephone'                => [
                'label'           => 'Nomor Telephone',
                'rules'           => 'required|trim',
                'errors' => [
                    'required'    => '{field} harus diisi',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/customer/edit/' . $this->request->getVar('id_customer'))->withInput();
        }

        // get data from form input
        $data =
            [
                'id_customer'   => $id_customer,
                'nama_customer' => $this->request->getVar('nama_customer'),
                'no_telephone'  => $this->request->getVar('nomor_telephone'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'alamat'        => $this->request->getVar('alamat'),
            ];

        // insert data to Database
        $customerModel->saveUpdateCustomerData($data);

        session()->setFlashdata('flash', 'Data berhasil diupdate');
        return redirect()->to('/customer');
    }


    // delete method
    public function delete($id_custumer)
    {
        // load model CustomerModel
        $customerModel =  $this->loadModel('CustomerModel');

        $customerModel->delete(['id_customer' => $id_custumer]);
        session()->setFlashdata('flash', 'Data berhasil dihapus');
        return redirect()->to('/customer');
    }
}
