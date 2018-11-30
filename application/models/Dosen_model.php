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
        $this->ID_PRODI = 1;
        $this->ID_STATUS = 1;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_DOSEN = $post["id_dosen"];
        $this->NIK = $post['nik'];
        $this->NAMA_DOSEN = $post["nama"];
        $this->TEMPAT_LAHIR = $post["tempat_lahir"];
        $this->TGL_LAHIR = $post["tanggal_lahir"];
        $this->NO_TELP = $post["no_telp"];
        $this->EMAIL = $post["email"];
        $this->ALAMAT = $post["alamat"];
        $this->ID_PRODI = $post["id_prodi"];
        $this->ID_STATUS = $post["id_status"];
        $this->db->update($this->_table, $this, array('ID_DOSEN' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_DOSEN" => $id));
    }

    function auth_dosen($id,$password){
        return $this->db->get_where($this->_table, ["ID_DOSEN" => $id, "PASSWORD" => $password]);
    }
}
