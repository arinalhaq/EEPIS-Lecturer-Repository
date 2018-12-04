<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";

    public $ID_DOSEN;
    public $NIK;
    public $NAMA_DOSEN;
    public $TEMPAT_LAHIR;
    public $TGL_LAHIR;
    public $NO_TELP;
    public $EMAIL;
    public $ALAMAT;
    public $PASSWORD;
    public $ID_PRODI;
    public $ID_STATUS;

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
        return $this->db->get_where($this->_table, ["id_dosen" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_DOSEN = uniqid();
        $this->NIK = $post['nik'];
        $this->NAMA_DOSEN = $post["nama"];
        $this->TEMPAT_LAHIR = $post["tempat_lahir"];
        $this->TGL_LAHIR = $post["tgl_lahir"];
        $this->NO_TELP = $post["no_telp"];
        $this->EMAIL = $post["email"];
        $this->ALAMAT = $post["alamat"];
        $this->PASSWORD = $post["password"];
        $this->ID_PRODI = $post['id_prodi'];
        $this->ID_STATUS = $post['id_status'];
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->ID_DOSEN = $id;
        $this->NIK = $post['nik'];
        $this->NAMA_DOSEN = $post["nama"];
        $this->TEMPAT_LAHIR = $post["tempat_lahir"];
        $this->TGL_LAHIR = $post["tgl_lahir"];
        $this->NO_TELP = $post["no_telp"];
        $this->EMAIL = $post["email"];
        $this->ALAMAT = $post["alamat"];
        $this->PASSWORD = $post["password"];
        $this->ID_PRODI = $post["id_prodi"];
        $this->ID_STATUS = $post["id_status"];
        $this->db->update($this->_table, $this, array('ID_DOSEN' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_DOSEN" => $id));
    }

    function auth_dosen($nik, $password){
        return $this->db->get_where($this->_table, ["NIK" => $nik, "PASSWORD" => $password]);
    }

    function getByIdNot($id){
        
        return $this->db->query('SELECT * FROM '.$this->_table.' WHERE ID_DOSEN NOT IN('.$id.')')->result();
    }

    function getCount(){

        return $this->db->count_all('dosen');
    }
}
