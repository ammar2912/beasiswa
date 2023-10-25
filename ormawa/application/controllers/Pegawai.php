<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPegawai");

  }

  function index()
  {
    $pegawai = $this->ModelPegawai->get_data();
    $data = array(
      'body' => 'Pegawai/list',
      'pegawai' => $pegawai
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body' => 'Pegawai/input',
      'form' => 'Pegawai/form',
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = $this->uri->segment(3);
    $pegawai = $this->ModelPegawai->get_data_edit($id);
    $data = array(
      'body' => 'Pegawai/edit',
      'form' => 'Pegawai/form_edit',
      'pegawai' => $pegawai,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $pegawai = array(
      'nama' => $this->input->post("nama"),
      'jabatan' => $this->input->post("jabatan"),
      'nip' => $this->input->post("nip"),
    );

    if ($this->db->insert("pegawai",$pegawai)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Pegawai");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."Pegawai");

    }
  }
  function update(){
    $id = $this->uri->segment(3);
    $pegawai = array(
      'nama' => $this->input->post("nama"),
      'jabatan' => $this->input->post("jabatan"),
      'nip' => $this->input->post("nip"),
    );

    $this->db->where("idpegawai",$id);
    if ($this->db->update("pegawai",$pegawai)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Edit Data"));
      redirect(base_url()."Pegawai");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Edit Data"));
      redirect(base_url()."Pegawai");

    }
  }

  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("pegawai_idpegawai",$id);
    if ($this->db->delete("user")) {
      $this->db->where_in("idpegawai",$id);
      if ($this->db->delete("pegawai")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."Pegawai");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
        redirect(base_url()."Pegawai");
      }

    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
      redirect(base_url()."Pegawai");
    }

  }


}
