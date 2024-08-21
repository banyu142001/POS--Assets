<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Mike42\Escpos;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class Penjualan extends BaseController
{
    public function index(): string
    {

        // load model Penjualan, Produk, Customer dan Cart
        $penjualanModel = $this->loadModel('PenjualanModel');
        $produkModel = $this->loadModel('ProdukModel');
        $customerModel = $this->loadModel('CustomerModel');
        $cartModel = $this->loadModel('CartModel');

        $data = [

            'title'          => 'Penjualan',
            'breadcrumb'     => 'Penjualan',
            'invoice'        => $penjualanModel->generateInvoiceCode(),
            'data_produk'    => $produkModel->selectAllProduk(),
            'data_customer'  => $customerModel->selectAllCustomer(),
            'data_cart'     => $cartModel->getAllCart(),

        ];
        return view('transaksi/penjualan/index', $data);
    }

    // method simpan data transaksi penjualan
    public function save_payment()
    {
        // load model Penjualan, Cart
        $penjualanModel = $this->loadModel('PenjualanModel');
        $cartModel = $this->loadModel('CartModel');

        // ambil data yang dikirim dari ajax
        $invoice_code = $penjualanModel->generateInvoiceCode();

        $invoice        = $invoice_code;
        $id_customer    = $this->request->getVar('id_customer');
        $total_harga    = $this->request->getVar('sub_total');
        $diskon         = $this->request->getVar('diskon');
        $harga_bayar    = $this->request->getVar('grand_total');
        $cash           = $this->request->getVar('cash');
        $kembalian      = $this->request->getVar('kembalian');
        $nota           = $this->request->getVar('nota');
        $tanggal        = $this->request->getVar('tanggal');
        $id_user        = session()->get('id');

        // siapkan data unutk disimpan
        $data = [

            'invoice'       => $invoice,
            'id_customer'   => $id_customer,
            'total_harga'   => $total_harga,
            'diskon'        => $diskon,
            'harga_bayar'   => $harga_bayar,
            'cash'          => $cash,
            'kembalian'     => $kembalian,
            'nota'          => $nota,
            'tanggal'       => $tanggal,
            'id_user'       => $id_user,
        ];

        // simpan data ke dalam tabel penjualan
        $id_penjualan =  $penjualanModel->save_payment_sale($data);

        // ambil data dari tabel cart (agar dapat kita simpan kedalam tabel detai penjualan)
        $data_cart = $cartModel->getAllCart();
        $row = [];
        foreach ($data_cart as $cart) {

            array_push($row, [
                'id_penjualan_detail'   => $id_penjualan,
                'id_produk_detail'      => $cart['id_produk'],
                'harga_detail'          => $cart['harga_data_cart'],
                'qty_detail'            => $cart['qty_data_cart'],
                'diskon_detail'         => $cart['diskon_data_cart'],
                'total_detail'          => $cart['total_data_cart']
            ]);
        }

        $penjualanModel->save_detail_penjualan($row);


        if ($cartModel->db->affectedRows() > 0) {
            $cartModel->truncate();
            $params = ['success' => true, "id_penjualan" => $id_penjualan];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }


    //  method simpan data ke cart belanja
    public function save()
    {
        // load model Cart
        $cartModel = $this->loadModel('CartModel');

        $id_produk =  $this->request->getVar('id_produk');
        $harga = $this->request->getVar('harga_data_cart');
        $qty = $this->request->getVar('qty_data_cart');

        $data = [

            'id_produk' => $id_produk,
            'harga_data_cart' => $harga,
            'qty_data_cart' => $qty,
            'total_data_cart' => $harga * $qty,
            'id_user'   => session()->get('id')
        ];

        //  ambil data produk berdasarkan id_produk
        $data_cart = $cartModel->getAllCart(['cart.id_produk' => $id_produk]);

        if ($data_cart > 0) {

            // method update jumlah/qty jika produk sama
            $cartModel->update_cart_qty($data);
        } else {

            $cartModel->saveCartData($data);
        }


        if ($cartModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }
    // ---------------------------------

    // method laod data cart
    public function load_cart()
    {
        // load model Cart
        $cartModel = $this->loadModel('CartModel');

        $data = [
            'title' => '',
            'bread' => '',
            'data_cart'     => $cartModel->getAllCart(),
        ];
        return view('transaksi/penjualan/data_cart', $data);
    }
    // ---------------------------------

    // method hapus data dari cart belanja
    public function deleteCart()
    {
        // load model Cart
        $cartModel = $this->loadModel('CartModel');

        $id_cart =  $this->request->getVar('id_cart');

        $cartModel->delete(['id_cart' => $id_cart]);

        if ($cartModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }

        echo json_encode($params);
    }
    // ---------------------------------

    // method update data cart belanja
    public function update()
    {

        // load model Cart dan Penjualan
        $cartModel = $this->loadModel('CartModel');
        $penjualanModel = $this->loadModel('PenjualanModel');

        // ambil data yang dikirimkan melalui ajax
        $id_cart       = $this->request->getVar('id_cart');
        $harga_cart    = $this->request->getVar('harga_data_cart');
        $qty_cart      = $this->request->getVar('qty_data_cart');
        $diskon_cart   = $this->request->getVar('diskon_data_cart');
        $total         = $this->request->getVar('total_data_cart');

        // siapkan data unutk diinsert ke dalam tabel (cart)
        $data = [

            'id_cart' => $id_cart,
            'harga_data_cart' => $harga_cart,
            'qty_data_cart' => $qty_cart,
            'diskon_data_cart' => $diskon_cart,
            'total_data_cart' => $total
        ];

        $cartModel->saveUpdate($data);

        if ($penjualanModel->db->affectedRows() > 0) {

            $params = ['success' => true];
        } else {
            $params = ['success' => false];
        }
        echo json_encode($params);
    }

    public function cetak($id)
    {

        // Load model Penjualan dan Detail Penjualan
        $penjualanModel = $this->loadModel('PenjualanModel');
        $detailPenjualanModel = $this->loadModel('PenjualanDetailModel');

        // Ambil data penjualan dan detail penjualan
        $penjualan = $penjualanModel->getAllPenjualan(['id_penjualan' => $id]);
        $data_detail = $detailPenjualanModel->getDetailData(['id_penjualan_detail' => $id]);



        $profile = CapabilityProfile::load("simple");
        $connector = new WindowsPrintConnector("myPOS"); // share printer name
        $printer = new Printer($connector, $profile);

        // Format struk
        $printer->setEmphasis(true);
        $printer->text("myPOS Store\n");
        $printer->setEmphasis(false);
        $printer->text("Tanggal: " . date('d/m/y', strtotime($penjualan['tanggal'])) . " " . date('H:i', strtotime($penjualan['created_at'])) . "\n");
        $printer->text("No. Transaksi: " . $penjualan['invoice'] . "\n");
        $printer->text("Kasir: " . $penjualan['nama'] . "\n");
        $printer->text("Customer: " . ($penjualan['id_customer'] == 0 ? 'Umum' : $penjualan['nama_customer']) . "\n");
        $printer->text("------------------------------------------------\n");

        foreach ($data_detail as $detail) {
            $printer->text($detail['nama_produk'] . " x" . $detail['qty_detail'] . " Rp" . number_format($detail['harga_detail'], 0, ',', '.') . "\n");
            $printer->text("Total: Rp" . number_format(($detail['harga_detail'] - $detail['diskon_detail']) * $detail['qty_detail'], 0, ',', '.') . "\n");
        }

        foreach ($data_detail as $detail) {
            if ($detail['diskon_detail'] > 0) {
                $printer->text("Diskon Item: Rp" . number_format($detail['diskon_detail'], 0, ',', '.') . "\n");
            }
        }

        $printer->text("------------------------------------------------\n");
        $printer->text("Sub Total: Rp" . number_format($penjualan['total_harga'], 0, ',', '.') . "\n");
        $printer->text("Diskon Sale: Rp" . number_format($penjualan['diskon'], 0, ',', '.') . "\n");
        $printer->text("Grand Total: Rp" . number_format($penjualan['harga_bayar'], 0, ',', '.') . "\n");
        $printer->text("Cash: Rp" . number_format($penjualan['cash'], 0, ',', '.') . "\n");
        $printer->text("Kembalian: Rp" . number_format($penjualan['kembalian'], 0, ',', '.') . "\n");
        $printer->text("------------------------------------------------\n");
        $printer->text("-- Terima Kasih --\n");
        $printer->text("myPos Store\n");

        $printer->cut();
        $printer->close();

        return redirect()->to('/penjualan');
    }
}
