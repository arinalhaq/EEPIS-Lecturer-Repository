<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jenis_berkas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jenis_berkas"] = $this->jenis_berkas_model->getAll();
        $this->load->view("admin/jenis_berkas/jenis_berkas", $data);
    }

    public function add()
    {
        $jenis_berkas = $this->jenis_berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis_berkas->rules());

        if ($validation->run()) {
            $jenis_berkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/jenis_berkas/jenis_berkas_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jenis_berkas/jenis_berkas');
       
        $jenis_berkas = $this->jenis_berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis_berkas->rules());

        if ($validation->run()) {
            $jenis_berkas->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jenis_berkas"] = $jenis_berkas->getById($id);
        if (!$data["jenis_berkas"]) show_404();
        
        $this->load->view("admin/jenis_berkas/jenis_berkas_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jenis_berkas_model->delete($id)) {
            redirect(site_url('jenis_berkas'));
        }
    }
}
