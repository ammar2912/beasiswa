<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelFolder extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_list()
  {
    return $this->db->get("folder");
  }

  function get_data($id)
  {
    $this->db->where("idfolder",$id);
    return $this->db->get("folder");
  }

}
