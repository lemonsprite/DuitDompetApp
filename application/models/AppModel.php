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


    public function getTransaksi($mode) { return $this->db->get_where('transaksi', array('ref' => $mode))->result_array(); }


    /**
     * Fungsi buat ngambil data transaksi dari database
     *
     * Mengambil data dari database berdasarkan mode yang diinput
     *
     * @param int $mode Jenis transaksi yang akan dipanggil datanya
     * @return array
     **/
    public function getTransaksiTanggal(int $mode = null, $tanggal)
    {
        $now = date('Y-m-d');
        
        $query = $this->db->query("SELECT sum(nominal) as saldo FROM transaksi WHERE ref = ? AND tanggal_transaksi = ?", array($mode,strval($tanggal)))->row_array();
        if($query['saldo'] == NULL)
            $query['saldo'] = 0;

        return $query['saldo'];
    }

    /**
     * Fungsi untuk mengambil Transaksi mingguan di database
     *
     * Mengambil data dari database berdasarkan mode yang diinput, dan akumulasi per minggu transaksi
     *
     * @param int $mode Jenis transaksi yang akan dipanggil datanya
     * @param int $minggu Hitungan mundur per minggu
     * 
     * @return array $saldo
     **/
    public function getTransaksiMinggu(int $mode, $minggu)
    {
        $today = $minggu - 1;
        $x = strtotime("-$minggu week 1 day");
        $y = strtotime("-$today week 1 day");
        
        $query = $this->db->query("SELECT sum(nominal) as saldomasuk FROM transaksi WHERE ref = ? AND tanggal_transaksi BETWEEN ? AND ?", array($mode, strval(date('Y-m-d',$x)), strval(date('Y-m-d',$y))))->row_array();
        if($query['saldomasuk'] == NULL)
            $query['saldomasuk'] = 0;

        return $query['saldomasuk'];
    }

    /**
     * Fungsi buat ngambil data transaksi dari database
     *
     * Mengambil data dari database berdasarkan mode yang diinput per bulan
     *
     * @param int $bulan Bulan record yang akan dicallback
     * @param int $tahun Tahun record yang akan dicallback
     * @param int $mode Mode transaksi
     * @return array
     **/
    public function getTransaksiBulanan($bulan = null, $tahun = null, $mode)
    {
        $akhir_bln = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
        $awal_bln = ($akhir_bln + 1) - $akhir_bln;

       
        $query = $this->db->query("SELECT sum(nominal) as saldo FROM transaksi WHERE ref = ? AND tanggal_transaksi BETWEEN ? AND ?", array($mode, strval(date('Y-m-').$awal_bln), strval(date('Y-m-').$akhir_bln)))->row_array();
        if($query['saldo'] == NULL)
            $query['saldo'] = 0;

        return $query['saldo'];

    }

    /**
     * Memanggil data saldo dari database
     *
     * Fungsi untuk mengambil data saldo dari tabel di database
     *
     * @return int
     **/
    public function getSaldo()
    {   
        $x = $this->db->query("SELECT sum(nominal) as pemasukan FROM transaksi WHERE ref = 1")->row_array();
        $y = $this->db->query("SELECT sum(nominal) as pengeluaran FROM transaksi WHERE ref = 2")->row_array();
        
        // Filter data
        if($y['pengeluaran'] == NULL)
            $y['pengeluaran'] = 0;
        else if($x['pemasukan'] == NULL)
            $y['pemasukan'] = 0;

        // Kalkulasi saldo transaksi
        $saldo = $x['pemasukan'] - $y['pengeluaran'];
        return $saldo;
    }


    public function updateTransaksi($data,$id) { $this->db->update('transaksi',$data,array('id_transaksi' => $id)); }
    public function deleteTransaksi($id) { $this->db->delete('transaksi', array('id_transaksi'=> $id)); }
    public function getSaldoTanggal($minggu)
    {
        $x = $this->db->query("SELECT sum(nominal) as pemasukan FROM transaksi WHERE ref = 1 AND tanggal_transaksi BETWEEN ")->row_array();
        $y = $this->db->query("SELECT sum(nominal) as pengeluaran FROM transaksi WHERE ref = 2")->row_array();
    }

    public function getUser($param)
    {
        return $this->db->query("SELECT * FROM user WHERE email = ? OR username = ?",array($param,$param))->row_array();
    }
    
    public function updateUser($data, $id)
    {
        $this->db->update('user', $data, array('id' => $id));
    }
}