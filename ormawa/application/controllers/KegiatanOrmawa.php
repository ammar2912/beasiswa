<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanOrmawa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelKegiatanOrmawa");
  }

  function index()
  {
    $kegiatanormawa = $this->ModelKegiatanOrmawa->get_data();
    // var_dump($kegiatanormawa);
    // die;
    $data = array(
      'body' => 'KegiatanOrmawa/list',
      'kegiatanormawa' => $kegiatanormawa
     );
    $this->load->view('index', $data);
  }

  function wadir3(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_ormawa', array('status_kegiatan' => 2));

    redirect('KegiatanOrmawa');
  }

  function keuangan(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_ormawa', array('status_kegiatan' => 3));

    redirect('KegiatanOrmawa');
  }

  function wadir2(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_ormawa', array('status_kegiatan' => 4));

    redirect('KegiatanOrmawa');
  }

  function direktur(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_ormawa', array('status_kegiatan' => 5));

    redirect('KegiatanOrmawa');
  }

  function pencairan(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_ormawa', array('status_kegiatan' => 6));

    redirect('KegiatanOrmawa');
  }


  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_kegiatan_ormawa")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."KegiatanOrmawa");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."KegiatanOrmawa");
    }
  }


}
