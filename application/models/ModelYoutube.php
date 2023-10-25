<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelYoutube extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_youtube_all()
  {
    return $this->db->get("youtube");
  }

  function get_youtube_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idyoutube", "DESC");
    return $this->db->get("youtube");
  }

  function get_data($id)
  {
    $this->db->where("idyoutube", $id);
    return $this->db->get("youtube");
  }

}
