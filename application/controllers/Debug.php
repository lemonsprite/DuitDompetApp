<?php

class Debug extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AppModel');
    }

    public function index()
    {
        var_dump($this->AppModel->getTransaksi(1)->row_array());

        echo print_r($this->db->get('kode_transaksi')->result_array());
    }
}