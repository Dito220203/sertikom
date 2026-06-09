<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	protected $table = 'tb_barang';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_all_barang()
	{
		return $this->db->get($this->table)->result_array();
	}
	
	public function get_dashboard_stats() {
        return [
            'total_barang'   => $this->db->count_all('tb_barang'),
            'total_kategori' => $this->db->count_all('tb_kategori'),
            'stok_menipis'   => $this->db->where('stok <', 20)->where('stok >', 0)->count_all_results('tb_barang'),
            'stok_habis'     => $this->db->where('stok', 0)->count_all_results('tb_barang')
        ];
    }
	public function get_barang_by_id($id)
	{
		return $this->db->get_where($this->table, ['id_barang' => $id])->row_array();
	}
	public function update($id, $data)
	{
		$this->db->where('id_barang', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->delete($this->table);
	}
	public function get_all_kategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}
}
