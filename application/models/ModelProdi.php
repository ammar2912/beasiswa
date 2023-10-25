<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProdi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_list()
  {
    $this->db->join("jurusan", "jurusan.idjurusan = prodi.jurusan_idjurusan");
    return $this->db->get("prodi");
  }

  function get_data($idprodi)
  {
    $this->db->where("idprodi", $idprodi);
    return $this->db->get("prodi");
  }

}
