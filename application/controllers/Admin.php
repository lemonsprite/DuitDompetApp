<?php

class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function viewTemplate($body, $data = null)
    {
        // Deklarasi variabel yang selalu ada di template
        $data['jenis_transaksi'] = $this->db->get('kode_transaksi')->result_array();


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




    public function simpan()
    {
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|min_length[6]', [
                'required' => 'Form Keterangan harus diisi...',
                'min_length' => 'Keterangan terlalu pendek...'
        ]);
        $this->form_validation->set_rules(
            'nominal',
            'Nominal',
            'required', [
                'required' => 'Form Nominal harus diisi...'
        ]);
        $this->form_validation->set_rules(
            'jenis_transaksi',
            'Jenis_Transaksi',
            'required', [
                'required' => 'Form Jenis Transaksi harus diisi...'
        ]);
        if($this->form_validation->run())
        {
            $data = array(
                'keterangan'        => $this->input->post('keterangan'),
                'tanggal_transaksi' => $this->input->post('tanggal'),
                'nominal'           => $this->input->post('nominal'),
                'ref'               => $this->input->post('jenis_transaksi')
            );
            $this->AppModel->addTransaksi($data);
            $respon['status'] = 'success';
            echo json_encode($respon);
        } else {
            $respon['status'] = 'error';
            $respon['pesan'] = 'Periksa kembali form inputan anda';
    
            echo json_encode($respon);
        }
        
    }
}