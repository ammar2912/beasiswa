<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelYoutube");
  }

  function index()
  {
    $data = array(
     );
    $this->load->view('Landing/H',$data);
  }

  function detail_youtube($id)
  {
    $data = array(
      'kegiatan'  => $this->ModelYoutube->get_edit($id)->row_array(),
     );
    $this->load->view('LandingPage/Home/detail_Youtube',$data);
  }

  function Youtube(){
  $data = array(
    'body'  => 'Youtube/list' ,
    'data'  => $this->ModelYoutube->get_youtube_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Youtube/form',
      'body' => 'Youtube/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'     => $this->input->post("judul"),
      'link'     => $this->input->post("link"),
    );
    if ($this->db->insert('youtube', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Youtube/Youtube');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Youtube/Youtube');
    }
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Youtube/form',
      'body'          => 'Youtube/edit' ,
      'data'          => $this->ModelYoutube->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $data = array(
      'judul'     => $this->input->post("judul"),
      'link'     => $this->input->post("link"),
    );
    $this->db->where("idyoutube", $this->input->post("id"));
    if ($this->db->update('youtube', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Youtube/Youtube');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Youtube/Youtube');
    }
    redirect("Youtube/Youtube");
  }

  function hapus($id)
  {
      $this->db->where("idyoutube", $id);
      if ($this->db->delete('youtube')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Youtube/Youtube');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Youtube/Youtube');
      }
  }


}
