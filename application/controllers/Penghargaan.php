<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("ModelPenghargaan");
  }

  // function index()
  // {
  //   $data = array(
  //     'data'     => $this->ModelPenghargaan->get_penghargaan_all()->result(),
  //    );
  //   $this->load->view('Landing/Penghargaan/Penghargaan',$data);
  // }
  //
  // function detail($id)
  // {
  //   $data = array(
  //     'data'  => $this->ModelPenghargaan->get_data($id)->row_array(),
  //     'terbaru'  => $this->ModelPenghargaan->get_Penghargaan_limit(6)->result(),
  //    );
  //   $this->load->view('Landing/Penghargaan/detail',$data);
  // }

  function Penghargaan(){
  $data = array(
    'body'  => 'Penghargaan/list' ,
    'data'  => $this->ModelPenghargaan->get_penghargaan_all()->result(),
   );
   $this->load->view('index', $data);
  }

  function input(){
    $data = array(
      'form' => 'Penghargaan/form',
      'body' => 'Penghargaan/input',
    );
    $this->load->view('index', $data);
  }

  function insert(){
    $data = array(
      'nama'    => $this->input->post("nama"),
      'ciptaan'    => $this->input->post("ciptaan"),
      'jenis'    => $this->input->post("jenis"),
      'bulan'    => $this->input->post("bulan") ." ". $this->input->post("tahun"),
      'file'    => $this->upload_file("file")["link"],
    );
    if ($this->db->insert('penghargaan', $data)) {
      $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      redirect(base_url().'Penghargaan/Penghargaan');
    } else {
      $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      redirect(base_url().'Penghargaan/Penghargaan');
    }
  }

  function edit($id)
  {
    $data = array(
      'form'          => 'Penghargaan/form',
      'body'          => 'Penghargaan/edit' ,
      'data'          => $this->ModelPenghargaan->get_data($id)->row_array(),
    );
    $this->load->view('index', $data);
  }

  function update()
  {
    $patch = "desain/file/Penghargaan/";
    // echo $patch;
    $config['upload_path']          = "./".$patch;
    $config['allowed_types']        = '*';
    $config['max_size']             = 112400;
    $id = $this->input->post("id");
    $data = array(
      'nama'    => $this->input->post("nama"),
      'ciptaan'    => $this->input->post("ciptaan"),
      'jenis'    => $this->input->post("jenis"),
      'bulan'    => $this->input->post("bulan") ." ". $this->input->post("tahun"),
    );
    if ($_FILES["file"]["name"] == null) {
      $this->db->where('idpenghargaan', $id);
      if ($this->db->update('penghargaan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
      }else{
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));
      }
    }else {
      $Penghargaan = $this->ModelPenghargaan->get_data($id)->row_array();
      unlink('./'.$Penghargaan['file']);
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('file')) {
        $data['file'] = $patch.$this->upload->data()['file_name'];
        $this->db->where('idpenghargaan', $id);
        if ($this->db->update('penghargaan', $data)) {
          $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Tambah Data Berhasil","type" => "success" ));
        }else {
          $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Tambah Ulang","type" => "danger" ));;
        }
      }
    }
        redirect("Penghargaan/Penghargaan");
  }

  function hapus($idgallary)
  {
      $this->db->where("idPenghargaan", $idgallary);
      if ($this->db->delete('Penghargaan')) {
        $this->session->set_flashdata('notifJS', array('heading' => "Berhasil",'text'=>"Hapus Data Berhasil","type" => "success" ));
        redirect(base_url().'Penghargaan/Penghargaan');
      } else {
        $this->session->set_flashdata('notifJS', array('heading' => "Gagal",'text'=>"Mohon Untuk Melakukan Hapus Ulang","type" => "danger" ));
        redirect(base_url().'Penghargaan/Penghargaan');
      }
  }

  function upload_file($file){
    $msg="";
    $nama="";
    $config['upload_path']          = './desain/file/Penghargaan/';
    $config['allowed_types']        = '*';
    $config['max_size']             = 112400;
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
                  'link' => "desain/file/Penghargaan/".$nama);
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
