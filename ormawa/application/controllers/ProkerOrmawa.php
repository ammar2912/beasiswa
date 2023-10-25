<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProkerOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelProkerOrmawa");
 }

  function index()
  {
    $prokerormawa = $this->ModelProkerOrmawa->get_data();
    $data = array(
      'body' => 'ProkerOrmawa/list',
      'prokerormawa' => $prokerormawa
     );
    $this->load->view('index', $data);
  }


  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_proker")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."ProkerOrmawa");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."ProkerOrmawa");
    }


  }


}
