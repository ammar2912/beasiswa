<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLayananKemahasiswaan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all()
  {
    return $this->db->get("layanan_kemahasiswaan");
  }

  function get_data($id)
  {
    $this->db->where("idlayanan_kemahasiswaan",$id);
    return $this->db->get("layanan_kemahasiswaan");
  }

}
