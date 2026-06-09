<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->helper('url');
    }

    // Menampilkan halaman utama laporan
    public function index()
    {
        $data['laporan'] = $this->Penjualan_model->get_laporan_penjualan();

        $this->load->view('layout/header');
        $this->load->view('penjualan/view_laporan', $data); // Kita buat file view_laporan.php nanti
        $this->load->view('layout/footer');
    }

    // Mengambil data detail via AJAX untuk ditampilkan ke modal Bootstrap
    public function ambil_detail_ajax($no_transaksi)
    {
        $detail = $this->Penjualan_model->get_detail_penjualan($no_transaksi);
        echo json_encode($detail);
    }
}
