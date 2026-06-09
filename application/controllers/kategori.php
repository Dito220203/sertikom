<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Kategori_model');
	}
	public function index()
	{
		$data['kategori'] = $this->Kategori_model->get_all_kategori();

		$this->load->view('layout/header');
		$this->load->view('kategori/view_kategori', $data); // Kirim $data
		$this->load->view('layout/footer');
	}
	public function tambah_kategori()
	{
		$this->load->view('layout/header');
		$this->load->view('kategori/view_tambah_kategori');
		$this->load->view('layout/footer');
	}
	public function simpan_kategori()
	{
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$data = [
			'kategori' => $kategori,
			'deskripsi' => $deskripsi,
			'dibuat' => date('Y-m-d H:i:s')
		];

		if ($this->Kategori_model->insert($data)) {
			$this->session->set_flashdata('pesan', 'Data Kategori Berhasil Disimpan!');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal menyimpan data ke database');
			redirect('kategori/tambah_kategori');
		}
	}
	public function edit_kategori($id)
	{
		$this->load->view('layout/header');
		$data = $this->Kategori_model->get_kategori_by_id($id);
		$this->load->view('kategori/view_edit_kategori', ['data' => $data]);
		$this->load->view('layout/footer');
	}
	public function simpan_edit_kategori()
	{
		$id = $this->input->post('id_kategori');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$data = [
			'kategori' => $kategori,
			'deskripsi' => $deskripsi,
			'dibuat' => date('Y-m-d H:i:s')
		];
		if ($this->Kategori_model->update($id, $data)) {
			$this->session->set_flashdata('pesan', 'Data Kategori Berhasil Diupdate!');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal mengupdate data ke database');
			redirect('kategori/edit_kategori/' . $id);
		}
	}
	public function hapus_kategori($id)
	{
		$this->Kategori_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Kategori Berhasil Dihapus!');
		redirect('kategori');
	}
}
