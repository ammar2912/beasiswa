<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataUser extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){
    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->where('jabatan !=',1);
    $this->db->where('jabatan !=','Hak Akses Ormawa');
    $this->db->where('jabatan !=','Hak Akses Mahasiswa');
    $query=$this->db->get();

    return $query;
  }

  public function login_ormawa($username){

    $this->db->select('tb_ormawa.*,user.*,tb_ormawa.password as password_ormawa,tb_ormawa.id as id_ormawa');
    $this->db->from('tb_ormawa,user');
    $this->db->where('tb_ormawa.kode_ormawa',$username);
    $this->db->where('tb_ormawa.status',1);
    // $this->db->where('tb_ormawa.id = tb_anggaran_ormawa.id_ormawa');
    $this->db->where('user.pegawai_idpegawai',2);
    $query=$this->db->get();

    return $query;
  }

  public function get_data_edit($id){
    $this->db->select('pegawai.nama as nama, pegawai.jabatan as jabatan, user.username as username');
    $this->db->from('pegawai,user');
    $this->db->where('pegawai.idpegawai',$id);
    $this->db->where('user.pegawai_idpegawai',$id);
    $query=$this->db->get();

    return $query;
  }


}
