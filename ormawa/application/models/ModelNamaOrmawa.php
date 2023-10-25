<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelNamaOrmawa extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){
    $this->db->select('tb_ormawa.*,tb_ormawa.status as status_ormawa,tb_jenis_ormawa.jenis as jenis_ormawa');
    $this->db->from('tb_ormawa,tb_jenis_ormawa');
    $this->db->where('tb_jenis_ormawa.id = tb_ormawa.jenis_ormawa');
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
    return $this->db->get_where("tb_ormawa",array("id"=>$id))->row_array();
  }


}
