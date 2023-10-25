<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
  }

  function index()
  {
    $data = array(
      'body'    => 'Jurusan/list',
      'jurusan' => $this->ModelJurusan->get_list()->result()
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body'    => 'Jurusan/input',
      'form'    => 'Jurusan/form',
     );
    $this->load->view('index', $data);
  }

  function insert()
  {
    $data = array(
      'nama_jurusan'    => $this->input->post("nama"),
      'kode_jurusan'    => $this->input->post("kode"),
     );
    if ($this->db->insert("jurusan", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Jurusan');
  }

  function edit($id)
  {
    $data = array(
      'body'    => 'Jurusan/input',
      'form'    => 'Jurusan/form',
      'jurusan' => $this->ModelJurusan->get_data($id)->row_array()
     );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_jurusan'    => $this->input->post("nama"),
      'kode_jurusan'    => $this->input->post("kode"),
     );
    $this->db->where("idjurusan", $id);
    if ($this->db->update("jurusan", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Merubah Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Merubah Data","type" => "danger" ));
    }
    redirect('Jurusan');
  }


}
