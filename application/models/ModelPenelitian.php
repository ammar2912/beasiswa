<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPenelitian extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_list()
  {
    if ($_SESSION['jabatan'] == "dosen") {
      $this->db->where("id_dosen", $_SESSION['nik']);
    }
    $this->db->join("pegawai","pegawai.nik = master_penelitian.id_dosen");
    return $this->db->get("master_penelitian");
  }
  function get_all()
  {
    $this->db->join("pegawai","pegawai.nik = master_penelitian.id_dosen");
    return $this->db->get("master_penelitian");
  }

  function get_data($idprodi)
  {
    $this->db->where("idprop_penelitian", $idprodi);
    return $this->db->get("master_penelitian");
  }

  function get_luaran_penelitian($id_laporan)
  {
    $this->db->where("laporan_kemajuan_penelitian_idlaporan_kemajuan", $id_laporan);
    return $this->db->get("luaran_wajib_penelitian");
  }

  public function get_laporan_akhir($idpenelitian)
  {
    $this->db->join("luaran_wajib_penelitian", "luaran_wajib_penelitian.laporan_kemajuan_penelitian_idlaporan_kemajuan = laporan_kemajuan_penelitian.idlaporan_kemajuan", "left");
    $this->db->where("master_penelitian_idprop_penelitian", $idpenelitian);
    $this->db->where("tipe_laporan", "2");
    return $this->db->get("laporan_kemajuan_penelitian");
  }

}
