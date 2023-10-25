<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelCarousel");
  }

  function index(){
  $data = array(
    'body'  => 'Carousel/list' ,
    'carousel'  => $this->ModelCarousel->get_carousel()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Carousel/form',
      'body' => 'Carousel/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'      => $this->input->post("judul"),
      'gambar'     => $this->upload_file("gambar")["link"],
      'isi'        => $this->input->post("isi"),
    );
    if ($this->db->insert('carousel', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Carousel');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Carousel');
    }
  }

  function edit($carousel)
  {
    $data = array(
      'form'      => 'Carousel/form',
      'body'      => 'Carousel/edit',
      'carousel'  => $this->ModelCarousel->get_edit($carousel)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/foto/carousel/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 11240;
    $idcarousel = $this->input->post("idcarousel");
    $data = array(
      'judul'      => $this->input->post("judul"),
      'isi'        => $this->input->post("isi"),
    );
    if ($_FILES["gambar"]["name"] == null) {
      $this->db->where('idcarousel', $idcarousel);
      if ($this->db->update('carousel', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $kegiatan = $this->ModelCarousel->get_edit($idcarousel)->row_array();
      unlink('./'.$carousel['gambar']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('gambar')) {
        $data['gambar'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idcarousel', $idcarousel);
        if ($this->db->update('carousel', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Carousel");
  }

  function hapus($idcarousel)
  {
      $this->db->where("idcarousel", $idcarousel);
      if ($this->db->delete('carousel')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Carousel');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Carousel');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/foto/carousel';
    $config['allowed_types']        = '*';
    $config['max_size']             = 1000;
    echo $_FILES[$file]["name"];
    if ($_FILES[$file]["name"]){
                $this->load->library('upload', $config);
                if ( !$this->upload->do_upload($file))
                {
                        $msg= $this->upload->display_errors();
                }
                else
                {
                        $upload = $this->upload->data();
                        $nama = $upload['file_name'];
                        $msg = "Berhasil Upload ".$nama;
                }
              } else {
                $msg="File Kosong";
              }
    return  array('pesan' => $msg,
                  'nama' => $nama,
                  'link' => "desain/foto/carousel/".$nama);
    }

}
