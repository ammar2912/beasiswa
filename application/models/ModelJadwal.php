<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJadwal extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getJadwal()
  {
    return $this->db->get("jadwal")->row_array();
  }

}
