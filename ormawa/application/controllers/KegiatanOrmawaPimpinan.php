<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanOrmawaPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelKegiatanOrmawa");
  }

  function index()
  {
    $kegiatanormawapimpinan = $this->ModelKegiatanOrmawa->get_data();
    $data = array(
      'body' => 'KegiatanOrmawaPimpinan/list',
      'kegiatanormawapimpinan' => $kegiatanormawapimpinan
     );
    $this->load->view('index', $data);
  }


  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("id",$id);
  //   if ($this->db->delete("tb_kegiatan_ormawa")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."KegiatanOrmawa");
  //   }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
  //       redirect(base_url()."KegiatanOrmawa");
  //   }
  // }
  //

}
