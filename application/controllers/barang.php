<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Barang_model');
	}
	public function index()
	{
		$data['barang'] = $this->Barang_model->get_all_barang();
		$data['stats']  = $this->Barang_model->get_dashboard_stats();
		$data['kategori_list'] = $this->Barang_model->get_all_kategori();
		$this->load->view('layout/header');
		$this->load->view('barang/view_barang', $data);
		$this->load->view('layout/footer');
	}

	public function tambah_barang()
	{
		$data['kategori_list'] = $this->Barang_model->get_all_kategori();
		$this->load->view('layout/header');
		$this->load->view('barang/view_tambah_barang', $data);
		$this->load->view('layout/footer');
	}

	public function simpan_barang()
	{

		$upload_path = FCPATH . 'uploads/barang/';

		// 2. Cek apakah folder sudah ada? Kalau belum, bikin otomatis!
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		// 3. Masukkan ke konfigurasi CI
		$config['upload_path']   = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = 2048;
		$config['encrypt_name']  = TRUE;

		$this->load->library('upload', $config);

		$foto_barang = ''; // Set default nama foto kosong

		// Cek apakah ada file foto yang diunggah
		if (!empty($_FILES['foto_barang']['name'])) {
			if ($this->upload->do_upload('foto_barang')) {
				$uploadData = $this->upload->data();
				$foto_barang = $uploadData['file_name']; // Ambil nama file yang berhasil diupload
			} else {
				// Jika upload gagal (misal ukuran kebesaran atau format salah)
				$this->session->set_flashdata('pesan', 'Gagal upload foto: ' . $this->upload->display_errors('', ''));
				redirect('barang/tambah_barang');
				return; // Hentikan eksekusi
			}
		}

		// 2. Ambil semua data dari form termasuk field yang baru
		$data = array(
			'kode_barang'   => $this->input->post('kode_barang'),
			'nama_barang'   => $this->input->post('nama_barang'),
			'kategori'      => $this->input->post('kategori'),
			'satuan'        => $this->input->post('satuan'),
			'harga_beli'    => $this->input->post('harga_beli'),
			'harga_jual'    => $this->input->post('harga_jual'),
			'stok'          => $this->input->post('stok'),

			// --- Field Baru ---
			'stok_minimum'  => $this->input->post('stok_minimum'),
			'berat_ukuran'  => $this->input->post('berat_ukuran'),
			'lokasi_simpan' => $this->input->post('lokasi_simpan'),
			'deskripsi'     => $this->input->post('deskripsi'),
			'foto_barang'   => $foto_barang
		);

		// 3. Simpan ke database
		if ($this->Barang_model->insert($data)) {
			$this->session->set_flashdata('pesan', 'Data Barang Berhasil Disimpan!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal menyimpan data ke database');
			redirect('barang/tambah_barang');
		}
	}

	public function edit_barang($id)
	{
		$data['item'] = $this->Barang_model->get_barang_by_id($id);
		$data['kategori_list'] = $this->Barang_model->get_all_kategori();
		$this->load->view('layout/header');
		$this->load->view('barang/view_edit_barang', $data);
		$this->load->view('layout/footer');
	}
	public function simpan_edit_barang()
	{
		$id = $this->input->post('id_barang');
		$data = array(
			'nama_barang'   => $this->input->post('nama_barang'),
			'kategori'      => $this->input->post('kategori'),
			'satuan'        => $this->input->post('satuan'),
			'harga_beli'    => $this->input->post('harga_beli'),
			'harga_jual'    => $this->input->post('harga_jual'),
			'stok'          => $this->input->post('stok'),
			'stok_minimum'  => $this->input->post('stok_minimum'),
			'berat_ukuran'  => $this->input->post('berat_ukuran'),
			'lokasi_simpan' => $this->input->post('lokasi_simpan'),
			'deskripsi'     => $this->input->post('deskripsi')
		);

		// 2. Logika Upload yang konsisten
		if (!empty($_FILES['foto_barang']['name'])) {
			$config['upload_path']   = FCPATH . 'uploads/barang/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = 2048;
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_barang')) {
				$uploadData = $this->upload->data();
				$data['foto_barang'] = $uploadData['file_name'];
			} else {
				$this->session->set_flashdata('pesan', 'Gagal upload: ' . $this->upload->display_errors());
				redirect('barang/edit_barang/' . $id);
				return;
			}
		}

		// 3. Update ke database
		if ($this->Barang_model->update($id, $data)) {
			$this->session->set_flashdata('pesan', 'Data Barang Berhasil Diupdate!');
			redirect('barang');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal mengupdate data');
			redirect('barang/edit_barang/' . $id);
		}
	}

	public function hapus_barang($id)
	{
		if ($this->Barang_model->delete($id)) {
			$this->session->set_flashdata('pesan', 'Data Barang Berhasil Dihapus!');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal');
		}
		redirect('barang');
	}
}
