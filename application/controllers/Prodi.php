<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
    $this->load->model("ModelProdi");
  }

  function index()
  {
    $data = array(
      'body'    => 'LaporanKemajuan/Penelitian/input',
      'form'    => 'LaporanKemajuan/Penelitian/form',
      // 'prodi'   => $this->ModelProdi->get_list()->result()
     );
    $this->load->view('index', $data);
  }

  function luaranwajib()
  {
    $data = array(
      'body'    => 'LaporanKemajuan/Penelitian/LuaranWajib/input',
      'form'    => 'LaporanKemajuan/Penelitian/LuaranWajib/form',
      // 'prodi'   => $this->ModelProdi->get_list()->result()
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body'    => 'Prodi/input',
      'jurusan' => $this->ModelJurusan->get_list()->result(),
      'form'    => 'Prodi/form',
     );
    $this->load->view('index', $data);
  }

  function insert()
  {
    $data = array(
      'nama_prodi'    => $this->input->post("nama"),
      'kode_prodi'    => $this->input->post("kode"),
      'jurusan_idjurusan' => $this->input->post("idjurusan"),
     );
    if ($this->db->insert("prodi", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Prodi');
  }

  function edit($id)
  {
    $data = array(
      'body'    => 'Prodi/input',
      'form'    => 'Prodi/form',
      'jurusan' => $this->ModelJurusan->get_data($id)->row_array()
     );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_prodi'    => $this->input->post("nama"),
      'jurusan_idjurusan' => $this->input->post("idjurusan"),
      'kode_prodi'    => $this->input->post("kode"),
     );
    $this->db->where("idprodi", $id);
    if ($this->db->update("prodi", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Merubah Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Merubah Data","type" => "danger" ));
    }
    redirect('Prodi');
  }


}
