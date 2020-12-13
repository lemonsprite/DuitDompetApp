<?php

class AppModel extends CI_Model
{
    public function __construct() { $this->load->database('duitdompet'); }

    /**
     * Fungsi penambah transaksi ke database
     *
     * Menambah data transaksi ke tabel transaksi di database
     *
     * @param array $data Data array yang akan diinput ke dalam tabel
     * @return bool
     **/
    public function addTransaksi(array $data) { return $this->db->insert('transaksi', $data); }

    /**
     * Fungsi buat ngambil data transaksi dari database
     *
     * Mengambil data dari database berdasarkan mode yang diinput
     *
     * @param int $mode Jenis transaksi yang akan dipanggil datanya
     * @return array
     **/
    public function getTransaksi(int $mode = null)
    {
        
        switch($mode)
        {
            case 1:
                $query = $this->db->query("SELECT * FROM transaksi INNER JOIN kode_transaksi ON transaksi.ref = {$mode}");
                break;
            case 2:
                break;
        }
        return $query;
    }


}