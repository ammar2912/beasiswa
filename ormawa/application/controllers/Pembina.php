<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembina extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPembina");

  }

  function index()
  {
    $pembina = $this->ModelPembina->get_data();
    $data = array(
      'body' => 'Pembina/list',
      'pembina' => $pembina
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body' => 'Pembina/input',
      'form' => 'Pembina/form',
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = $this->uri->segment(3);
    $pembina = $this->ModelPembina->get_data_edit($id);
    $data = array(
      'body' => 'Pembina/edit',
      'form' => 'Pembina/form',
      'pembina' => $pembina,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $pembina = array(
      'idpembina' => $this->input->post("idpembina"),
      'nama_pembina' => $this->input->post("nama_pembina"),
      'telepon' => $this->input->post("telepon"),

    );

    if ($this->db->insert("pembina",$pembina)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Pembina");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."Pembina");

    }
  }
  function update(){
    $id = $this->uri->segment(3);
    $pembina = array(
      'idpembina' => $this->input->post("idpembina"),
      'nama_pembina' => $this->input->post("nama_pembina"),
      'telepon' => $this->input->post("telepon"),
    );

    $this->db->where("idpembina",$id);
    if ($this->db->update("pembina",$pembina)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Pembina");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."Pembina");

    }
  }

  function delete(){
    $id = $this->input->post("id");

    $this->db->where_in("idpembina",$id);
    if ($this->db->delete("pembina")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."Pembina");
    }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
        redirect(base_url()."Pembina");
    }


  }


}
