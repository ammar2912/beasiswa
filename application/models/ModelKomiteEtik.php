<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKomiteEtik extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_komite_etik_all()
  {
    return $this->db->get("komite_etik");
  }

  function get_komite_etik_limit($value=4)
  {
    $this->db->limit($value);
    $this->db->order_by("idkomite_etik", "DESC");
    return $this->db->get("komite_etik");
  }

  function get_data($id)
  {
    $this->db->where("idkomite_etik", $id);
    return $this->db->get("komite_etik");
  }

}
