<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelProfil");
  }

  function edit_tentang()
  {
    $data = array(
      'body'  => 'Profil/edit_tentang' ,
      'data'  => $this->ModelProfil->get_tentang()->row_array(),
     );
     $this->load->view('index', $data);
  }

  function edit_visimisi()
  {
    $data = array(
      'body'  => 'Profil/edit_visimisi' ,
      'data'  => $this->ModelProfil->get_visimisi()->row_array(),
     );
     $this->load->view('index', $data);
  }

  function edit_organisasi()
  {
    $data = array(
      'body'  => 'Profil/edit_organisasi' ,
      'data'  => $this->ModelProfil->get_organisasi()->row_array(),
     );
     $this->load->view('index', $data);
  }

  function update_tentang()
  {
    $data = array(
      'tentang' => $this->input->post("tentang"),
    );
    $this->db->where('idtentang', "1");
    if ($this->db->update('tentang', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    }else{
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect("Profil/edit_tentang");
  }

  function update_visimisi()
  {
    $data = array(
      'visimisi' => $this->input->post("visimisi"),
    );
    $this->db->where('idvisimisi', "1");
    if ($this->db->update('visimisi', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    }else{
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect("Profil/edit_visimisi");
  }

  function update_organisasi()
  {
    $data = array(
      'organisasi' => $this->input->post("organisasi"),
    );
    $this->db->where('idorganisasi', "1");
    if ($this->db->update('organisasi', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    }else{
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect("Profil/edit_organisasi");
  }

}
