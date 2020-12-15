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
        // var_dump($this->AppModel->getTransaksi(1)->row_array());

        // echo print_r($this->db->get('kode_transaksi')->result_array());

        // var_dump($this->AppModel->getSaldo());

        // $m = date('m');
        // $y = date('Y');
        // $d=cal_days_in_month(CAL_GREGORIAN,$m,$y);
        // echo "There was $d days in $m-$y";

        // $minggu = 3;

        // $today = $minggu - 1;
        // $x = date('Y-m-d', strtotime("-$minggu week 1 day"));
        // $y = date('Y-m-d', strtotime("-$today week 1 day"));

        // echo "x : $x <br>";
        // echo "x : $y";


        // $ts = new DateTime('Asia/Jakarta');
        // echo date('Y-m-d G:i:s');

        // Logika login
        // $encrypted = password_hash(sha1('admin'),PASSWORD_DEFAULT);

        // if(password_verify(sha1('admin'), $encrypted))
        // {
        //     echo 'true';
        //     echo $encrypted;
        // } else {
        //     echo 'false';
        // }

        // $data = $this->AppModel->getUser('asd');

        // if(is_null($data))
        // {
        //     echo 'true';
        //     print_r($data);
        // } else {
        //     echo 'false';
        //     print_r($data);
        // }

        // var_dump($data);

        unset($_SESSION['user'], $_SESSION['is_logged']);
        echo $this->session->userdata('user');
        echo $this->session->userdata('is_logged');
    }
}