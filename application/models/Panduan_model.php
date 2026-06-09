<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan_model extends CI_Model
{
	public function get_all()
	{
		$panduan = $this->db->get('tb_panduan')->result_array();
		foreach ($panduan as &$p) {
			$p['langkah'] = $this->db->get_where('tb_langkah_panduan', ['id_panduan' => $p['id_panduan']])->result_array();
		}
		return $panduan;
	}
	public function simpan_panduan($judul, $langkahs)
	{
		$this->db->insert('tb_panduan', ['judul' => $judul]);
		$id_panduan = $this->db->insert_id();
		foreach ($langkahs as $l) {
			if (!empty($l)) {
				$this->db->insert('tb_langkah_panduan', [
					'id_panduan' => $id_panduan,
					'deskripsi'  => $l
				]);
			}
		}

		return $id_panduan;
	}
	public function update_panduan($id_panduan, $judul, $langkahs)
	{
		$this->db->trans_start();

		$this->db->where('id_panduan', $id_panduan);
		$this->db->update('tb_panduan', ['judul' => $judul]);
		$this->db->where('id_panduan', $id_panduan);
		$this->db->delete('tb_langkah_panduan');

		foreach ($langkahs as $l) {
			if (!empty($l)) {
				$this->db->insert('tb_langkah_panduan', [
					'id_panduan' => $id_panduan,
					'deskripsi'  => $l
				]);
			}
		}

		$this->db->trans_complete();
		return $this->db->trans_status();
	}
	public function hapus_panduan($id_panduan)
	{
		$query = $this->db->get_where('tb_panduan', ['id_panduan' => $id_panduan]);
		if ($query->num_rows() > 0) {
			$this->db->delete('tb_langkah_panduan', ['id_panduan' => $id_panduan]);
			$this->db->delete('tb_panduan', ['id_panduan' => $id_panduan]);

			return true;
		}

		return false;
	}
}
