<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berkas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["berkas"] = $this->berkas_model->getAll();
        $this->load->view("admin/berkas", $data);
    }

    public function add()
    {
        $dosen = $this->dosen_model;
        $this->load->model('prodi_model');
        $data['prodi'] = $this->prodi_model->getAll();
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/dosen_form", $data);
    }
}
