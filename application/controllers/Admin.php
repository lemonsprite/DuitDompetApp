<?php

class Admin extends CI_Controller
{
    public function viewTemplate($body, $data = null)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view($body, $data);
        $this->load->view('templates/footer', $data);
    }

    public function index()
    {
        $data = array(
            'judul' => 'Dashboard'
        );
        $this->viewTemplate('admin/dashboard', $data);
    }

    public function trans($laman)
    {
        switch($laman)
        {
            case "masuk":
                $data['judul'] = 'Transaksi Masuk';
                $this->viewTemplate('admin/trans_masuk', $data);
                break;
            case "keluar":
                $data['judul'] = 'Transaksi Keluar';
                $this->viewTemplate('admin/trans_keluar', $data);
                break;
            default:
                $data['judul'] = 'Transaksi Masuk';
                $this->viewTemplate('admin/trans_masuk', $data);
                break;
        }
    }

    public function tentang() { $this->viewTemplate('admin/tentang', array('judul' => 'Tentang')); }
}