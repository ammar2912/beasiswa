<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('ModelJadwal');
  }

  function jadwal()
  {

    $data = array(
      'body'    => 'Setting/inputjadwal',
      'form'    => 'Setting/formjadwal',
      'jadwal'  => $this->ModelJadwal->getJadwal()
     );
    $this->load->view('index', $data);
  }

  function settingjadwal()
  {
    $data = array(
      'mulai'   => date("Y-m-d", strtotime($this->input->post('mulai'))),
      'selesai' => date("Y-m-d", strtotime($this->input->post('selesai'))),
     );
     $this->db->where("idjadwal", "1");
     $this->db->update("jadwal", $data);
     redirect("Home");
  }

}
