<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGallery extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_gallery_all()
  {
    return $this->db->get("gallery");
  }

  function get_gallery_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idgallery", "DESC");
    return $this->db->get("gallery");
  }

  function get_data($id)
  {
    $this->db->where("idgallery", $id);
    return $this->db->get("gallery");
  }

}
