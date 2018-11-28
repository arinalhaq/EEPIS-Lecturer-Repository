<?php defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model
{
    private $_table = "dosen";

    public $ID_UPLOAD;
    public $ID_BERKAS;
    public $KETERANGAN;
    public $NAMA_FILE;
    public $ID_DOSEN;
    public $TGL_UPLOAD;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'tempat_lahir',
            'label' => 'tempat_lahir',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_upload" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_UPLOAD = $post['id_upload'];
        $this->ID_BERKAS = $post['id_berkas'];
        $this->KETERANGAN = $post["keterangan"];
        $this->NAMA_FILE = $post["nama_file"];
        $this->ID_DOSEN = $post["id_dosen"];
        $this->TGL_UPLOAD = $post["tgl_upload"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_UPLOAD = $post['id_upload'];
        $this->ID_BERKAS = $post['id_berkas'];
        $this->KETERANGAN = $post["keterangan"];
        $this->NAMA_FILE = $post["nama_file"];
        $this->ID_DOSEN = $post["id_dosen"];
        $this->TGL_UPLOAD = $post["tgl_upload"];
        $this->db->update($this->_table, $this, array('ID_UPLOAD' => $post['id_upload']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_UPLOAD" => $id));
    }
}
