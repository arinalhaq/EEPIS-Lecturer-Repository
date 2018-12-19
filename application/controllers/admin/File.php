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
        $this->load->view("admin/repository/file", $data);
    }

    public function add($id)
    {
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $validation = $this->form_validation;
        $validation->set_rules($file->rules());
        $data['id'] = $id;
        $post = $this->input->post();

        if ($validation->run()) {
            //$filename = $file->save($id);
            $config['upload_path']="./upload/file/"; //path folder file upload
            $config['allowed_types']='gif|jpg|png|txt|pdf|docx'; //type file yang boleh di upload
            //$config['encrypt_name'] = TRUE; //enkripsi file name upload
            //$config['file_name']            = $filename;
            //$config['overwrite']			= true;
         
            $this->load->library('upload', $config);
            /*$this->upload->do_upload('file');*/
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                echo '<div>'.$error['error'].'</div>';
                //redirect('your_function_which_loads_the_view','refresh');
            }
            $post['file'] = $this->upload->data()['file_name'];
            $file->save($id, $post);
            
                
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
        }

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
        $file = $this->file_model;
        $this->load->model('kategori_model');
        $validation = $this->form_validation;
        $validation->set_rules($file->rules());
        $data['id'] = $id;
        $post = $this->input->post();
        $post['id_berkas'] = $file->getById($id)->ID_BERKAS;

        if ($validation->run()) {
            //$filename[] = $file->update($id, $id_berkas);
            $config['upload_path']="./upload/file/"; //path folder file upload
            $config['allowed_types']='gif|jpg|png|txt|pdf|docx'; //type file yang boleh di upload
            //$config['encrypt_name'] = TRUE; //enkripsi file name upload
            //$config['file_name']            = $filename;
            //$config['overwrite']			= TRUE;
         
            $this->load->library('upload', $config);
            /*$this->upload->do_upload('file');*/
            if (!$this->upload->do_upload('file')) {
                //$error = array('error' => $this->upload->display_errors());
                //echo '<div>'.$error['error'].'</div>';
                //redirect('your_function_which_loads_the_view','refresh');
                $post['file'] = $file->getById($id)->NAMA_UPLOAD;
            } else {
                array_map('unlink', glob(FCPATH."upload/file/".$file->getById($id)->NAMA_UPLOAD));
                $post['file'] = $this->upload->data()['file_name'];
            }
            $file->update($id, $post);
                
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['file'] = $file->getById($id);
        $this->load->view("admin/repository/file_edit", $data);
        //$this->load->view("admin/repository/file_form");
    }

    public function del($id=null)
    {
        if (!isset($id)) {
            show_404();
        }
        $file = $this->file_model;
        
        array_map('unlink', glob(FCPATH."upload/file/".$file->getById($id)->NAMA_UPLOAD));
        $file->delete($id);   
        redirect(site_url('admin/repositori'));
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
        
        $this->load->view("admin/repository/file_view", $data);
    }

    public function download($id)
    {
        $file = $this->file_model->getById($id);
        force_download('upload/file/'.$file->NAMA_UPLOAD, null);
        redirect('admin/repositori/view/'.$file->ID_BERKAS, 'refresh');
    }
}
