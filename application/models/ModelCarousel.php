<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCarousel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_carousel()
  {
    $this->db->order_by("idcarousel","DESC");
    return $this->db->get("carousel");
  }

  public function get_edit($idcarousel)
  {
    $this->db->where("idcarousel", $idcarousel);
    return $this->db->get("carousel");
  }

}
