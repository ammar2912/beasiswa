<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisSuratPimpinan extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisSurat");
  }

  function index()
  {
    $jenissuratpimpinan = $this->ModelJenisSurat->get_data();
    $data = array(
      'body' => 'JenisSuratPimpinan/list',
      'jenissuratpimpinan' => $jenissuratpimpinan
     );
    $this->load->view('index', $data);
  }

  // function input()
  // {
  //   $data = array(
  //     'body' => 'JenisSurat/input',
  //     'form' => 'JenisSurat/form',
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function edit()
  // {
  //   $id = base64_decode($this->uri->segment(3));
  //   $jenissurat = $this->ModelJenisSurat->get_data_edit($id);
  //   $syarat = $jenissurat['syarat'];
  //   $arr_kalimat = explode (",",$syarat);
  //
  //   $data = array(
  //     'body' => 'JenisSurat/edit',
  //     'form' => 'JenisSurat/form',
  //     'jenissurat' => $jenissurat,
  //     'syarat' => $arr_kalimat,
  //    );
  //   $this->load->view('index', $data);
  // }
  //
  // function insert(){
  //   $syarat = implode(",", $this->input->post("syarat")) ;
  //   $jenissurat = array(
  //     'jenis_surat' => $this->input->post("jenis_surat"),
  //     'syarat' => $syarat,
  //     'status' => 1,
  //   );
  //   if ($this->db->insert("tb_jenis_surat",$jenissurat)) {
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
  //     redirect(base_url()."JenisSurat");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
  //     redirect(base_url()."JenisSurat ");
  //
  //   }
  // }
  //
  // function update(){
  //   $id = base64_decode($this->uri->segment(3));
  //   $syarat = implode(",", $this->input->post("syarat")) ;
  //   $prodi = array(
  //     'jenis_surat' => $this->input->post("jenis_surat"),
  //     'syarat' => $syarat,
  //   );
  //   $this->db->where("id",$id);
  //   if ($this->db->update("tb_jenis_surat",$prodi)) {
  //     $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Edit Data"));
  //     redirect(base_url()."JenisSurat");
  //   }else{
  //     $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Edit Data"));
  //     redirect(base_url()."JenisSurat");
  //
  //   }
  // }
  //
  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("idprodi",$id);
  //   if ($this->db->delete("prodi")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."Prodi");
  //   }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
  //       redirect(base_url()."Prodi");
  //   }
  // }

  function NonAktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 0,
    );
    $this->db->where("id",$id);
    if ($this->db->update("tb_jenis_surat",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."JenisSuratPimpinan");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."JenisSuratPimpinan");

    }
  }

  function Aktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 1,
    );
    $this->db->where("id",$id);
    if ($this->db->update("tb_jenis_surat",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."JenisSuratPimpinan");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."JenisSuratPimpinan");

    }
  }


}
