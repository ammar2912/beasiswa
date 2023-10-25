<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAlamat extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function get_kota()
  {
    return $this->db->get('kota');
  }
  function get_provinsi()
  {
    return $this->db->get('provinsi');
  }

  public function getData_Kabupaten($idprovinsi)
  {
    $this->db->where("provinsi_idprovinsi",$idprovinsi);
    return $this->db->get('kota');
  }

  public function data_kabupaten($idkota)
  {
    $this->db->where("idkota", $idkota);
    $kab = $this->db->get("kota")->row_array();
    return $kab['nama_kota'];
  }

  public function data_provinsi($idprovinsi)
  {
    $this->db->where("idprovinsi", $idprovinsi);
    $kab = $this->db->get("provinsi")->row_array();
    return $kab['provinsi'];
  }

  public function data_kecamatan($idkabupaten)
  {
    $this->db->where("regency_id", $idkabupaten);
    return $this->db->get("districts");
  }
  public function nama_kabupaten($id)
  {
    $this->db->where("idkota", $id);
    return $this->db->get("kota")->row_array()["nama_kota"];
  }
  public function nama_provinsi($id)
  {
    $this->db->where("idprovinsi", $id);
    return $this->db->get("provinsi")->row_array()["provinsi"];
  }
  public function nama_kecamatan($idkecamatan)
  {
    $this->db->where("id", $idkecamatan);
    return $this->db->get("districts")->row_array()["name"];
  }

  public function data_desa($idkecamatan)
  {
    $this->db->where("district_id", $idkecamatan);
    return $this->db->get("villages");
  }
  public function nama_desa($iddesa)
  {
    $this->db->where("id", $iddesa);
    return $this->db->get("villages")->row_array()["name"];
  }

}
