<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalLPJ extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelApprovalLPJ");
  }

  function index()
  {
    $Approvallpj = $this->ModelApprovalLPJ->get_data();
    $data = array(
      'body' => 'ApprovalLPJ/list',
      'Approvallpj' => $Approvallpj
     );
    $this->load->view('index', $data);
  }
  function approve()
  {
    $id = base64_decode($this->uri->segment(3));
      $approvekegiatan = array(
        'status' => 1,
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_lpj",$approvekegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Approve LPJ"));
        redirect(base_url()."ApprovalLPJ");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Approve LPJ"));
        redirect(base_url()."ApprovalLPJ");

      }
  }

}
