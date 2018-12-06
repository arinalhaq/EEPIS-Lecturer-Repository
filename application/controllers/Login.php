<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }
 
    public function index()
    {
        $this->load->view('login');
    }
 
    public function auth()
    {
        $id=htmlspecialchars($this->input->post('id', true), ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password', true), ENT_QUOTES);
 
        $cek_dosen=$this->dosen_model->auth_dosen($id, $password);
 
        if ($cek_dosen->num_rows() > 0) { //jika login sebagai dosen
            $data=$cek_dosen->row();
            $this->session->set_userdata('masuk', true);
            if ($data->ID_STATUS=='1') { //Akses admin
                $this->session->set_userdata('akses', '1');
                $this->session->set_userdata('ses_id', $data->ID_DOSEN);
                $this->session->set_userdata('ses_nama', $data->NAMA_DOSEN);
                redirect('admin/dashboard');
            } else { //akses dosen
                $this->session->set_userdata('akses', '2');
                $this->session->set_userdata('ses_id', $data->ID_DOSEN);
                $this->session->set_userdata('ses_nama', $data->NAMA_DOSEN);
                redirect('user/repositori');
            }
        } else {  // jika username dan password tidak ditemukan atau salah
            $url=base_url('login');
            echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect($url);
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
}
