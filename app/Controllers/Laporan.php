<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{

    public function penjualan()
    {
        // load model Penjualan
        $penjualanModel = $this->loadModel('PenjualanModel');
        // $produkModel = $this->loadModel('ProdukModel');
        // $customerModel = $this->loadModel('CustomerModel');
        // $cartModel = $this->loadModel('CartModel');


        $data = [
            'title'                 => 'Laporan-Penjualan',
            'breadcrumb'            => 'laporan penjualan',
            'data_penjualan'        => $penjualanModel->getAllPenjualan(),
            'total_penjualan'       => $penjualanModel->getTotalPenjualan(),
        ];

        return view('laporan/penjualan', $data);
    }


    public function detail_penjualan($id_detail)
    {
        // load model Detail Penjualan
        $detailPenjualanModel = $this->loadModel('PenjualanDetailModel');

        $data = $detailPenjualanModel->getDetailData(['id_penjualan_detail' => $id_detail]);

        echo json_encode($data);
    }

    // method delete/hapus data laporan penjualan
    public function delete($id_penjualan)
    {
        // load model Penjualan
        $penjualanModel = $this->loadModel('PenjualanModel');

        $penjualanModel->delete(['id_penjualan' => $id_penjualan]);

        session()->setFlashdata('flash', 'Data berhasil dihapus');

        return redirect()->to('/laporan/penjualan');
    }
}
