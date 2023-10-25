<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilOrmawa extends E_Controller{

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->load->model("ModelProfilOrmawa");
  // }

  function index()
  {
    // $approveproker = $this->ModelApproveProker->get_data()->result();
    $data = array(
      'body' => 'ProfilOrmawa/list',
      // 'profilormawa' => $profilormawa
     );
    $this->load->view('index', $data);
  }

}
