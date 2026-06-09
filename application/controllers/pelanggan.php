<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('Pelanggan_model');
    }

    public function index()
    {
		$this->load->view('layout/header');
        $data['pelanggan'] = $this->Pelanggan_model->get_all_pelanggan();
        $this->load->view('pelanggan/view_pelanggan', $data);
        $this->load->view('layout/footer');
    }

    public function tambah_pelanggan()
    {
        $this->load->view('layout/header');
        $this->load->view('pelanggan/view_tambah_pelanggan');
        $this->load->view('layout/footer');
    }

	public function simpan_pelanggan()
	{
		$data = [
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat')
		];

		if ($this->Pelanggan_model->insert($data)) {
			$this->session->set_flashdata('pesan', 'Data Pelanggan Berhasil Disimpan!');
			redirect('pelanggan');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal'); // Kirim kata kunci gagal
			redirect('pelanggan/tambah_pelanggan');
		}
	}

	public function edit_pelanggan($id)
	{
		$this->load->view('layout/header');
		$data['item'] = $this->Pelanggan_model->get_pelanggan_by_id($id);
		$this->load->view('pelanggan/view_edit_pelanggan', $data);
		$this->load->view('layout/footer');
	}

	public function simpan_edit_pelanggan()
	{
		$id = $this->input->post('id_pelanggan');
		$data = [
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat')
		];

		if ($this->Pelanggan_model->update($id, $data)) {
			$this->session->set_flashdata('pesan', 'Data Pelanggan Berhasil Diperbarui!');
			redirect('pelanggan');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal'); // Kirim kata kunci gagal
			redirect('pelanggan/edit_pelanggan/' . $id);
		}
	}

	public function hapus_pelanggan($id)
	{
		$this->db->delete('tb_pelanggan', ['id_pelanggan' => $id]);
		$this->session->set_flashdata('pesan', 'Data Pelanggan Berhasil Dihapus!');
		redirect('pelanggan');
	}
}
