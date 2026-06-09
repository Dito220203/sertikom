<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
	protected $table = 'tb_kategori';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_all_kategori()
	{
		$this->db->select('tb_kategori.*, COUNT(tb_barang.id_barang) AS jumlah');
		$this->db->from('tb_kategori');
		$this->db->join('tb_barang', 'tb_barang.kategori = tb_kategori.kategori', 'left');
		$this->db->group_by('tb_kategori.id_kategori');

		return $this->db->get()->result_array();
	}
	public function get_kategori_by_id($id)
	{
		return $this->db->get_where($this->table, ['id_kategori' => $id])->row_array();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->delete($this->table);
	}
}
