<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("prodi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["prodi"] = $this->prodi_model->getAll();
        $this->load->view("admin/prodi/prodi", $data);
    }

    public function add()
    {
        $prodi = $this->prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prodi->rules());

        if ($validation->run()) {
            $prodi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/prodi/prodi_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/prodi/prodi');
       
        $prodi = $this->prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prodi->rules());

        if ($validation->run()) {
            $prodi->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["prodi"] = $prodi->getById($id);
        if (!$data["prodi"]) show_404();
        
        $this->load->view("admin/prodi/prodi_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->prodi_model->delete($id)) {
            redirect(site_url('prodi'));
        }
    }
}
