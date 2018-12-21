<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen_model");
        $this->load->model("berkas_model");
        $this->load->model("prodi_model");
        $this->load->model("file_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["file"] = $this->file_model->getAllOrderDate();
        $data["dosen"] = $this->dosen_model->getCount();
        $data["berkas"] = $this->berkas_model->getCount();
        $data["prodi"] = $this->prodi_model->getCount();
        //if($data['dosen']->num_rows()>0)
        $this->load->view("admin/dashboard", $data);
    }

    public function edit($id){
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
        
        $this->load->view("admin/dosen_edit", $data);
    }
}