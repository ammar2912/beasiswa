<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelMahasiswa");
  }

  function index()
  {
    $data_batang = $this->ModelMahasiswa->get_rekap_batang()->result();
    // var_dump($data_batang);
    // die;
    $data_pie = $this->ModelMahasiswa->get_rekap_pie()->row();
    $Totdana_mahasiswa = $this->ModelMahasiswa->get_rekap_kegiatan_mahasiswa()->row();
    $acc = $Totdana_mahasiswa->acc;

    $data_terpakai = $data_pie->terpakai;
    $data_tidak_terpakai = $data_pie->tidak_terpakai;

    $surat = $this->db->get_where('tb_surat')->num_rows();
    $prestasi_mahasiswa = $this->db->get_where('tb_prestasi_mahasiswa',array('jenis_user' => 1 ))->num_rows();
    $prestasi_ormawa = $this->db->get_where('tb_prestasi_mahasiswa',array('jenis_user' => 2 ))->num_rows();
    $pendanaan = $this->db->get_where('tb_anggaran_ormawa')->num_rows();

    $data = array(
      'body' => 'DashboardPimpinan/Dashboard',
      'surat' => $surat,
      'prestasi_mahasiswa' => $prestasi_mahasiswa,
      'prestasi_ormawa' => $prestasi_ormawa,
      'pendanaan' => $pendanaan,
      'data_batang' => $data_batang,
      'data_pie' => $data_pie,
      'terpakai' => $data_terpakai,
      'tidak_terpakai' => $data_tidak_terpakai,
      'acc' => $acc
     );
    $this->load->view('index', $data);
  }

}
