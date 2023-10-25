<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPanduan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_panduan_all()
  {
    return $this->db->get("panduan");
  }

  function get_panduan_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idpanduan", "DESC");
    return $this->db->get("panduan");
  }

  function get_data($id)
  {
    $this->db->where("idpanduan", $id);
    return $this->db->get("panduan");
  }

}
