<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_model extends CI_Model
{
    private $_table = "berkas";

    public $ID_BERKAS;
    public $ID_JENIS_BERKAS;
    public $JUDUL_BERKAS;
    public $DESKRIPSI;
    public $ID_KATEGORI;
    public $ID_DOSEN;

    public function rules()
    {
        return [
            

            ['field' => 'judul_berkas',
            'label' => 'judul_berkas',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required'],

            
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_berkas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_BERKAS = uniqid(rand());
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->JUDUL_BERKAS = $post["judul_berkas"];
        $this->DESKRIPSI = $post["deskripsi"];
        $this->ID_KATEGORI = $post["id_kategori"];
        $this->ID_DOSEN = $this->session->userdata('ses_id');
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->ID_BERKAS = $id;
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->JUDUL_BERKAS = $post["judul_berkas"];
        $this->DESKRIPSI = $post["deskripsi"];
        $this->ID_KATEGORI = $post["id_kategori"];
        $this->ID_DOSEN = $this->session->userdata('ses_id');
        $this->db->update($this->_table, $this, array('ID_BERKAS' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_BERKAS" => $id));
    }

    function getByIdNot($id){
        
        return $this->db->query('SELECT * FROM '.$this->_table.' WHERE ID_DOSEN NOT IN('.$id.')')->result();
    }

    function getCount(){
        
        return $this->db->count_all('berkas');
    }

    function getByIdDosen($id){
        
        return $this->db->query('SELECT * FROM '.$this->_table.' WHERE ID_DOSEN IN('.$id.')')->result();
    }

    function getByIdDosenKategori($id, $id_kategori){
        
        return $this->db->query('SELECT * FROM '.$this->_table.' WHERE ID_DOSEN IN('.$id.') AND ID_KATEGORI IN ('.$id_kategori.')')->result();
    }
}
