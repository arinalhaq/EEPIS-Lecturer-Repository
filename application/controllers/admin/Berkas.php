<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berkas_model");
        $this->load->model("file_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["berkas"] = $this->berkas_model->getByIdNot($this->session->userdata('ses_id'));
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->view("admin/berkas/berkas", $data);
    }

    public function add()
    {
        $berkas = $this->berkas_model;
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $data['kategori'] = $this->kategori_model->getAll();
        $data['dosen'] = $this->dosen_model->getAll();
        $data['jenis_berkas'] = $this->jenis_berkas_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/berkas/berkas_form", $data);
    }

    public function view($id = null)
    {
        if (!isset($id)) redirect('admin/berkas/berkas');
       
        $berkas = $this->berkas_model;
        $data["berkas"] = $berkas->getById($id);
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getByIdBerkas($id);
        if (!$data["berkas"]) show_404();
        
        $this->load->view("admin/berkas/berkas_view", $data);
    }

    public function file($id = null)
    {
        if (!isset($id)) redirect('admin/berkas');
       
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getById($id);
        if (!$data["file"]) show_404();
        
        $this->load->view("admin/berkas/file_view", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/berkas');
       
        $berkas = $this->berkas_model;
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $data['kategori'] = $this->kategori_model->getAll();
        $data['dosen'] = $this->dosen_model->getAll();
        $data['jenis_berkas'] = $this->jenis_berkas_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["berkas"] = $berkas->getById($id);
        $this->load->model('prodi_model');
        $data["prodi"] = $this->prodi_model->getAll();
        $this->load->model('status_model');
        $data['status'] = $this->status_model->getAll();
        if (!$data["berkas"]) show_404();
        
        $this->load->view("admin/repository/berkas_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->berkas_model->delete($id)) {
            redirect(site_url('admin/berkas'));
        }
    }

    public function delfile($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->file_model->delete($id)) {
            redirect(site_url('admin/berkas'));
        }
    }
}
