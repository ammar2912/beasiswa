<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengumuman extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_pengumuman_all()
  {
    return $this->db->get("pengumuman");
  }

  function get_page($page=null, $limit=10)
  {
    if ($page != null || $page != "") {
      $row = $limit * $page;
      $this->db->limit($limit,$row);
    }
    return $this->db->get("pengumuman");
  }

  function get_pengumuman_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idpengumuman", "DESC");
    return $this->db->get("pengumuman");
  }

  function get_data($id)
  {
    $this->db->where("idpengumuman", $id);
    return $this->db->get("pengumuman");
  }

}
