<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "kategori";

    public $ID_KATEGORI;
    public $NAMA_KATEGORI;

    public function rules()
    {
        return [
            //['field' => 'id_kategori',
            //'label' => 'id_kategori',
            //'rules' => 'required'],

            ['field' => 'nama_kategori',
            'label' => 'nama_kategori',
            'rules' => 'required'],        
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        //$this->ID_KATEGORI = DEFAULT;
        $this->NAMA_KATEGORI = $post['nama_kategori'];
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->ID_KATEGORI = $id;
        $this->NAMA_KATEGORI = $post['nama_kategori'];
        $this->db->update($this->_table, $this, array('ID_KATEGORI' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_KATEGORI" => $id));
    }

}
