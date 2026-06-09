<?php
class Pelanggan_model extends CI_Model {
    protected $table = 'tb_pelanggan';

	public function get_all_pelanggan() {
        return $this->db->get($this->table)->result_array();
    }

	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}

	public function get_pelanggan_by_id($id) {
		return $this->db->get_where($this->table, ['id_pelanggan' => $id])->row_array();
	}

	public function update($id, $data) {
		$this->db->where('id_pelanggan', $id);
		return $this->db->update($this->table, $data);
	}
}
