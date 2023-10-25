<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLaporanDosen extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_laporan_penelitian($awal, $selesai, $id = null)
  {

    // $this->db->join("master_penelitian","master_penelitian.idprop_penelitian = laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian");
    $this->db->where("laporan_kemajuan_penelitian.tgl_kemajuan >=", $awal);
    $this->db->where("laporan_kemajuan_penelitian.tgl_kemajuan <=", $selesai);
    $this->db->where("laporan_kemajuan_penelitian.tipe_laporan","1");
    if ($id != null) {
      $this->db->where("laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian", $id);
    }
    return $this->db->get("laporan_kemajuan_penelitian");
  }

  public function get_laporan_penelitian_akhir($awal, $selesai, $id = null)
  {

    // $this->db->join("master_penelitian","master_penelitian.idprop_penelitian = laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian");
    $this->db->where("laporan_kemajuan_penelitian.tgl_kemajuan >=", $awal);
    $this->db->where("laporan_kemajuan_penelitian.tgl_kemajuan <=", $selesai);
    $this->db->where("laporan_kemajuan_penelitian.tipe_laporan","2");
    if ($id != null) {
      $this->db->where("laporan_kemajuan_penelitian.master_penelitian_idprop_penelitian", $id);
    }
    return $this->db->get("laporan_kemajuan_penelitian");
  }

  public function get_laporan_pengabdian($awal, $selesai, $id = null)
  {

    // $this->db->join("master_pengabdian","master_pengabdian.idmaster_pengabdian = laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian");
    $this->db->where("laporan_kemajuan_pengabdian.tgl_kemajuan >=", $awal);
    $this->db->where("laporan_kemajuan_pengabdian.tgl_kemajuan <=", $selesai);
    $this->db->where("laporan_kemajuan_pengabdian.tipe_laporan","1");
    if ($id != null) {
      $this->db->where("laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian", $id);
    }
    return $this->db->get("laporan_kemajuan_pengabdian");
  }
  public function get_laporan_pengabdian_akhir($awal, $selesai, $id = null)
  {

    // $this->db->join("master_pengabdian","master_pengabdian.idmaster_pengabdian = laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian");
    $this->db->where("laporan_kemajuan_pengabdian.tgl_kemajuan >=", $awal);
    $this->db->where("laporan_kemajuan_pengabdian.tgl_kemajuan <=", $selesai);
    $this->db->where("laporan_kemajuan_pengabdian.tipe_laporan","2");
    if ($id != null) {
      $this->db->where("laporan_kemajuan_pengabdian.master_pengabdian_idmaster_pengabdian", $id);
    }
    return $this->db->get("laporan_kemajuan_pengabdian");
  }

}
