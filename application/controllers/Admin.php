<?php

class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('is_logged') == false)
        {
            redirect('auth');
        }

    }
    public function viewTemplate($body, $data = null)
    {
        // Deklarasi variabel yang selalu ada di template
        $data['jenis_transaksi'] = $this->db->get('kode_transaksi')->result_array();
        $data['user'] = $this->session->user;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view($body, $data);
        $this->load->view('templates/footer', $data);
    }

    public function index()
    {
        $data = array(
            'judul' => 'Dashboard',
            'saldo' => $this->AppModel->getSaldo(),
            'pengeluaran_harini' => $this->AppModel->getTransaksiTanggal(2, date('Y-m-d')),
            'pemasukan_bulani' => $this->AppModel->getTransaksiBulanan(date('m'), date('Y'), 1),
            'pengeluaran_bulani' => $this->AppModel->getTransaksiBulanan(date('m'), date('Y'), 2)
        );
        $this->viewTemplate('admin/dashboard', $data);
    }

    public function trans($laman = null)
    {
        switch($laman)
        {
            case "masuk":
                $data['judul'] = 'Transaksi Masuk';
                $data['transaksi'] = $this->AppModel->getTransaksi(1);
                $this->viewTemplate('admin/trans_masuk', $data);
                break;
            case "keluar":
                $data['judul'] = 'Transaksi Keluar';
                $data['transaksi'] = $this->AppModel->getTransaksi(2);
                $this->viewTemplate('admin/trans_keluar', $data);
                break;
            default:
                $data['judul'] = 'Transaksi Masuk';
                $data['transaksi'] = $this->AppModel->getTransaksi(1);
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


    public function ubah()
    {
        $id = $this->uri->segment(3);
        $data = array(
            'judul' => 'Ubah Data',
            'curr_trans' => $this->db->get_where('transaksi', array('id_transaksi' => $id))->row_array()
        );
        $this->viewTemplate('admin/ubah_transaksi', $data);
        // echo json_encode($this->db->get_where('transaksi', array('id_transaksi' => $id))->row_array());
    }

    public function update($kode = null)
    {
        $ts = new DateTime();
        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_transaksi' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'ref' => $this->input->post('jenis_transaksi'),
            'updated' => date('Y-m-d H:i:s')
        );
        $this->AppModel->updateTransaksi($data, $this->input->post('id'));
        if( $kode == 2)
            redirect('admin/trans/keluar');
        else
            redirect('admin/trans/masuk');
    }
    public function hapus() 
    { 
        json_encode($this->AppModel->deleteTransaksi($this->input->post('id')));
        // echo json_encode('success');
    }

    public function logout()
    {
        unset($_SESSION['user'],$_SESSION['is_logged']);
        redirect('auth');
    }




}