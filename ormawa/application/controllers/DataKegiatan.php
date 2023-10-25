<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKegiatan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataKegiatan");
  }

  function index()
  {
    $id = $this->session->userdata('id');
    $datakegiatan = $this->ModelDataKegiatan->get_data($id);
    $this->db->where('status',1);
    $proker = $this->db->get_where('tb_proker',array('id_ormawa' => $id))->result();
    $data = array(
      'body' => 'DataKegiatan/list',
      'datakegiatan' => $datakegiatan,
      'proker' => $proker
     );
    $this->load->view('index', $data);
  }


  function delete(){
    $id = base64_decode($this->uri->segment(3));

    $cekstatus = $this->db->get_where('tb_kegiatan_ormawa', array('id' => $id))->row();
    $status = $cekstatus->status;

    if($status == 1){
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
      redirect(base_url()."DataKegiatan");
    }else{
    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_kegiatan_ormawa")) {

      $getfile = $this->db->get_where('tb_lampiran_kegiatan', array('id_kegiatan' => $id))->row();

      if(!empty($getfile->lampiran)){
      $path = 'file/'.$getfile->lampiran;
      unlink($path);
      }

      $this->db->where_in("id_kegiatan",$id);
      $this->db->delete("tb_lampiran_kegiatan");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."DataKegiatan");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."DataKegiatan");
    }
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

        $rev_file = array('lampiran' => $nama_file);
        $this->db->where("id_kegiatan",$id);
        $this->db->update("tb_lampiran_kegiatan",$rev_file);

      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input File Revisi, File tidak sesuai ketentuan"));
        redirect(base_url()."DataKegiatan");
      }
      }

      if($this->input->post('proker') != null ){
      $revisikegiatan = array(
        'id_proker' => $this->input->post('proker'),
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tanggung_jawab' => $this->input->post('tanggung_jawab'),
        'dana_pengajuan' => $this->input->post('dana_pengajuan'),
        'status_revisi' => 2,
      );
    }else{
      $revisikegiatan = array(
        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        'tanggung_jawab' => $this->input->post('tanggung_jawab'),
        'dana_pengajuan' => $this->input->post('dana_pengajuan'),
        'status_revisi' => 2,
      );
    }
      $this->db->where("id",$id);
      if ($this->db->update("tb_kegiatan_ormawa",$revisikegiatan)) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Kegiatan Berhasil di Revisi"));
        redirect(base_url()."DataKegiatan");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Kegiatan Gagal di Revisi"));
        redirect(base_url()."DataKegiatan");

      }
  }


}
