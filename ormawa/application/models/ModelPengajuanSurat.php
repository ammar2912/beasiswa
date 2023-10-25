<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengajuanSurat extends CI_Model{


  public function __construct()
  {
      parent::__construct();
  }

  public function get_data(){
    $this->db->select("*");
    return $this->db->get("tb_jenis_surat")->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_jenis_surat",array("id"=>$id))->row_array();
  }

  public function get_syarat($id){
    $this->db->select("syarat");
    $this->db->from("tb_jenis_surat");
    $this->db->where("tb_jenis_surat.id",$id);
    return $this->db->get()->row();
  }


}
