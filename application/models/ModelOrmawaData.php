<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelOrmawaData extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all()
  {
    return $this->db->get("ormawa");
  }

  function get_page($page=null, $limit=10)
  {
    if ($page != null || $page != "") {
      $row = $limit * $page;
      $this->db->limit($limit,$row);
    }
    return $this->db->get("ormawa");
  }

  function get_data($id)
  {
    $this->db->where("id_ormawa",$id);
    return $this->db->get("ormawa");
  }

}
