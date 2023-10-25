<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends E_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelBank");

  }

  function index()
  {
    $bank = $this->ModelBank->get_data();
    $data = array(
      'body' => 'Bank/list',
      'bank' => $bank
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body' => 'Bank/input',
      'form' => 'Bank/form',
     );
    $this->load->view('index', $data);
  }

  function edit()
  {
    $id = $this->uri->segment(3);
    $bank = $this->ModelBank->get_data_edit($id);
    $data = array(
      'body' => 'Bank/edit',
      'form' => 'Bank/form',
      'bank' => $bank,
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $bank = array(
      'kode' => $this->input->post("kode"),
      'bank' => $this->input->post("bank"),
      'va' => $this->input->post("va"),
      'ket' => $this->input->post("ket"),
    );

    if ($this->db->insert("bank",$bank)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Bank");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."Bank");

    }
  }
  function update(){
    $id = $this->uri->segment(3);
    $bank = array(
      'kode' => $this->input->post("kode"),
      'bank' => $this->input->post("bank"),
      'va' => $this->input->post("va"),
      'ket' => $this->input->post("ket"),
    );

    $this->db->where("idbank",$id);
    if ($this->db->update("bank",$bank)) {
      // code...
      $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Input Data"));
      redirect(base_url()."Bank");
    }else{
      $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Input Data"));
      redirect(base_url()."Bank");

    }
  }

  function delete(){
    $id = $this->input->post("id");

      $this->db->where_in("idbank",$id);
      if ($this->db->delete("bank")) {
        $this->session->set_flashdata("notif",$this->Notif->berhasil("Berhasil Hapus Data"));
        redirect(base_url()."Bank");
      }else{
        $this->session->set_flashdata("notif",$this->Notif->gagal("gagal Hapus Data"));
        redirect(base_url()."Bank");
      }


  }


}
