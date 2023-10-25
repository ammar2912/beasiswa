<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersyaratanSurat extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPersyaratanSurat");

  }

  function index()
  {
    $persyaratansurat = $this->ModelPersyaratanSurat->get_data();
    $data = array(
      'body' => 'PersyaratanSurat/list',
      'persyaratansurat' => $persyaratansurat
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body' => 'PersyaratanSurat/input',
      'form' => 'PersyaratanSurat/form',
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id =base64_decode($this->uri->segment(3));
    $persyaratansurat = $this->ModelPersyaratanSurat->get_data_edit($id);
    $data = array(
      'body' => 'PersyaratanSurat/edit',
      'form' => 'PersyaratanSurat/form',
      'persyaratansurat' => $persyaratansurat,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $persyaratansurat = array(
      'persyaratan' => $this->input->post("persyaratan"),
      'status' => 1
    );
    $cek = $this->db->get_where('tb_persyaratan_surat', array('persyaratan' => $this->input->post('persyaratan')))->num_rows();
    if($cek == 0){
    if ($this->db->insert("tb_persyaratan_surat",$persyaratansurat)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."PersyaratanSurat");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."PersyaratanSurat");
    }
  }else{
    $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data, Jenis Sudah Terdaftar !"));
    redirect(base_url()."PersyaratanSurat");
  }
  }


  function update(){
    $id = base64_decode($this->uri->segment(3));
    $persyaratan = array(
      'persyaratan' => $this->input->post("persyaratan"),
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_persyaratan_surat",$persyaratan)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."PersyaratanSurat");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."PersyaratanSurat");

    }
  }

  // function delete(){
  //   $id = $this->input->post("id");
  //
  //   $this->db->where_in("id",$id);
  //   if ($this->db->delete("tb_persyaratan_surat")) {
  //       $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
  //       redirect(base_url()."PersyaratanSurat");
  //     }else{
  //       $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
  //       redirect(base_url()."PersyaratanSurat");
  //   }
  // }

  function NonAktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 0,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_persyaratan_surat",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."PersyaratanSurat");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."PersyaratanSurat");
    }
  }

  function Aktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 1,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_persyaratan_surat",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil"));
      redirect(base_url()."PersyaratanSurat");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal"));
      redirect(base_url()."PersyaratanSurat");
    }
  }



}
