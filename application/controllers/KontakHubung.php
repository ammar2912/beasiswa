<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KontakHubung extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelKontakHubung");
  }

  function index()
  {
    $data = array(
      'data'     => $this->ModelKontakHubung->get_all()->row_array(),
     );
    $this->load->view('Landing/KontakHubung/index',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelKontakHubung->get_data($id)->row_array(),
     );
    $this->load->view('KontakHubung/detail',$data);
  }

  function KontakHubung(){
  $data = array(
    'body'  => 'KontakHubung/list' ,
    'data'  => $this->ModelKontakHubung->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'KontakHubung/form',
      'body' => 'KontakHubung/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_unit'  => $this->input->post("nama_unit"),
      'alamat'     => $this->input->post("alamat"),
      'telepon'     => $this->input->post("telepon"),
      'email'     => $this->input->post("email"),
    );
    if ($this->db->insert('kontak_hubung', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'KontakHubung/KontakHubung');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'KontakHubung/form',
      'body'          => 'KontakHubung/edit' ,
      'data'          => $this->ModelKontakHubung->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_unit'    => $this->input->post("nama_unit"),
      'alamat'       => $this->input->post("alamat"),
      'telepon'       => $this->input->post("telepon"),
      'email'       => $this->input->post("email"),

    );
    $this->db->where('id_kontak', $id);
      if ($this->db->update('kontak_hubung', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
      }
      redirect("KontakHubung/KontakHubung");
  }

  function hapus($id)
  {
      $this->db->where("id_kontak", $id);
      if ($this->db->delete('kontak_hubung')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'KontakHubung/KontakHubung');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'KontakHubung/KontakHubung');
      }
  }




}
