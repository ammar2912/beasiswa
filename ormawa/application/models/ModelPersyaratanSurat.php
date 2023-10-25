<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPersyaratanSurat extends CI_Model{

  /**

  * @author Fendrik Nurul Jadid <fendrik1311@gmail.com>

  * @since v.1.0

  **/


  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  public function get_data(){
    $this->db->select("*");
    return $this->db->get("tb_persyaratan_surat")->result();
  }
  public function get_data_edit($id){
    return $this->db->get_where("tb_persyaratan_surat",array("id"=>$id))->row_array();
  }

  public function get_syarat($id){
    $this->db->select("persyaratan");
    $this->db->from("tb_persyaratan_surat");
    $this->db->where("tb_persyaratan_surat.id",$id);
    return $this->db->get()->row();
  }


}
