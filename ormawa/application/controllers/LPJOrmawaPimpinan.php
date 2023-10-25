<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LPJOrmawaPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelLPJOrmawa");
  }

  function index()
  {
    $lpjormawa = $this->ModelLPJOrmawa->get_data();
    $data = array(
      'body' => 'LPJOrmawaPimpinan/list',
      'lpjormawa' => $lpjormawa
     );
    $this->load->view('index', $data);
  }


}
