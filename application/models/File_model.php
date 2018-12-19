<?php defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model
{
    private $_table = "file";

    public $ID_UPLOAD;
    public $ID_BERKAS;
    public $KETERANGAN;
    public $NAMA_FILE;
    public $ID_DOSEN;
    public $TGL_UPLOAD;

    public function rules()
    {
        return [

            ['field' => 'nama_file',
            'label' => 'nama_file',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'keterangan',
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

    public function save($id, $post)
    {
        $this->ID_UPLOAD = uniqid();
        $this->ID_BERKAS = $id;
        $this->KETERANGAN = $post["keterangan"];
        $this->NAMA_FILE = $post["nama_file"];
        $this->NAMA_UPLOAD = $post['file'];
        $this->ID_DOSEN = $this->session->userdata('ses_id');
        $this->TGL_UPLOAD = date("y-m-d");
        $this->db->insert($this->_table, $this);
    }

    public function update($id, $post)
    {
        $this->ID_UPLOAD = $id;
        $this->ID_BERKAS = $post['id_berkas'];
        $this->KETERANGAN = $post["keterangan"];
        $this->NAMA_FILE = $post["nama_file"];
        $this->NAMA_UPLOAD = $post['file'];
        $this->ID_DOSEN =$this->session->userdata('ses_id');
        $this->TGL_UPLOAD = date("y-m-d");
        $this->db->update($this->_table, $this, array('ID_UPLOAD' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_UPLOAD" => $id));
    }

    public function getByIdBerkas($id)
    {
        return $this->db->get_where($this->_table, ["id_berkas" => $id])->result();
    }

    function getAllOrderDate(){
        $this->db->order_by('TGL_UPLOAD');
        return $this->db->get($this->_table)->result();
    }
}
