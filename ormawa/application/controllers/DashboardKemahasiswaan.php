<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardKemahasiswaan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelMahasiswa");
  }

  function index()
  {
    $data_batang = $this->ModelMahasiswa->get_rekap_batang()->result();
    $data_pie = $this->ModelMahasiswa->get_rekap_pie()->row();
    $Totdana_mahasiswa = $this->ModelMahasiswa->get_rekap_kegiatan_mahasiswa()->row();
    $acc = $Totdana_mahasiswa->acc;

    $data_terpakai = $data_pie->terpakai;
    $data_tidak_terpakai = $data_pie->tidak_terpakai;


    $mahasiswa = $this->db->get_where('tb_mahasiswa')->num_rows();
    $ormawa = $this->db->get_where('tb_ormawa')->num_rows();
    $prestasi = $this->db->get_where('tb_prestasi_mahasiswa')->num_rows();
    $kegiatan = $this->db->get_where('tb_kegiatan_ormawa')->num_rows();

    $data = array(
      'body' => 'DashboardKemahasiswaan/Dashboard',
      'mahasiswa' => $mahasiswa,
      'ormawa' => $ormawa,
      'prestasi' => $prestasi,
      'kegiatan' => $kegiatan,
      'data_batang' => $data_batang,
      'data_pie' => $data_pie,
      'terpakai' => $data_terpakai,
      'tidak_terpakai' => $data_tidak_terpakai,
      'acc' => $acc
     );
    $this->load->view('index', $data);
  }


}
