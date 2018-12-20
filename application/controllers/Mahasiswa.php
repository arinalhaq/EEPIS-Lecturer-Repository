<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen_model");
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'download'));
    }

    public function index()
    {
        $this->load->model('prodi_model');
        $data["prodi"] = $this->prodi_model->getAll();
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->view("public/landing", $data);
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

        $this->load->view("user/repository/berkas_form", $data);
    }

    public function prodi($id)
    {
        $dosen = $this->dosen_model;
        $this->load->model('prodi_model');
        $data['prodi'] = $this->prodi_model->getById($id);
        $data['dosen'] = $this->dosen_model->getByIdProdi($id);
        
        
        $this->load->view("public/prodi", $data);
    }

    public function dosen($id)
    {
        if (!isset($id)) redirect('user/berkas/berkas');
       
        $dosen = $this->dosen_model;
        $data["dosen"] = $dosen->getById($id);
        $this->load->model('berkas_model');
        $this->load->model('prodi_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('kategori_model');
        $data['berkas'] = $this->berkas_model->getByIdDosen($id);
        if (!$data["dosen"]) show_404();
        
        $this->load->view("public/berkas", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('user/repositori');
       
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
        
        $this->load->view("user/repository/berkas_edit", $data);
    }

    public function del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->berkas_model->delete($id)) {
            redirect(site_url('user/repositori'));
        }
    }

    public function file($id = null)
    {
        if (!isset($id)) redirect('user/berkas/berkas');
        $this->load->model('berkas_model');
        $berkas = $this->berkas_model;
        $data["berkas"] = $berkas->getById($id);
        $this->load->model('kategori_model');
        $this->load->model('dosen_model');
        $this->load->model('jenis_berkas_model');
        $this->load->model('file_model');
        $data['file'] = $this->file_model->getByIdBerkas($id);
        if (!$data["berkas"]) show_404();
        
        $this->load->view("public/file", $data);
    }

    public function download($id)
    {
        $this->load->model('file_model');
        $file = $this->file_model->getById($id);
        force_download('upload/file/'.$file->NAMA_UPLOAD, null);
        redirect('mahasiswa/file/'.$file->ID_BERKAS, 'refresh');
    }
}

