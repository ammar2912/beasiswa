<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPPH extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }


  public function get_data_edit($id){
    return $this->db->get_where("pph",array("idpph"=>$id));
  }


}
