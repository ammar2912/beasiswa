<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardOrmawa extends E_Controller{

  function index()
  {
    $id = $this->session->userdata('id');
    $this->db->where('jenis_user',2);
    $prestasi = $this->db->get_where('tb_prestasi_mahasiswa',array('id_user' => $id))->num_rows();
    $proker = $this->db->get_where('tb_proker',array('id_ormawa' => $id))->num_rows();
    $kegiatan = $this->db->get_where('tb_kegiatan_ormawa',array('id_ormawa' => $id))->num_rows();
    $data = array(
      'body' => 'Dashboard_Ormawa/Dashboard',
      'prestasi' => $prestasi,
      'proker' => $proker,
      'kegiatan' => $kegiatan
     );
    $this->load->view('index', $data);
  }
}
