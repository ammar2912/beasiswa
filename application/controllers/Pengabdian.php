<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelJurusan");
    $this->load->model("ModelPengabdian");
  }

  function index()
  {
    if ($_SESSION['jabatan'] == "dosen") {
      $pengabdian = BridgeP3M("proposal_pengabdian?nip_anggota=".$_SESSION['nik']);
    }else {
      $pengabdian = BridgeP3M("proposal_pengabdian");
    }

    $data = array(
      'body'        => 'Pengabdian/list',
      'pengabdian'  => $pengabdian
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body'    => 'Pengabdian/input',
      'form'    => 'Pengabdian/form',
     );
    $this->load->view('index', $data);
  }

  function insert(){
    $file = $this->Upload_File('file');
    $data = array(
      'judul'             => $this->input->post("judul"),
      'program'           => $this->input->post("program"),
      'file'              => $file,
      'tahun_pelaksanaan' => $this->input->post("tahun_pelaksanaan"),
      'tahun_awal'        => $this->input->post("tahun_awal"),
      'tahun_sampai'      => $this->input->post("tahun_sampai"),
      'id_dosen'      => $_SESSION["nik"]
     );
    if ($this->db->insert("master_pengabdian", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Pengabdian');
  }

  public function Upload_File($name)
  {
    $nama_File_Lk = "";
    $config['upload_path']          = './desain/prop_penelitian';
    $config['allowed_types']        = '*';
    $config['max_size']             = 10000;
    $this->load->library('upload', $config);
    if ( !$this->upload->do_upload($name))
    {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>$this->upload->display_errors(),"type" => "danger" ));
      // redirect('Penelitian');
      // echo $this->upload->display_errors();
      // break;
    }else{
      $upload = $this->upload->data();
      $nama_File_Lk ="desain/prop_penelitian/".$upload["file_name"];
    }
    return $nama_File_Lk;
  }










}
