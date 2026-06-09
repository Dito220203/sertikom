<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_model extends CI_Model
{
    // Ambil data barang dari tb_barang
    public function get_all_barang()
    {
        return $this->db->get('tb_barang')->result_array();
    }

    // Ambil data pelanggan dari tb_pelanggan
    public function get_all_pelanggan()
    {
        return $this->db->get('tb_pelanggan')->result_array();
    }

    // Ambil nomor transaksi terakhir hari ini dari tb_penjualan
    public function get_nota_terakhir($hari_ini)
    {
        $this->db->like('no_transaksi', 'NOTA-' . $hari_ini, 'after');
        $this->db->order_by('no_transaksi', 'DESC');
        $this->db->limit(1);
        return $this->db->get('tb_penjualan')->row_array();
    }

    // Proses simpan transaksi ke tb_penjualan & tb_penjualan_detail + potong stok tb_barang
    public function simpan_transaksi_kasir($data_utama, $items)
    {
        $this->db->trans_start();

        // 1. Insert ke tabel utama
        $this->db->insert('tb_penjualan', $data_utama);

        // 2. Looping detail items
        foreach ($items as $item) {
            $data_detail = [
                'no_transaksi' => $data_utama['no_transaksi'],
                'id_barang'    => $item['id'],
                'harga_jual'   => $item['harga'],
                'qty'          => $item['qty'],
                'subtotal'     => $item['subtotal']
            ];
            $this->db->insert('tb_penjualan_detail', $data_detail);

            // 3. Potong stok di tb_barang otomatis
            $this->db->set('stok', 'stok - ' . (int)$item['qty'], FALSE);
            $this->db->where('id_barang', $item['id']);
            $this->db->update('tb_barang');
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}
