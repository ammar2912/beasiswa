<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelPenelitian");
  }

  function index()
  {
    if ($_SESSION['jabatan'] == "dosen") {
      $penelitian = BridgeP3M("proposal_penelitian?nip_anggota=".$_SESSION['nik']);
    }else {
      $penelitian = BridgeP3M("proposal_penelitian");
    }
    $data = array(
      'body'          => 'Penelitian/list',
      'penelitian'    => $this->ModelPenelitian->get_list()->result(),
      'penelitianapi' => $penelitian
     );
    $this->load->view('index', $data);
  }

  function input()
  {
    $data = array(
      'body'    => 'Penelitian/input',
      // 'jurusan' => $this->ModelJurusan->get_list()->result(),
      'form'    => 'Penelitian/form',
     );
    $this->load->view('index', $data);
  }


  function insert(){
    $data = array(
      'judul'         => $this->input->post("judul"),
      'program'       => $this->input->post("program"),
      'file'          => $this->upload_file["file"],
      'tahun_pelaksanaan' => $this->input->post("tahun_pelaksanaan"),
      'tahun_awal'        => $this->input->post("tahun_awal"),
      'tahun_sampai'      => $this->input->post("tahun_sampai"),
      'id_dosen'      => $_SESSION["nik"]
     );
    if ($this->db->insert("master_penelitian", $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Berhasil Menyimpan Data","type" => "success" ));
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Gagal Menyimpan Data","type" => "danger" ));
    }
    redirect('Penelitian');
  }

  function upload_file($file){
$msg="";
$nama="";
$config['upload_path']          = './desain/prop_penelitian';
$config['allowed_types']        = '*';
$config['max_size']             = 1000;
// echo $_FILES[$file]["name"];
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
return  "desain/prop_penelitian/".$nama;
}













}
