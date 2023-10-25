<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelProdi");
  }

  function index()
  {
    $prodi = $this->ModelProdi->get_data()->result();
    $data = array(
      'body' => 'Prodi/list',
      'prodi' => $prodi
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $jurusan = $this->db->get_where('tb_jurusan', array('status' => 1 ))->result();
    $data = array(
      'body' => 'Prodi/input',
      'form' => 'Prodi/form',
      'jurusan' => $jurusan,
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = base64_decode($this->uri->segment(3));
    $prodi = $this->ModelProdi->get_data_edit($id);
    $jurusan = $this->db->get_where('tb_jurusan', array('status' => 1 ))->result();
    $data = array(
      'body' => 'Prodi/edit',
      'form' => 'Prodi/form',
      'prodi' => $prodi,
      'jurusan' => $jurusan,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $prodi = array(
      'id_jurusan' => $this->input->post("jurusan"),
      'nama_prodi' => $this->input->post("nama_prodi"),
      'status' => 1,

    );
    if ($this->db->insert("tb_prodi",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Prodi");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."Prodi");

    }
  }
  function update(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'id_jurusan' => $this->input->post("jurusan"),
      'nama_prodi' => $this->input->post("nama_prodi"),
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_prodi",$prodi)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Prodi");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Input Data"));
      redirect(base_url()."Prodi");

    }
  }

  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("id",$id);
    if ($this->db->delete("tb_prodi")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."Prodi");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("Gagal Hapus Data"));
        redirect(base_url()."Prodi");
    }
  }

  function NonAktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 0,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_prodi",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
      redirect(base_url()."Prodi");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
      redirect(base_url()."Prodi");
    }
  }

  function Aktif(){
    $id = base64_decode($this->uri->segment(3));
    $prodi = array(
      'status' => 1,
    );

    $this->db->where("id",$id);
    if ($this->db->update("tb_prodi",$prodi)) {
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Ubah Status Berhasil "));
      redirect(base_url()."Prodi");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("Ubah Status Gagal "));
      redirect(base_url()."Prodi");
    }
  }





}
