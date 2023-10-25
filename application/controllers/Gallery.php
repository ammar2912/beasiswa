<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelGallery");
    $this->load->model("ModelPengumuman");
  }

  function index()
  {
    $data = array(
      'data'  => $this->ModelGallery->get_gallery_all()->result(),
     );
    $this->load->view('Landing/Gallery/Gallery',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelGallery->get_data($id)->row_array(),
      'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Gallery/detail.php',$data);
  }

  function Gallery(){
  $data = array(
    'body'  => 'Gallery/list' ,
    'data'  => $this->ModelGallery->get_gallery_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Gallery/form',
      'body' => 'Gallery/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'   => $this->input->post("keterangan"),
      'tanggal' => $this->input->post("tanggal"),
      'foto'    => $this->upload_file("foto")["link"],
    );
    if ($this->db->insert('gallery', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Gallery/Gallery');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Gallery/Gallery');
    }
  }

  function edit($Gallery)
  {
    $data = array(
      'form'          => 'Gallery/form',
      'body'          => 'Gallery/edit' ,
      'data'  => $this->ModelGallery->get_data($Gallery)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/foto/gallery/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 11240;
    $idGallery = $this->input->post("id");
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'   => $this->input->post("keterangan"),
      'tanggal'   => $this->input->post("tanggal"),
    );
    if ($_FILES["foto"]["name"] == null) {
      $this->db->where('idgallery', $idGallery);
      if ($this->db->update('gallery', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $Gallery = $this->ModelGallery->get_data($idgallery)->row_array();
      unlink('./'.$Gallery['foto']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $data['foto'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idgallery', $idGallery);
        if ($this->db->update('gallery', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Gallery/Gallery");
  }

  function hapus($idgallery)
  {
      $this->db->where("idgallery", $idgallery);
      if ($this->db->delete('gallery')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Gallery/Gallery');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Gallery/Gallery');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/foto/gallery';
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
                  'link' => "desain/foto/gallery/".$nama);
    }
}
