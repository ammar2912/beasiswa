<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelFolder");
    $this->load->model("ModelProdi");
  }

  function index()
  {
    $data = array(
      'body'    => 'Folder/list',
      'folder'   => $this->ModelFolder->get_list()->result()
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body'    => 'Folder/input',
      'prodi'   => $this->ModelProdi->get_list()->result(),
      'form'    => 'Folder/form',
     );
    $this->load->view('index', $data);
  }

  function insert()
  {
    $data = array(
      'nama_folder'       => $this->input->post("nama"),
      'idfolder_gd'       => $this->input->post("idgd"),
      'prodi_kode_prodi'     => $this->input->post("idprodi"),
     );
    if ($this->db->insert("folder", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Folder');
  }

  function edit($id)
  {
    $data = array(
      'body'    => 'Folder/input',
      'form'    => 'Folder/form',
      'prodi'   => $this->ModelProdi->get_list()->result(),
      'folder'   => $this->ModelFolder->get_data($id)->row_array(),
     );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_folder'       => $this->input->post("nama"),
      'idfolder_gd'       => $this->input->post("idgd"),
      'prodi_kode_prodi'     => $this->input->post("idprodi"),
     );
    $this->db->where("idfolder", $id);
    if ($this->db->update("folder", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Merubah Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Merubah Data","type" => "danger" ));
    }
    redirect('Folder');
  }


  }
