<?php

defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("file_model");
        $this->load->library('form_validation');
        $this->load->helper(array('url','download'));
    }

    public function index()
    {
        $data["file"] = $this->file_model->getByIdDosen($this->session->userdata('ses_id'));
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->view("user/repository/file", $data);
    }

    public function add($id)
    {
        
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $validation = $this->form_validation;
        $validation->set_rules($file->rules());
        $data['id'] = $id;

        if ($validation->run()) {
            $filename = $file->save($id);
            $config['upload_path']="./upload/file/"; //path folder file upload
            $config['allowed_types']='gif|jpg|png|txt|pdf|docx'; //type file yang boleh di upload
            //$config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['file_name']            = $filename;
            //$config['overwrite']			= true;
         
            $this->load->library('upload', $config);
            /*$this->upload->do_upload('file');*/
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div>'.$error['error'].'</div>';
                //redirect('your_function_which_loads_the_view','refresh');
            }
                
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
        }

        $this->load->view("user/repository/file_form", $data);
        //$this->load->view("user/repository/file_form");
    }

    public function do_upload()
    {
        $this->file_model->save(1);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        //$data['dosen'] = $this->dosen_model->getAll();
        $this->load->view("user/repository/file_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect('user/repositori');
        }

        $config['upload_path']="./upload/file/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|txt|pdf|docx'; //type file yang boleh di upload
        //$config['encrypt_name'] = TRUE; //enkripsi file name upload
         
        $this->load->library('upload', $config);
       
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $validation = $this->form_validation;
        $validation->set_rules($file->rules());

        if ($validation->run()) {
            $file->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["file"] = $file->getById($id);
        $this->load->model('prodi_model');
        $data["prodi"] = $this->prodi_model->getAll();
        $this->load->model('status_model');
        $data['status'] = $this->status_model->getAll();
        if (!$data["file"]) {
            show_404();
        }
        
        $this->load->view("user/repository/file_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) {
            show_404();
        }
        
        if ($this->file_model->delete($id)) {
            redirect(site_url('user/repositori'));
        }
    }

    public function view($id = null)
    {
        if (!isset($id)) {
            redirect('user/berkas/berkas');
        }
       
        $berkas = $this->berkas_model;
        $data["berkas"] = $berkas->getById($id);
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getByIdBerkas($id);
        if (!$data["berkas"]) {
            show_404();
        }
        
        $this->load->view("user/repository/berkas_view", $data);
    }

    public function file($id = null)
    {
        if (!isset($id)) {
            redirect('user/berkas/berkas');
        }
       
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getById($id);
        if (!$data["file"]) {
            show_404();
        }
        
        $this->load->view("user/repository/file_view", $data);
    }

    public function download($id){
        force_download('upload/file/'.$id.'.txt', NULL);
        force_download('upload/file/'.$id.'.pdf', NULL);
        force_download('upload/file/'.$id.'.jpg', NULL);
        force_download('upload/file/'.$id.'.png', NULL);
        force_download('upload/file/'.$id.'.docx', NULL);
        force_download('upload/file/'.$id.'.gif', NULL);
        force_download('upload/file/'.$id.'.pptx', NULL);
        redirect('user/repositori/file/'.$id, 'refresh');
    }
}
