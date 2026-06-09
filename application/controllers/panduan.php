<?php
defined('BASEPATH') or exit('No direct script access allowed');

class panduan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Panduan_model');
	}
	public function index()
	{
		$this->load->model('Panduan_model');
		$data['panduan'] = $this->Panduan_model->get_all();
		$this->load->view('layout/header');
		$this->load->view('panduan/view_panduan', $data);
		$this->load->view('layout/footer');
	}

	public function tambah_panduan()
	{
		$this->load->view('layout/header');
		$this->load->view('panduan/tambah_panduan');
		$this->load->view('layout/footer');
	}

	public function simpan_panduan()
	{
		$judul = $this->input->post('judul');
		$langkahs = $this->input->post('langkah');
		$this->Panduan_model->simpan_panduan($judul, $langkahs);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Panduan berhasil disimpan!');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal menyimpan panduan. Coba lagi.');
		}
		redirect('panduan');
	}

	public function edit($id_panduan)
	{
		$data['panduan'] = $this->db->get_where('tb_panduan', ['id_panduan' => $id_panduan])->row_array();
		$data['panduan']['langkah'] = $this->db->get_where('tb_langkah_panduan', ['id_panduan' => $id_panduan])->result_array();

		$this->load->view('layout/header');
		$this->load->view('panduan/edit_panduan', $data);
		$this->load->view('layout/footer');
	}

	public function proses_edit($id_panduan)
	{
		$judul = $this->input->post('judul');
		$langkahs = $this->input->post('langkah');
		$update = $this->Panduan_model->update_panduan($id_panduan, $judul, $langkahs);

		if ($update) {
			$this->session->set_flashdata('pesan', 'Panduan berhasil diupdate!');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal mengupdate panduan.');
		}

		redirect('panduan');
	}

	public function hapus($id_panduan)
	{
		if ($this->Panduan_model->hapus_panduan($id_panduan)) {
			$this->session->set_flashdata('pesan', 'Panduan berhasil dihapus!');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal menghapus: Data tidak ditemukan.');
		}

		redirect('panduan');
	}
}
