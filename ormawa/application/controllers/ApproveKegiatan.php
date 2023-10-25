<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveKegiatan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelApproveKegiatan");
  }

  function index()
  {
    $approvekegiatan = $this->ModelApproveKegiatan->get_data()->result();
    $data = array(
      'body' => 'ApproveKegiatan/list',
      'approvekegiatan' => $approvekegiatan
     );
    $this->load->view('index', $data);
  }

  function approvekegiatan()
  {
    $id = $this->input->post('id_kegiatan');
    $dana_acc = $this->input->post('dana_acc');
      $approvekegiatan = array(
        'dana_acc' => $dana_acc,
        'status_kegiatan' => 1,
        'status_revisi' => 0
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_kegiatan_ormawa",$approvekegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Approve Kegiatan"));
        redirect(base_url()."ApproveKegiatan");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Approve Kegiatan"));
        redirect(base_url()."ApproveKegiatan");

      }
  }

  function revisikegiatan()
  {
    $id = $this->input->post('id_kegiatan');

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
        redirect(base_url()."ApproveKegiatan");
      }
      }

      $revisikegiatan = array(
        'status_revisi' => 1,
        'detail_revisi' => $this->input->post('detail_revisi'),
        'file_revisi' => $nama_file
      );
      $this->db->where("id",$id);
      if ($this->db->update("tb_kegiatan_ormawa",$revisikegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Kegiatan Berhasil di Revisi"));
        redirect(base_url()."ApproveKegiatan");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Kegiatan Gagal di Revisi"));
        redirect(base_url()."ApproveKegiatan");

      }
  }

}
