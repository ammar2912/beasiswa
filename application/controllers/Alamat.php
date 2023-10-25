<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelAlamat");
  }

  function index()
  {
    $tampil = "gea";
    $tampil ="ayu";
    $tampil = "Wulandari";
    echo $tampil;
  }

  public function getKabupaten($idprovinsi='')
  {
    $kabupaten = $this->ModelAlamat->getData_Kabupaten($idprovinsi)->result();
    $tampil = "";
    foreach ($kabupaten as $value) {
      $tampil .= "<option value='".$value->idkota."'>".$value->nama_kota."</option>";
    }
    echo $tampil;
  }

  function get_kecamatan($kabupaten)
  {
    $desa = $this->ModelAlamat->data_kecamatan($kabupaten)->result();
    foreach ($desa as $value) {
      echo "<option value=".$value->id.">".$value->name."</option>";
    }
  }

}
