<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProker extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataProker");
  }

  function index()
  {
    $id = $this->session->userdata('id');
    $dataproker = $this->ModelDataProker->get_data($id);
    $data = array(
      'body' => 'DataProker/list',
      'dataproker' => $dataproker
    );
    $this->load->view('index', $data);
  }


  function delete(){
    $id = base64_decode($this->uri->segment(3));

    $cekstatus = $this->db->get_where('tb_proker', array('id' => $id))->row();
    $status = $cekstatus->status;

    if($status == 1){
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
      redirect(base_url()."DataProker");
    }else{
      $this->db->where_in("id",$id);
      if ($this->db->delete("tb_proker")) {

        $getfile = $this->db->get_where('tb_lampiran_proker', array('id_proker' => $id))->row();

        if(!empty($getfile->lampiran)){
          $path = 'file/'.$getfile->lampiran;
          unlink($path);
        }
        $this->db->where_in("id_proker",$id);
        $this->db->delete("tb_lampiran_proker");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."DataProker");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."DataProker");
      }
    }
  }


  function revisiproker()
  {
    // echo "string";
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

        $rev_file = array('lampiran' => $nama_file);
        $this->db->where("id_proker",$id);
        $this->db->update("tb_lampiran_proker",$rev_file);

      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input File Revisi, File tidak sesuai ketentuan"));
        redirect(base_url()."DataProker");
      }
    }

    if($this->input->post('proker') != null ){
      $revisiproker = array(
      'id_proker' => $this->input->post('proker'),
      'nama_proker' => $this->input->post('nama_proker'),
      'tanggung_jawab' => $this->input->post('tanggung_jawab'),
      'status_revisi' => 2,
      );
    }else{
      $revisiproker = array(
      'nama_proker' => $this->input->post('nama_proker'),
      'tanggung_jawab' => $this->input->post('tanggung_jawab'),
      'status_revisi' => 2,
      );
    }
    $this->db->where("id",$id);
    if ($this->db->update("tb_proker",$revisiproker)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Proker Berhasil di Revisi"));
      redirect(base_url()."DataProker");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Proker Gagal di Revisi"));
      redirect(base_url()."DataProker");
    }
  }

  function asd()
  {
    echo "string";
  }

}
