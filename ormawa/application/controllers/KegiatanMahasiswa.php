<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanMahasiswa extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelKegiatanMahasiswa");
  }

  function index()
  {
    $kegiatanmahasiswa = $this->ModelKegiatanMahasiswa->get_data()->result();

    $data = array(
      'body' => 'KegiatanMahasiswaKemahasiswaan/list',
      'kegiatanmahasiswa' => $kegiatanmahasiswa
     );
    $this->load->view('index', $data);
  }

  function wadir3(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_mahasiswa', array('status_kegiatan' => 2));

    redirect('KegiatanMahasiswa');
  }

  function keuangan(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_mahasiswa', array('status_kegiatan' => 3));

    redirect('KegiatanMahasiswa');
  }

  function wadir2(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_mahasiswa', array('status_kegiatan' => 4));

    redirect('KegiatanMahasiswa');
  }

  function direktur(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_mahasiswa', array('status_kegiatan' => 5));

    redirect('KegiatanMahasiswa');
  }

  function pencairan(){
    $id = $this->input->get('id');

    $this->db->where('id', $id);
    $this->db->update('tb_kegiatan_mahasiswa', array('status_kegiatan' => 6));

    redirect('KegiatanMahasiswa');
  }

  // function cekData(){
  //   $kegiatanmahasiswa = $this->ModelKegiatanMahasiswa->get_data()->result_array();
  //   echo json_encode($kegiatanmahasiswa);
  // }

  //
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


}
