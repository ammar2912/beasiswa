<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelPanduan");
    $this->load->model("ModelPengumuman");
  }

  function index()
  {
    $data = array(
      'data'  => $this->ModelPanduan->get_panduan_all()->result(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Panduan/list',$data);
  }

  function detail($id)
  {
    $data = array(
      'data'  => $this->ModelPanduan->get_edit($id)->row_array(),
      'terbaru'   => $this->ModelPengumuman->get_pengumuman_limit(6)->result(),
     );
    $this->load->view('Landing/Panduan/detail',$data);
  }

  function Panduan(){
  $data = array(
    'body'  => 'Panduan/list' ,
    'data'  => $this->ModelPanduan->get_panduan_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Panduan/form',
      'body' => 'Panduan/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'judul'   => $this->input->post("judul"),
      'tanggal' => date("Y-m-d"),
      'file'    => $this->upload_file("file")["link"],
      'keterangan'=> $this->input->post("keterangan"),
    );
    if ($this->db->insert('panduan', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Panduan/Panduan');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Panduan/Panduan');
    }
  }

  function edit($Panduan)
  {
    $data = array(
      'form'          => 'Panduan/form',
      'body'          => 'Panduan/edit' ,
      'data'  => $this->ModelPanduan->get_edit($Panduan)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/file/panduan/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['max_size']             = 51240;
    $idPanduan = $this->input->post("id");
    $data = array(
      'judul'   => $this->input->post("judul"),
      'keterangan'=> $this->input->post("keterangan"),
    );
    if ($_FILES["file"]["name"] == null) {
      $this->db->where('idpanduan', $idPanduan);
      if ($this->db->update('panduan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $Panduan = $this->ModelPanduan->get_edit($idPanduan)->row_array();
      unlink('./'.$Panduan['file']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('file')) {
        $data['file'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idpanduan', $idPanduan);
        if ($this->db->update('panduan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Panduan/Panduan");
  }

  function hapus($id)
  {
      $this->db->where("idpanduan", $id);
      if ($this->db->delete('panduan')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Panduan/Panduan');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Panduan/Panduan');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/file/panduan';
    $config['allowed_types']        = '*';
    $config['max_size']             = 11240;
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
                  'link' => "desain/file/Panduan/".$nama);
    }

  // function tentangkami()
  // {
  //   $data = array(
  //     'aboutus'  => $this->ModelAboutus->get_aboutus()->result(),
  //     'tim'  => $this->ModelTim->get_tim()->result(),
  //    );
  //   $this->load->view('LandingPage/Home/tentangkami.php',$data);
  // }

}
