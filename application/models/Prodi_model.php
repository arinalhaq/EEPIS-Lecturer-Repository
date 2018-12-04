<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
    private $_table = "prodi";

    public $ID_PRODI;
    public $NAMA_PRODI;

    public function rules()
    {
        return [
            ['field' => 'id_prodi',
            'label' => 'id_prodi',
            'rules' => 'required'],

            ['field' => 'nama_prodi',
            'label' => 'nama_prodi',
            'rules' => 'required'],        
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_prodi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_PRODI = $post['id_prodi'];
        $this->NAMA_PRODI = $post['nama_prodi'];
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->ID_PRODI = $post['id_prodi'];
        $this->NAMA_PRODI = $post['nama_prodi'];
        $this->db->update($this->_table, $this, array('ID_PRODI' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_PRODI" => $id));
    }

    function getCount(){
        
        return $this->db->count_all($this->_table);
    }
}
