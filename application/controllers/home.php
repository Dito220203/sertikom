<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memastikan helper URL aktif untuk base_url()
        $this->load->helper('url');
    }

    // Ini untuk halaman Dashboard/Home
    public function index() {
        $this->load->view('layout/header');
        $this->load->view('view_home'); // Sesuaikan dengan nama file di views
        $this->load->view('layout/footer');
    }

   
}
