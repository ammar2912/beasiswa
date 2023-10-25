<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLPJ extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelDataLPJ");
  }

  function index()
  {
    $id = $this->session->userdata('id');
    $datalpj = $this->ModelDataLPJ->get_data($id);
    $data = array(
      'body' => 'DataLPJ/list',
      'datalpj' => $datalpj
     );
    $this->load->view('index', $data);
  }


  function delete(){
    $id = base64_decode($this->uri->segment(3));

    $cekstatus = $this->db->get_where('tb_lpj', array('id' => $id))->row();
    $status = $cekstatus->status;

    if($status == 1){
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
      redirect(base_url()."DataLPJ");
    }else{
    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_lpj")) {

      $getfile = $this->db->get_where('tb_lampiran_lpj', array('id_lpj' => $id))->row();

      if(!empty($getfile->lampiran)){
      $path = 'file/'.$getfile->lampiran;
      unlink($path);
      }

      $this->db->where_in("id_lpj",$id);
      $this->db->delete("tb_lampiran_lpj");

        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."DataLPJ");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."DataLPJ");
    }
    }
  }


}
