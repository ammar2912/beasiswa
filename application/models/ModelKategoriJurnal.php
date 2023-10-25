<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKategoriJurnal extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_kategorijurnal_all()
  {
    return $this->db->get("kategori_jurnal");
  }

  function get_data($id)
  {
    $this->db->where("idkategori_jurnal", $id);
    return $this->db->get("kategori_jurnal");
  }

}
