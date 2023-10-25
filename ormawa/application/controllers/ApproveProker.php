<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveProker extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelApproveProker");
  }

  function index()
  {
    $approveproker = $this->ModelApproveProker->get_data()->result();
    $data = array(
      'body' => 'ApproveProker/list',
      'approveproker' => $approveproker
     );
    $this->load->view('index', $data);
  }

  function approveproker()
  {
    $id = base64_decode($this->uri->segment(3));
      $approveproker = array(
        'status' => 1,
        'status_revisi' => 0
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_proker",$approveproker)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Approve Proker"));
        redirect(base_url()."ApproveProker");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Approve Proker"));
        redirect(base_url()."ApproveProker");

      }
  }

  function revisiproker()
  {
    $id = $this->input->post('id_proker');

    $nama_file = '';

    if($_FILES['file_revisi']['name']){
      // File upload configuration
      $uploadPath = 'file/';
      $config['upload_path'] = $uploadPath;
      $config['allowed_types'] = 'pdf|PDF';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($this->upload->do_upload('file_revisi')){
        $fileData = $this->upload->data();
        $nama_file = $fileData['file_name'];
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input File Revisi, File tidak sesuai ketentuan"));
        redirect(base_url()."ApproveProker");
      }
      }

      $revisiproker = array(
        'status_revisi' => 1,
        'detail_revisi' => $this->input->post('detail_revisi'),
        'file_revisi' => $nama_file
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_proker",$revisiproker)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Proker Berhasil di Revisi"));
        redirect(base_url()."ApproveProker");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Proker Gagal di Revisi"));
        redirect(base_url()."ApproveProker");
      }
  }

}
