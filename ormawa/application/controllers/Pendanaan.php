<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendanaan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPendanaan");
  }

  function index()
  {
    $id = $this->session->userdata('id');
    $pendanaan = $this->ModelPendanaan->get_data($id)->result();
    $data = array(
      'body' => 'Pendanaan/list',
      'pendanaan' => $pendanaan
     );
    $this->load->view('index', $data);
  }


}
