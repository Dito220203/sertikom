<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
   // Ambil semua data transaksi utama bergabung dengan nama pelanggan
public function get_laporan_penjualan()
{
    $this->db->select('tb_penjualan.*, tb_pelanggan.nama_pelanggan');
    $this->db->from('tb_penjualan');
    $this->db->join('tb_pelanggan', 'tb_penjualan.id_pelanggan = tb_pelanggan.id_pelanggan', 'left');
    $this->db->order_by('tb_penjualan.tanggal_rekam', 'DESC');
    return $this->db->get()->result_array();
}

// Ambil detail barang berdasarkan nomor transaksi tertentu
public function get_detail_penjualan($no_transaksi)
{
    $this->db->select('tb_penjualan_detail.*, tb_barang.nama_barang');
    $this->db->from('tb_penjualan_detail');
    $this->db->join('tb_barang', 'tb_penjualan_detail.id_barang = tb_barang.id_barang', 'left');
    $this->db->where('tb_penjualan_detail.no_transaksi', $no_transaksi);
    return $this->db->get()->result_array();
}
}
