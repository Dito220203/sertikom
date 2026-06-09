<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
		$this->load->helper('url');
        $this->load->model('Stok_model');
    }

    public function index() {
        $data['barang'] = $this->Stok_model->get_semua_barang();
        $this->load->view('layout/header');
        $this->load->view('stok/view_opname', $data);
        $this->load->view('layout/footer');
    }

    public function proses_penyesuaian() {
        $data = [
            'id_barang'   => $this->input->post('id_barang'),
            'stok_sistem' => $this->input->post('stok_sistem'),
            'stok_fisik'  => $this->input->post('stok_fisik'),
            'selisih'     => $this->input->post('stok_fisik') - $this->input->post('stok_sistem'),
            'keterangan'  => $this->input->post('keterangan')
        ];
        $this->Stok_model->simpan_opname($data);
        $this->session->set_flashdata('pesan', 'Stok berhasil diperbarui!');
        redirect('stok');
    }
}
