<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrestasi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all()
  {
    return $this->db->get("prestasi");
  }

  function get_data($id)
  {
    $this->db->where("idprestasi",$id);
    return $this->db->get("prestasi");
  }

}
