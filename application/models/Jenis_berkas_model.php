<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_berkas_model extends CI_Model
{
    private $_table = "jenis_berkas";

    public $ID_JENIS_BERKAS;
    public $NAMA_JENIS_BERKAS;

    public function rules()
    {
        return [
            ['field' => 'id_jenis_berkas',
            'label' => 'id_jenis_berkas',
            'rules' => 'required'],

            ['field' => 'nama_jenis_berkas',
            'label' => 'nama_jenis_berkas',
            'rules' => 'required'],        
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jenis_berkas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->NAMA_JENIS_BERKAS = $post['nama_jenis_berkas'];
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->NAMA_JENIS_BERKAS = $post['nama_jenis_berkas'];
        $this->db->update($this->_table, $this, array('ID_JENIS_BERKAS' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_JENIS_BERKAS" => $id));
    }
}
