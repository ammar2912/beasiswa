<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJurusan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_list()
  {
    return $this->db->get("jurusan");
  }

  function get_data($id)
  {
    $this->db->where("idjurusan", $id);
    return $this->db->get("jurusan");
  }

}
