<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProfil extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_tentang()
  {
    $this->db->where("idtentang", "1");
    return $this->db->get("tentang");
  }

  function get_visimisi()
  {
    $this->db->where("idvisimisi","1");
    return $this->db->get("visimisi");
  }

  function get_organisasi()
  {
    $this->db->where("idorganisasi","1");
    return $this->db->get("organisasi");
  }

}
