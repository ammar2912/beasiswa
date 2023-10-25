<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPendanaan extends CI_Model{

  public function __construct()
  {
      parent::__construct();
  }

  public function get_data($id){
    $this->db->select('tb_anggaran_ormawa.*,tb_ormawa.*,tb_anggaran_ormawa.id as id_anggaran');
    $this->db->from('tb_anggaran_ormawa');
    $this->db->where('tb_anggaran_ormawa.id_ormawa',$id);
    $this->db->order_by('tb_anggaran_ormawa.periode','DESC');

    $this->db->join('tb_ormawa','tb_ormawa.id = tb_anggaran_ormawa.id_ormawa','left');


    $query=$this->db->get();

    return $query;
  }

  public function get_detail($id){
    return $this->db->get_where("tb_anggaran_ormawa",array("id"=>$id))->row_array();
  }

}
