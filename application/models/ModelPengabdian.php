<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengabdian extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_all()
  {
    if ($_SESSION['jabatan'] == "dosen") {
      $this->db->where("id_dosen", $_SESSION['nik']);
    }
    $this->db->join("pegawai","pegawai.nik = master_pengabdian.id_dosen");
    return $this->db->get("master_pengabdian");
  }

  function get_data($idpengabdian)
  {
    $this->db->where("idmaster_pengabdian", $idpengabdian);
    return $this->db->get("master_pengabdian");
  }

  function get_luaran_pengabdian($id_laporan)
  {
    $this->db->where("laporan_kemajuan_pengabdian_idlaporan_kemajuan_pengabdian", $id_laporan);
    return $this->db->get("luaran_wajib_pengabdian");
  }

  public function getall_l_kemajuan_pengabdian($idprop_penilitian, $tahun = null)
  {
    // $this->db->join("master_pengabdian", "master_pengabdian.idmaster_pengabdian = laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian");
    if ($tahun != null) {
      $this->db->where("LEFT(tgl_kemajuan,4) =", $tahun);
    }
    $this->db->where("master_pengabdian_idmaster_pengabdian", $idprop_penilitian);
    return $this->db->get("laporan_kemajuan_pengabdian");
  }

  public function get_laporan_kemajuan($idprop_penilitian)
  {
    // $this->db->join("master_pengabdian","master_pengabdian.idmaster_pengabdian = laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian");
    $this->db->join("luaran_wajib_pengabdian", "luaran_wajib_pengabdian.laporan_kemajuan_pengabdian_idlaporan_kemajuan_pengabdian = laporan_kemajuan_pengabdian.idlaporan_kemajuan_pengabdian", "left");
    $this->db->where("idlaporan_kemajuan_pengabdian", $idprop_penilitian);
    return $this->db->get("laporan_kemajuan_pengabdian");
  }

  public function get_laporan_akhir($idpengabdian)
  {
    // $this->db->join("luaran_wajib_pengabdian", "luaran_wajib_pengabdian.laporan_kemajuan_pengabdian_idlaporan_kemajuan_pengabdian = laporan_kemajuan_pengabdian.idlaporan_kemajuan_pengabdian", "left");
    $this->db->where("master_pengabdian_idmaster_pengabdian", $idpengabdian);
    $this->db->where("tipe_laporan", "2");
    return $this->db->get("laporan_kemajuan_pengabdian");
  }

}
