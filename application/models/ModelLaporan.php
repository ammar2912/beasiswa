<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLaporan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getall_l_kemajuan_penilitian($idprop_penilitian, $tahun = null)
  {
    // $this->db->join("master_penelitian", "master_penelitian.idprop_penelitian = laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian");
    if ($tahun != null) {
      $this->db->where("LEFT(tgl_kemajuan,4)", $tahun);
    }
    $this->db->where("master_penelitian_idprop_penelitian", $idprop_penilitian);
    return $this->db->get("laporan_kemajuan_penelitian");
  }

  public function get_laporan_kemajuan($idprop_penilitian)
  {
    // $this->db->join("master_penelitian","laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian = master_penelitian.idprop_penelitian");
    $this->db->join("luaran_wajib_penelitian", "luaran_wajib_penelitian.laporan_kemajuan_penelitian_idlaporan_kemajuan = laporan_kemajuan_penelitian.idlaporan_kemajuan", "left");
    $this->db->where("idlaporan_kemajuan", $idprop_penilitian);
    return $this->db->get("laporan_kemajuan_penelitian");
  }

}
