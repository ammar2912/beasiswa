<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriJurnal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelKategoriJurnal");
    $this->load->model("ModelPengumuman");
  }

  // function index()
  // {
  //   $data = array(
  //     'data'     => $this->ModelKategoriJurnal->get_kategorijurnal_all()->result(),
  //    );
  //   $this->load->view('Landing/KategoriJurnal/list',$data);
  // }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelKategoriJurnal->get_data($id)->row_array(),
      'terbaru'  => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/KategoriJurnal/detail',$data);
  }

  function KategoriJurnal(){
  $data = array(
    'body'  => 'KategoriJurnal/list' ,
    'data'  => $this->ModelKategoriJurnal->get_kategorijurnal_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'KategoriJurnal/form',
      'body' => 'KategoriJurnal/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'kategori'      => $this->input->post("kategori"),
      'keterangan'    => $this->input->post("keterangan"),
    );
    if ($this->db->insert('kategori_jurnal', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'KategoriJurnal/KategoriJurnal');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'KategoriJurnal/KategoriJurnal');
    }
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'KategoriJurnal/form',
      'body'          => 'KategoriJurnal/edit' ,
      'data'          => $this->ModelKategoriJurnal->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $id = $this->input->post("id");
    $data = array(
      'kategori'      => $this->input->post("kategori"),
      'keterangan'    => $this->input->post("keterangan"),
    );
      $this->db->where('idkategori_jurnal', $id);
      if ($this->db->update('kategori_jurnal', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
      redirect("KategoriJurnal/KategoriJurnal");
  }

  function hapus($id)
  {
      $this->db->where("idkategori_jurnal", $id);
      if ($this->db->delete('kategori_jurnal')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'KategoriJurnal/KategoriJurnal');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'KategoriJurnal/KategoriJurnal');
      }
  }

  // function upload_file($file){
  //   $msg="";
  //   $nama="";
  //   $config['upload_path']          = './desain/file/KategoriJurnal/';
  //   $config['allowed_types']        = '*';
  //   $config['max_size']             = 112400;
  //   echo $_FILES[$file]["name"];
  //   if ($_FILES[$file]["name"]){
  //               $this->load->library('upload', $config);
  //               if ( !$this->upload->do_upload($file))
  //               {
  //                       $msg= $this->upload->display_errors();
  //               }
  //               else
  //               {
  //                       $upload = $this->upload->data();
  //                       $nama = $upload['file_name'];
  //                       $msg = "Berhasil Upload ".$nama;
  //               }
  //             } else {
  //               $msg="File Kosong";
  //             }
  //   return  array('pesan' => $msg,
  //                 'nama' => $nama,
  //                 'link' => "desain/file/KategoriJurnal/".$nama);
  //   }

  // function tentangkami()
  // {
  //   $data = array(
  //     'aboutus'  => $this->ModelAboutus->get_aboutus()->result(),
  //     'tim'  => $this->ModelTim->get_tim()->result(),
  //    );
  //   $this->load->view('LandingPage/Home/tentangkami.php',$data);
  // }

}
