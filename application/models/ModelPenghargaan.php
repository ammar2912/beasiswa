<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPenghargaan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_penghargaan_all()
  {
    return $this->db->get("penghargaan");
  }

  function get_data($id)
  {
    $this->db->where("idpenghargaan", $id);
    return $this->db->get("penghargaan");
  }

}
