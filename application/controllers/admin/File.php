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
        $file = $this->file_model;
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');

        $this->load->view("admin/repository/file_form");
    }

    public function do_upload()
    {
        $config['upload_path']="./upload/file/";
        $config['allowed_types']='gif|jpg|png|pdf|docx|doc|ppt|pptx';
        $config['encrypt_name'] = true;
         
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            //$data_file = array('upload_data' => $this->upload->data());
            $this->file_model->save($this->segment->uri(4));
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            //$data['dosen'] = $this->dosen_model->getAll();
            redirect('admin/file/add'.$this->segment->uri(5));
        } else {
            echo "error";
        }
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
