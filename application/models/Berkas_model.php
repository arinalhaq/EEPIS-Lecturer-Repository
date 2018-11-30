<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";

    public $ID_BERKAS;
    public $ID_JENIS_BERKAS;
    public $JUDUL_BERKAS;
    public $DESKRIPSI;
    public $ID_KATEGORI;
    public $ID_DOSEN;

    public function rules()
    {
        return [
            ['field' => 'id_berkas',
            'label' => 'id_berkas',
            'rules' => 'required'],

            ['field' => 'id_jenis_berkas',
            'label' => 'id_jenis_berkas',
            'rules' => 'required'],

            ['field' => 'judul_berkas',
            'label' => 'judul_berkas',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'deskripsi',
            'rules' => 'required'],

            ['field' => 'id_kategori',
            'label' => 'id_kategori',
            'rules' => 'required'],

            ['field' => 'id_dosen',
            'label' => 'id_dosen',
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
        $this->ID_BERKAS = $post['id_berkas'];
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->JUDUL_BERKAS = $post["judul_berkas"];
        $this->DESKRIPSI = $post["deskripsi"];
        $this->ID_KATEGORI = $post["id_kategori"];
        $this->ID_DOSEN = $post["id_dosen"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_BERKAS = $post['id_berkas'];
        $this->ID_JENIS_BERKAS = $post['id_jenis_berkas'];
        $this->JUDUL_BERKAS = $post["judul_berkas"];
        $this->DESKRIPSI = $post["deskripsi"];
        $this->ID_KATEGORI = $post["id_kategori"];
        $this->ID_DOSEN = $post["id_dosen"];
        $this->db->update($this->_table, $this, array('ID_BERKAS' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_BERKAS" => $id));
    }

    function auth_dosen($id,$password){
        return $this->db->get_where($this->_table, ["ID_BERKAS" => $id, "PASSWORD" => $password]);
    }
}
