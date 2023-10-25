<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrmawaData extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelOrmawaData");
  }

  function index()
  {
    redirect("OrmawaData/page/0");
  }

  function page($page = 0)
  {
    $limit_page = ceil($this->ModelOrmawaData->get_all()->num_rows() / 10) - 1;
    $data = array(
      'data'  => $this->ModelOrmawaData->get_page($page)->result(),
      'limit_page' => $limit_page
     );
     // echo json_encode($data);
    $this->load->view("Landing/Ormawa/list", $data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelOrmawaData->get_data($id)->row_array(),
     );
    $this->load->view('OrmawaData/detail',$data);
  }

  function OrmawaData(){
  $data = array(
    'body'  => 'OrmawaData/list' ,
    'data'  => $this->ModelOrmawaData->get_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'OrmawaData/form',
      'body' => 'OrmawaData/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama_ormawa'  => $this->input->post("nama_ormawa"),
      'deskripsi'     => $this->input->post("deskripsi"),
    );
    if ($this->db->insert('ormawa', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
    }
    redirect(base_url().'OrmawaData/OrmawaData');
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'OrmawaData/form',
      'body'          => 'OrmawaData/edit' ,
      'data'          => $this->ModelOrmawaData->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'nama_ormawa'    => $this->input->post("nama_ormawa"),
      'deskripsi'       => $this->input->post("deskripsi"),

    );
    $this->db->where('id_ormawa', $id);
      if ($this->db->update('ormawa', $data)) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
      }
      redirect("OrmawaData/OrmawaData");
  }

  function hapus($id)
  {
      $this->db->where("id_ormawa", $id);
      if ($this->db->delete('ormawa')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'OrmawaData/OrmawaData');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'OrmawaData/OrmawaData');
      }
  }




}
