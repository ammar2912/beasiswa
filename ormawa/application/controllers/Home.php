<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public $data_user = array();

  public function __construct()
  {
    parent::__construct();
    // $this->load->model("ModelHome");
  }

  function index()
  {
    $cek_level = $this->session->userdata('jenis_user');
    if(!empty($cek_level)){
    if($cek_level == 'mahasiswa'){
    redirect(base_url("DashboardMahasiswa"));
    }elseif ($cek_level == 'ormawa') {
    redirect(base_url("DashboardOrmawa"));
    }elseif($cek_level == 'kemahasiswaan'){
    redirect(base_url("DashboardKemahasiswaan"));
    }elseif ($cek_level == 'pimpinan') {
    redirect(base_url("DashboardPimpinan"));
    }
    }else{
    redirect(base_url('Login'));
  }
  }


}
