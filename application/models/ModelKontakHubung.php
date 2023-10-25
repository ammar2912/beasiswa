<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKontakHubung extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all()
  {
    return $this->db->get("kontak_hubung");
  }

  function get_data($id)
  {
    $this->db->where("id_kontak",$id);
    return $this->db->get("kontak_hubung");
  }

}
