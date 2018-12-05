<?php

defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("file_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["file"] = $this->file_model->getByIdDosen($this->session->userdata('ses_id'));
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->view("admin/repository/file", $data);
    }

    public function add($id)
    {
        $config['upload_path']="./upload/file/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|txt|pdf|docx'; //type file yang boleh di upload
        //$config['encrypt_name'] = TRUE; //enkripsi file name upload
         
        $this->load->library('upload',$config);
        
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $validation = $this->form_validation;
        $validation->set_rules($file->rules());
        $data['id'] = $id;

        if ($validation->run()) {
            $file->save($id);
            $this->upload->do_upload('file');
                
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }else{}
        

        $this->load->view("admin/repository/file_form", $data);
        //$this->load->view("admin/repository/file_form");
    }

    public function do_upload()
    {
        $this->file_model->save(1);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        //$data['dosen'] = $this->dosen_model->getAll();
        $this->load->view("admin/repository/file_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            redirect('admin/repositori');
        }
       
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $data['kategori'] = $this->kategori_model->getAll();
        $data['dosen'] = $this->dosen_model->getAll();
        $data['jenis_berkas'] = $this->jenis_berkas_model->getAll();
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
        
        $this->load->view("admin/repository/file_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) {
            show_404();
        }
        
        if ($this->_model->delete($id)) {
            redirect(site_url('admin/repositori'));
        }
    }

    public function view($id = null)
    {
        if (!isset($id)) {
            redirect('admin/berkas/berkas');
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
        
        $this->load->view("admin/repository/berkas_view", $data);
    }

    public function file($id = null)
    {
        if (!isset($id)) {
            redirect('admin/berkas/berkas');
        }
       
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getById($id);
        if (!$data["file"]) {
            show_404();
        }
        
        $this->load->view("admin/berkas/file_view", $data);
    }
}
