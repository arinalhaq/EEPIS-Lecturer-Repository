<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["dosen"] = $this->dosen_model->getAll();
        $this->load->model('prodi_model');
        $this->load->view("admin/dosen/dosen", $data);
    }

    public function add()
    {
        $dosen = $this->dosen_model;
        $this->load->model('prodi_model');
        $this->load->model('status_model');
        $data['prodi'] = $this->prodi_model->getAll();
        $data['status'] = $this->status_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/dosen/dosen_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/dosen/dosen');
       
        $dosen = $this->dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["dosen"] = $dosen->getById($id);
        $this->load->model('prodi_model');
        $data["prodi"] = $this->prodi_model->getAll();
        $this->load->model('status_model');
        $data['status'] = $this->status_model->getAll();
        if (!$data["dosen"]) show_404();
        
        $this->load->view("admin/dosen/dosen_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->dosen_model->delete($id)) {
            redirect(site_url('dosen'));
        }
    }

    public function view($id = null)
    {
        if (!isset($id)) redirect('admin/dosen/dosen');
       
        $dosen = $this->dosen_model;
        $data["dosen"] = $dosen->getById($id);
        $this->load->model('prodi_model');
        $this->load->model('status_model');
        if (!$data["dosen"]) show_404();
        
        $this->load->view("admin/dosen/dosen_view", $data);
    }
}
