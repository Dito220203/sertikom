<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kasir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load model dan helper yang dibutuhkan
		$this->load->model('Kasir_model');
		$this->load->helper('url');
	}

	public function index()
	{
		// Ambil data dari model
		$data['barang']    = $this->Kasir_model->get_all_barang();
		$data['pelanggan'] = $this->Kasir_model->get_all_pelanggan();

		// Logika pembuatan nomor transaksi otomatis
		$hari_ini  = date('Ymd');
		$terakhir  = $this->Kasir_model->get_nota_terakhir($hari_ini);

		if ($terakhir) {
			$no_urut_terakhir = substr($terakhir['no_transaksi'], -4);
			$no_urut_baru     = sprintf('%04d', intval($no_urut_terakhir) + 1);
		} else {
			$no_urut_baru     = '0001';
		}

		$data['no_transaksi_otomatis'] = $hari_ini . $no_urut_baru;

		$this->load->view('layout/header');
		$this->load->view('kasir/view_kasir', $data);
		$this->load->view('layout/footer');
	}

	public function simpan_transaksi()
	{
		// Tangkap data JSON dari AJAX
		$json_data = file_get_contents('php://input');
		$request   = json_decode($json_data, true);

		if ($request) {
			// Susun data utama transaksi
			$data_utama = [
				'no_transaksi'   => $request['no_transaksi'],
				'id_pelanggan'   => $request['id_pelanggan'],
				'total_harga'    => $request['total_harga'],
				'tanggal_rekam'  => date('Y-m-d H:i:s')
			];

			$items = $request['items'];

			// Panggil fungsi simpan yang ada di Model
			$proses_simpan = $this->Kasir_model->simpan_transaksi_kasir($data_utama, $items);

			if ($proses_simpan === FALSE) {
				echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan transaksi ke database.']);
			} else {
				echo json_encode(['status' => 'success', 'message' => 'Transaksi Berhasil Disimpan!']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data transaksi kosong atau tidak valid.']);
		}
	}
}
