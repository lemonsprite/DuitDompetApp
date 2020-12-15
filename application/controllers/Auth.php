<?php


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('is_logged') == true)
        {
            redirect('admin');
        }
    }

    // public function index() {  }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required', [
                'required' => 'Kolom username harus diisi'
        ]);
        

        // Eksekusi form validation
        if($this->form_validation->run())
        {
            $u = $this->input->post('username');
            $p = $this->input->post('password');

            $data = $this->AppModel->getUser($u);
            
            if(is_null($data))
            {
                $this->session->set_flashdata('pesan', '-- Username / Password Tidak Ada --');
                redirect('auth');
            } else {
                if(password_verify(sha1($p), $data['password']))
                {
                    $this->session->set_userdata(array(
                        'user' => $data['username'],
                        'is_logged' => true
                    ));

                    redirect('admin');
                } else {
                    $this->session->set_flashdata('pesan', '-- Username / Password Salah --');
                    redirect('auth');
                }
            }
        } else {
            $this->load->view('auth/login');
        }
    }


    public function lupa()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required', [
                'required' => 'Kolom username harus diisi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'matches[password2]', [
                'Matches' => 'Kolom Password tidak sama'
        ]);
        $this->form_validation->set_rules(
            'password2',
            'Password2',
            'matches[password1]', [
                'Matches' => 'Kolom Password tidak sama'
        ]);
        

        // Eksekusi form validation
        if($this->form_validation->run())
        {
            $u = $this->input->post('username');
            $p = $this->input->post('password1');

            $data = $this->AppModel->getUser($u);
            if($data != NULL)
            {
                $newPass = array(
                    'password' => password_hash(sha1($p), PASSWORD_DEFAULT)
                );
    
                $this->AppModel->updateUser($newPass, $data['id']);
                $this->session->set_flashdata('pesan', '-- Password sudah diubah --');
                redirect('auth/');
            } else {
                $this->session->set_flashdata('pesan', '-- User tidak ada! --');
                redirect('auth/lupa');
                // var_dump($data);
            }
        } else {
            $this->load->view('auth/lupa');
        }
    }

}