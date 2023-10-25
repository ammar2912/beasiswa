<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDataAnggaran extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){
    $this->db->select('tb_anggaran_ormawa.*,tb_ormawa.*,tb_anggaran_ormawa.id as id_anggaran');
    $this->db->from('tb_anggaran_ormawa');
    $this->db->where('tb_anggaran_ormawa.status_anggaran',1);

    $this->db->join('tb_ormawa','tb_ormawa.id = tb_anggaran_ormawa.id_ormawa','left');

    $query=$this->db->get();

    return $query;
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_anggaran_ormawa",array("id"=>$id))->row_array();
  }

  public function get_ormawa(){
    return $this->db->get("tb_ormawa")->result();
  }

  public function cek_anggaran($id,$periode){

    $this->db->select('*');
    $this->db->from('tb_anggaran_ormawa');

    $this->db->where('tb_anggaran_ormawa.id_ormawa',$id);
    $this->db->where('tb_anggaran_ormawa.periode',$periode);

    return $this->db->get("");
  }


}
