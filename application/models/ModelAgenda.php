<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAgenda extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_agenda_all()
  {
    return $this->db->get("agenda");
  }

  function get_agenda_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idagenda", "DESC");
    return $this->db->get("agenda");
  }

  function get_data($id)
  {
    $this->db->where("idagenda", $id);
    return $this->db->get("agenda");
  }

}
