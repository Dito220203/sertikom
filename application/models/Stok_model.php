<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stok_model extends CI_Model {
    public function get_semua_barang() {
        return $this->db->get('tb_barang')->result_array();
    }

    public function simpan_opname($data) {
        // Simpan log ke tb_stok_opname
        $this->db->insert('tb_stok_opname', $data);
        
        // Update stok di tb_barang
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('tb_barang', ['stok' => $data['stok_fisik']]);
    }
}
