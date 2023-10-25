<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekapDanaOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelHistoryAnggaran");

  }

  function index()
  {
    $rekapdanaormawa = $this->ModelHistoryAnggaran->get_all()->result();
    $data = array(
      'body' => 'RekapDanaOrmawa/list',
      'rekapdanaormawa' => $rekapdanaormawa
     );
    $this->load->view('index', $data);
  }

  function detail()
  {
   $id = base64_decode($this->uri->segment(3));
   $rekapdanaormawa = $this->ModelHistoryAnggaran->get_detail($id);
   $data = array(
     'body' => 'RekapDanaOrmawa/detail',
     'history' => $rekapdanaormawa,
    );
   $this->load->view('index', $data);
 }

}
